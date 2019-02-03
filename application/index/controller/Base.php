<?php
namespace app\index\controller;

use app\common\Common;

class Base extends Common {
	
    protected $user;
    
    protected function initialize(){
        parent::initialize();
        
        $user = session('user');
        if (empty($user)) {
            return $this->redirect(url('login/index'));
        }
        $user = db('users')->where(['id' => $user['user_id']])->find();
        if (empty($user)) {
            return $this->redirect(url('login/index'));
        }
        $this->user = $user;
        $this->assign('user', $user);
        
        $this->assign('site_name',config('web.site_name'));
        $this->assign('domain',$this->request->domain());
    }
    
}