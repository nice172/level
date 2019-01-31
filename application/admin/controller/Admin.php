<?php
namespace app\admin\controller;

use think\Db;

class Admin extends Base {
    
    public function edit(){
        if($this->request->isAjax() && $this->request->isPost()){
            $user_email = $this->request->post('user_email');
            $password = $this->request->post('password');
            $repassword = $this->request->post('password_confirm');
            if (empty($user_email)) $this->error('请输入邮箱');
            if (empty($password)) $this->error('请输入密码');
            if ($password != $repassword) $this->error('确认密码不一相同');
            $user_id = intval($this->request->post('id'));
            
            //$find = db('admin')->where([['user_email','=', $user_email],['id','<>',$user_id]])->find();
            $find = db('admin')->where(['user_email' => $user_email])
            ->where('id','<>',$user_id)->find();
            //echo db()->getLastSql();// 5.1获取不到 方法无效
            //echo Db::name('')->getLastSql();
            
            if (!empty($find)) $this->error('邮箱已存在');
            $data = [
                'user_email' => $user_email,'user_password' => create_hash($password),
                'update_time' => time()
            ];
            if(db('admin')->where(['id' => $user_id])->update($data)){
                $this->success('保存成功');
            }else{
                $this->error('保存失败');
            }
            return;
        }
        $this->assign('roles',[]);
        return $this->fetch();
    }
    
}