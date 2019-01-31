<?php
namespace app\admin\validate;
use think\Validate;

class Index extends Validate {
    
    protected $rule = [
        'username'  =>  'require|max:25|token',
        'password' => 'require',
    ];
    
    protected $message = [
        'username.require' => '用户不为空',
        'username.max' => '用户最大25位',
        'password.require' => '请输入密码'
    ];
    
    protected $scene = [
        'add'  =>  ['username','password']
    ];
    
}