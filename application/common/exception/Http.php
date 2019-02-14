<?php
namespace app\common\exception;

use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;

class Http extends Handle {
    
    public function render(Exception $e){
        //return response($e->getMessage(), $e->getStatusCode());
        // 参数验证错误
        if ($e instanceof ValidateException) {
//             p(json($e->getError(), 422));
//             exit;
        }
        
        // 请求异常
        if ($e instanceof HttpException && request()->isAjax()) {
            //return response($e->getMessage(), $e->getStatusCode());
        }
        
        return redirect(url('index/index'));
        //TODO::开发者对异常的操作
        //可以在此交由系统处理
        return parent::render($e);
    }
    
}