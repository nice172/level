<?php
namespace app\admin\controller;
use app\common\Common;
use think\facade\Request;

class Base extends Common {
    
    private $loginUser;
    
    public function initialize() {
        parent::initialize();
        
        $user_id = session('user_id');
        if (empty($user_id)) {
            return $this->redirect(url('login/index'));
        }
        $this->loginUser = db('admin')->where(['id' => $user_id])->find();
        if (empty($this->loginUser)) {
        	return $this->redirect(url('login/index'));
        }
        
        $this->assign('loginUser',$this->loginUser);
        $request = Request::instance();
        define('MODULE_NAME', $request->module());
        define('CONTROLLER_NAME', $request->controller());
        define('ACTION_NAME', $request->action());
        define('REQUEST_URL', $request->url());
        
        $permissions = [
            [
                'url' => url('users/index'),
                'title' => '会员列表',
                'icon' => 'fa fa-user',
            ],
            [
                'url' => url('users/check'),
                'title' => '会员升级审批管理',
                'icon' => 'fa fa-user',
            ],
            [
                'url' => url('system/config'),
                'title' => '系统设置',
                'icon' => 'fa fa-cog',
                'submenu' => [
                    ['title' => '基础设置',
                     'url' => url('system/config'),],
                    ['title' => '客服资料',
                     'url' => url('system/kfset'),]
                ],
            ],
        ];
        $this->assign('permissions',$permissions);
        
    }
 
}