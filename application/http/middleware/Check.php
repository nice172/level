<?php
namespace app\http\middleware;
use think\Request;

class Check {
    public function handle(Request $request, \Closure $next) {
//         if ($request->param('name') == 'think') {
//             return redirect('index/think');
//         }

//         p($request);
       
       echo 'check'; 
        
        
        return $next($request);
    }
}