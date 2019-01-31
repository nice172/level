<?php
namespace app\admin\controller;
class Users extends Base {
    
    public function index(){
        $this->assign('count',0);
        return $this->fetch();
    }
    
    public function edit(){
        
    }
    
}