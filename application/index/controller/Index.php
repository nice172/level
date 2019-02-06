<?php
namespace app\index\controller;

use think\Db;
use think\facade\Session;

class Index extends Base {
    
    public function index(){
        
        $webinfo = include 'webinfo.php';
        $this->assign('webinfo', $webinfo);
        $this->assign('title','个人中心');
        
        return $this->fetch();
    }
    
    public function share(){
    	
    	if ($this->user['level'] != 0) {
    		$PNG_TEMP_DIR = './temp'.DIRECTORY_SEPARATOR;
    		$PNG_WEB_DIR = 'temp/';
    		include '../vendor/phpqrcode/qrlib.php';
    		if (!file_exists($PNG_TEMP_DIR)){
    			mkdir($PNG_TEMP_DIR);
    		}
    		$str = _encrypt($this->user['id']);
    		//array('L','M','Q','H')
    		$errorCorrectionLevel = 'Q';
    		$matrixPointSize = 5;
    		$filename = $PNG_TEMP_DIR.'share'.md5($this->user['id'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    		//http://127.0.0.1:8888/index/login/register/q/32c6CAAEUQNVBggDB1YABAtUVVQNVQMABQIAUVVXBw.html
//     		echo $domain = $this->request->domain().url('login/register',['q' => $str]);;
//     		exit;
    		$valid_time = 3600*24*7;
    		$domain = $this->request->domain().url('login/register',['q' => $str]);
    		if (!file_exists($filename) || (time()-filectime($filename)) >= $valid_time){
    			\QRcode::png($domain, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    		}
    		$this->assign('link', $domain);
    		$this->assign('img', $this->request->domain().$filename);
    		$this->assign('qrcode', ltrim($filename,'.'));
    		    		
    		$this->assign('auth',1);
    	}else{
    		$this->assign('auth', 0);
    	}
        $this->assign('title', '专属推荐码');
        return $this->fetch();
    }
    
    public function info(){
        if ($this->request->isPost() && $this->request->isAjax()) {
            $wechat = $this->request->post('memberdata.weixin');
            $realname = $this->request->post('memberdata.realname');
            if (empty($wechat)) $this->error('请输入微信号!');
           
           $find = Db::name('users')->where(['wechat' => $wechat])
            ->where('id','<>', $this->user['id'])->find();
            if (!empty($find)) $this->error('微信号已存在!');
            if (Db::name('users')->where(['id' => $this->user['id']])->update([
                'wechat' => $wechat,'username' => $realname,
                'update_time' => time()
            ])){
                $this->success('ok');
            }else{
                $this->success('保存失败!');
            }
            return;
        }
        $this->assign('title', '修改资料');
        return $this->fetch();
    }
    
    public function set(){
        $this->assign('title', '设置');
        return $this->fetch();
    }
    
    // protected $middleware = ['Check','Auth']; //调用中间件
    
    public function sendcode(){
        if ($this->request->isAjax() && $this->request->isPost()) {
            $mobile = $this->request->post('mobile');
            $type = $this->request->post('op');
            $message = new \service\Message();
            if ($type == 'ismem'){
                $find = db('users')->where(['mobile' => $mobile])->find();
                if (empty($find)) $this->error('会员手机号不存在!');
                $checkcode = $message->send($this->request);
                $this->success('您的验证码是：'.$checkcode);
            }elseif ($type == 'checkcode'){
                if ($message->check($this->request)){
                    $this->success('ok');
                }else{
                    $this->error('验证码错误!');
                }
            }
        }
    }
    
    public function setpwd(){
        if ($this->request->isAjax() && $this->request->isPost()) {
            $mobile = $this->request->post('mobile');
            $oldpassword = $this->request->post('oldpassword');
            $new_password = $this->request->post('passwords');
            $cpassword = $this->request->post('cpassword');
            if (!Session::has('check_status') && session('check_status') == 'success'){
                $this->error('验证码错误!');
            }
            if (mb_strlen($new_password) < 6) $this->error('登录密码长度不小于6位!');
            if ($new_password != $cpassword) $this->error('两次密码不一致!');
            $find = db('users')->where(['mobile' => $mobile])->find();
            if ($find['password'] != md5(md5($oldpassword))){
                $this->error('旧密码不相同!');
            }
            
            if(db('users')->where(['mobile' => $mobile])->update([
                'update_time' => time(),
                'password' => md5(md5($new_password))
            ])){
                $message = new \service\Message();
                $message->clear($mobile);
                $this->success('ok', url('login/logout'));
            }else{
                $this->error('修改失败');
            }
            return;
        }
        return $this->fetch();
    }
    
    
}
