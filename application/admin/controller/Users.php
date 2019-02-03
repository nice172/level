<?php
namespace app\admin\controller;
use think\Db;
class Users extends Base {
    
    public function index(){
    	
    	$start_date = $this->request->param('start_date','','strtotime');
    	$end_date = $this->request->param('end_date','','strtotime');
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
    	$db->order('id desc');
    	
    	if (isset($_GET['export'])){
    		$lists = $db->select();
    		$this->export($lists);
    		exit;
    	}else{
			$list = $db->paginate(10);
    	}
		// echo \think\Db::name('')->getLastSql();
		
		$this->assign('users', $list);
		$this->assign('count', $list->total());
		$this->assign('start',1);
        return $this->fetch();
    }
    
    public function check(){
    	$db = db('apply a')->join('__USERS__ u','a.user_id=u.id');
    	$username = $this->request->param('username');
    	$mobile = $this->request->param('mobile');
    	$checku = $this->request->param('checku');
    	
    	if ($username != ''){
    		$db->where('u.username','like',"%{$username}%");
    	}
    	if ($mobile != '') {
    		$db->where('a.mobile','=', $mobile);
    	}
    	if ($checku != '') {
    		$db->where('u.username','like',"%{$checku}%");
    	}
    	$db->order('a.id desc');
    	
    	$message_log = $db->field('a.*,u.username as myuser')->paginate(10);
    	
    	$data = $message_log->all();
    	foreach ($data as $key => $value) {
    		$recommend_info = db('check_log c')
    		->join('__USERS__ u','c.check_uid=u.id')
    		->where(['c.log_id' => $value['id']])
    		->field('c.*,u.wechat,u.username,u.mobile as u_mobile')->order('c.id asc')->select();
    		$data[$key]['recommend_info'] = $recommend_info;
    	}
    	$level = $this->level();
    	foreach ($data as $key => $value) {
    		foreach ($level as $k => $val) {
    			if ($value['level'] == $val['level']){
    				$data[$key]['level_text'] = $val['name'];
    				break;
    			}
    		}
    	}
    	$this->assign('count', $message_log->total());
    	$this->assign('data', $data);
    	$this->assign('message_log', $message_log);
    	return $this->fetch();
    }
    
    public function create(){
    	if ($this->request->isAjax() && $this->request->isPost()) {
    		$recommend_name = $this->request->post('recommend_name');
    		$mobile = $this->request->post('mobile');
    		$wechat = $this->request->post('wechat');
    		$password = $this->request->post('password');
    		$cpassword = $this->request->post('password_confirm');
    		$truename = $this->request->post('username');
    		$level = $this->request->post('level');
    		if (empty($mobile)) $this->error('请输入手机号码!');
    		if (empty($wechat)) $this->error('请输入微信号!');
    		if (empty($password)) $this->error('请输入登录初始密码!');
    		if (mb_strlen($password) < 6) $this->error('登录密码长度不小于6位!');
    		if (!_checkmobile($mobile)){
    			$this->error('手机号码不正确!');
    		}
    		if ($password != $cpassword) $this->error('两次密码不一致!');
    		//if (empty($recommend_name)) $this->error('请输入推荐人!');
    		$data['username'] = $truename;
    		$data['recommend_name'] = $recommend_name;
    		$data['password'] = md5(md5($password));
    		$data['mobile'] = $mobile;
    		$data['wechat'] = $wechat;
    		$data['level'] = $level;
    		$data['type'] = 1;
    		$data['create_time'] = time();
    		$data['update_time'] = time();
    		
    		$find = db('users')->where(['mobile' => $mobile])->find();
    		if (!empty($find)) $this->error('手机号码已存在!');
    		
    		$find = db('users')->where(['wechat' => $wechat])->find();
    		if (!empty($find)) $this->error('微信号已存在!');
    		
    		if (Db::name('users')->insert($data) == 1){
    			$this->success('保存成功',url('index'));
    		}else{
    			$this->error('保存失败，请重试');
    		}
    		return;
    	}
    	
    	$level = $this->level();
    	$this->assign('level', $level);
    	return $this->fetch();
    }
    
