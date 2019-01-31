<?php
namespace app\admin\controller;

use app\admin\validate\Users;
use think\Controller;
use think\Db;
use think\facade\Config;
use think\facade\Session;
use think\facade\Url;

class Login extends Controller {
    
    public function initialize(){
        parent::initialize();
    }
    
    public function _empty(){
        if ($this->request->isAjax()){
            $this->error('方法不存在');
        }
        $this->redirect(url('index'));
    }

    public function index(){
        if (Session::has("user_name") && Session::has("user_id")) {
            $this->redirect("index/index");
        }
        $user = ['user_name' => '','user_pwd' => ''];
        $remember = json_decode(cookie('remember_token'),TRUE);
        if (!empty($remember)){
            $remember['user_name'] = _encrypt($remember['user_name'],'DECODE');
            $remember['user_pwd'] = _encrypt($remember['user_pwd'],'DECODE');
            $current_token = md5($this->request->ip().$remember['user_name'].$_SERVER['HTTP_USER_AGENT']);
            if ($remember['token'] == $current_token){
                $user = ['user_name' => $remember['user_name'],'user_pwd' => $remember['user_pwd']];
            }
        }
        $this->assign('user',$user);
        return $this->fetch();
    }
    
    /* 提交登录信息 */
    public function login() {
        // 设定数据返回格式
        Config::set("default_return_type","json");
        $request = $this->request;
        if ($request->isPost()) {
            // 接受指定信息
            $username = $request->post("username");
            $password = $request->post("password");
            //$verify   = $request->param("verify");
            $token    = $request->post("__token__");
            $remember = intval($request->post('remember'));

            // 验证数组
            $data = [
                'username'  => $username,
                'password'  => $password,
                //'verify'    => $verify,
                '__token__' => $token,
            ];
            
            $validate = new Users();
            if (!$validate->scene("login")->check($data)) {
                // dump($validate->getError()); // 输出 验证的 错误信息
                $this->error($validate->getError());
            }
            // 查询是否有此账户
            $userDb = Db::name('admin')->where('user_name', $username)->find();
            if ($userDb) {
                // 验证 status = 1 才能登陆 $userDb->getData("status")
                if ($userDb['status'] != '1') {
                    return $this->error("账户存在异常，请联系管理员。");
                }
                // 验证密码是否正确
                $passwordBy = validate_password($password, $userDb["user_password"]);
                if ($passwordBy === true) {
                    // 密码正确
                    $user_count = $userDb['user_count']+1;
                    Db::name('admin')->where("user_name", $username)->update(['update_time' => time(),"user_count"=> $user_count]);
                    // 将用户信息写入 Session
                    Session::set('user_id', $userDb['id']); // 用户ID
                    Session::set('user_name', $userDb['user_name']); // 登录名
                    Session::set('user_nick', $userDb['user_nick']); // 用户名
                    Session::set('group_id', $userDb['group_id']); // 1为超级管理员
                    $remember_token = md5($request->ip().$username.$_SERVER['HTTP_USER_AGENT']);
                    if ($remember == 1){
                        cookie('remember_token',json_encode([
                            'user_name' => _encrypt($username),
                            'user_pwd' => _encrypt($password),
                            'token' => $remember_token
                        ]),time()+3600*24*30);
                    }
                    return $this->success('登录成功', Url::build("index/index"));
                } else {
                    return $this->error("账户或密码错误");
                }
            } else {
                return $this->error("账户或密码错误");
            }
        }
    }
    
    /* 退出登录 */
    public function logout() {
        Session::clear(); // 清除session值
        //cookie('remember_token',null,-1);
        $this->redirect(url('Login/index'));
    }
    
    public function clear(){
        cookie('remember_token',null,-1);
    }
    
}