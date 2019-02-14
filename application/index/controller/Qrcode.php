<?php
namespace app\index\controller;

use app\common\Common;

class Qrcode extends Common {
    
    public function index(){
        
        $webinfo = config()['webinfo'];
        $this->assign('webinfo', $webinfo);
        
        $this->wxConfig();
        
        $this->assign('title','关注公众号');
        return $this->fetch();
    }
    
}