    private function export($lists){
    	//导出数据
    	//$per_page = 100;
    	$title = "会员编号,姓名,手机号码,微信号,会员等级,推荐人,团队人数,一星以上人数,加入时间\n";
    	//输出http header
    	$filename = '会员数据-' . date('Ymd') . '.csv';
    	header("Content-type:text/csv");
    	header("Content-Disposition:attachment;filename=" . $filename);
    	header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    	header('Expires:0');
    	header('Pragma:public');
    	echo @iconv('UTF-8', 'GB18030//IGNORE', $title);
    	foreach ($lists as $key => $val){
    		$data = sprintf(
    				"%s,%s,%s,%s,%s,%s,%s,%s,%s\n",
    				$val['id'],
    				$val['username'],
    				$val['mobile'],
    				$val['wechat'],
    				$val['level'],
    				$val['recommend_name'],
    				$val['team_count'],$val['up_count'],
    				date('Y-m-d H:i:s', $val['create_time'])
    				);
    		echo @iconv('UTF-8', 'GB18030//IGNORE', $data);
    		unset($data);
    	}
    }
    
    public function delete(){
    	if ($this->request->isAjax() && $this->request->isPost()) {
    		$id = $this->request->param('id');
    		if (db('users')->where(['id' => $id])->delete()){
    			$this->success('删除成功');
    		}
    		$this->error('删除失败');
    	}
    }
    
    public function edit(){
    	$id = $this->request->param('id');
    	if ($this->request->isAjax() && $this->request->isPost()) {
    		$recommend_name = $this->request->post('recommend_name');
    		$mobile = $this->request->post('mobile');
    		$wechat = $this->request->post('wechat');
    		$password = $this->request->post('password');
    		$cpassword = $this->request->post('password_confirm');
    		$truename = $this->request->post('username');
    		$level = $this->request->post('level');
    		if (empty($mobile)) $this->error('请输入手机号码!');
    		if (empty($wechat)) $this->error('请输入微信号!');
    		
    		if (!empty($password) || !empty($cpassword)){
	    		if (empty($password)) $this->error('请输入登录密码!');
	    		if (mb_strlen($password) < 6) $this->error('登录密码长度不小于6位!');
	    		if ($password != $cpassword) $this->error('两次密码不一致!');
	    		$data['password'] = md5(md5($password));
    		}
    		if (!_checkmobile($mobile)){
    			$this->error('手机号码不正确!');
    		}
    		//if (empty($recommend_name)) $this->error('请输入推荐人!');
    		$data['username'] = $truename;
    		$data['recommend_name'] = $recommend_name;
    		$data['mobile'] = $mobile;
    		$data['wechat'] = $wechat;
    		$data['level'] = $level;
    		$data['update_time'] = time();
    		
    		$find = db('users')->where(['mobile' => $mobile])
    		->where('id','<>',$id)->find();
    		if (!empty($find)) $this->error('手机号码已存在!');
    		
    		$find = db('users')->where(['wechat' => $wechat])
    		->where('id','<>',$id)->find();
    		if (!empty($find)) $this->error('微信号已存在!');
    		
    		if (Db::name('users')->where(['id' => $id])->update($data) == 1){
    			$this->success('保存成功',url('index'));
    		}else{
    			$this->error('保存失败，请重试');
    		}
    		return;
    	}
    	
    	if (!$id) $this->error('id参数错误');
    	$user = db('users')->where(['id' => $id])->find();
    	if (empty($user)) $this->error('会员不存在');
    	$this->assign('user', $user);
    	$level = $this->level();
    	$this->assign('level', $level);
        return $this->fetch();
    }
    
    public function info(){
    	return "dev";
    	// return $this->fetch();
    }
    
}