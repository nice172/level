<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;

// Route::get('think', function () {
//     return 'hello,ThinkPHP5!';
// });

// Route::bind('index');

// Route::get('hello/:name', 'index/hello');

// Route::get('setpwd/:id','index/setpwd');
// Route::rule('setpwd','index/setpwd', 'POST'); //指定必须使用POST请求
// Route::rule('setpwd','index/setpwd','GET|POST');

// Route::get('index','index/setpwd')->middleware(app\http\middleware\Check::class);

Route::get('share','index/share');

return [
    
];
