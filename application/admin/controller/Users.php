<?php
namespace app\admin\controller;
class Users extends Base {
    
    public function index(){
    	
    	$start_date = $this->request->param('start_date','strtotime');
    	$end_date = $this->request->param('end_date','strtotime');
    	$username = $this->request->param('username');
    	$mobile = $this->request->param('mobile');
    	
    	$db = db('users');
    	
    	if ($start_date && $end_date) {
    		$db->whereTime('create_time', '>=', $start_date);
    		$db->whereTime('create_time', '<=', $end_date);
    	}
    	
    	if ($username != ''){
    		$db->where('username','like',"%{$username}%");
    	}
    	if ($mobile != '') {
    		$db->where('mobile','=', $mobile);
    	}
    	
		$list = $db->paginate(2);
		
		//echo \think\Db::name('')->getLastSql();
		
		$this->assign('users', $list);
		$this->assign('count', $list->total());
		$this->assign('start',1);
        return $this->fetch();
    }
    
    public function edit(){
        
    }
    
}