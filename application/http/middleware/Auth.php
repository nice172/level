<?php
namespace app\http\middleware;
use think\Request;

class Auth {
    
    public function handle(Request $request, \Closure $next) {
        
        echo 'auth';
        
        return $next($request);
    }
    
}