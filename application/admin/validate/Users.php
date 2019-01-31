<?php

namespace app\admin\validate;

 use think\Validate;

 class Users extends Validate
 {
     protected $rule = [
         'username|登录账户' => 'require|alphaDash|length:1,25|token',
         'password|登录密码' => 'require|alphaDash|length:6,30',
         'nickname|员工姓名' => 'require|chs',
         'group_id|角色'        => 'require',
     ];
     protected $message = [
         'username.require'   => ':attribute不能为空',
         'username.alphaDash' => ':attribute只能使用字母和数字下划线_及破折号-',
         'username.length'    => ':attribute长度范围6-25',
         'password.require'   => ':attribute不能为空',
         'password.alphaDash' => ':attribute只能使用字母和数字下划线_及破折号-',
         'password.length'    => ':attribute长度范围6-30',
         'verify.require'     => ':attribute不能为空',
         'group_id.require'      => ':attribute不能为空',
         'nickname.require'   => ':attribute不能为空',
         'nickname.chs'       => ':attribute只能中文',
     ];
     protected $scene = [
         'register' => ['username', 'password'],
         'login'    => ['username', 'password'],
         'add'      => ['username', 'nickname', 'password', 'group_id'],
         'edit'     => ['username', 'nickname', 'bumen'],
         'update'   => ['password']
     ];

 }