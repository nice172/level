<?php
namespace app\index\controller;

class User extends Base {
    
    public function index(){
        
    }
    
    public function apply(){
    	
    	$message_log = db('apply')->where(['status' => 0,'user_id' => $this->user['id']])->find();
    	if (!empty($message_log)){
    		
    		$recommend_info = db('check_log c')
    		->join('__USERS__ u','c.check_uid=u.id')
    		->where(['c.log_id' => $message_log['id']])
    		->field('c.*,u.wechat,u.username,u.mobile')->order('c.id asc')->select();
    		
    		$this->assign('recommend', $recommend_info);
    		$this->assign('level_num', $this->user['level']);
    		return $this->fetch('message');
    	}
    	
    	$levelAll = $this->level();
    	
    	$current_level = '';
    	
    	if ($this->user['level'] <= 0) {
    		$current_level = '普通会员';
    	}else{
    		foreach ($levelAll as $key => $value) {
    			if ($value['level'] == $this->user['level']) {
    				$current_level = $value['name'];
    				break;
    			}
    		}
    	}
    	
    	$update_level_text = '';
    	if ($this->user['level'] < 9) {
    		$update_level = $this->user['level']+1;
    		foreach ($levelAll as $key => $value) {
    			if ($value['level'] == $update_level) {
    				$update_level_text = $value['name'];
    				break;
    			}
    		}
    	}else{
    		$update_level_text = '当前最高级别';
    	}
    	
    	$this->assign('update_level_text', $update_level_text);
    	$this->assign('current_level', $current_level);
    	$this->assign('level', $levelAll);
    	return $this->fetch();
    }
    
    public function postcheck(){
    	if ($this->request->isAjax() && $this->request->isPost()) {
    		$update_level = 0;
    		if ($this->user['level'] < 9) {
    			$update_level = $this->user['level']+1;
    		}
    		if (!$update_level) $this->error('当前最高级别');
    		
    		$find = db('apply')->where(['status' => 0,'user_id' => $this->user['id']])->find();
    		if (!empty($find)){
    			$this->success('等待审核');
    			return;
    		}
    		
    		//普通会员
    		if ($this->user['level'] == 0){
	    		//找到推荐人微信
	    		$recommend_info = db('users')->where(['username' => $this->user['recommend_name']])->find();
	    		if (empty($recommend_info)) {
	    			$this->error('找不到推荐人微信');
	    		}
	    		//找到五星会员微信
	    		$xUser = db('users')->where(['level' => 5])->order('id desc')->find();
	    		if (empty($xUser)) {
	    			$this->error('找不到五星会员微信');
	    		}
    		}
    		
    		//如果是一星升二星
    		if ($update_level == 2) {
    			//判断直接推荐3个1星会员
    			$count = db('users')->where(['recommend_uid' => $this->user['id']])
    			->where('level','>=', 1)->count('id');
    			if ($count < 3) {
    				$this->error('需要推荐3个一星会员');
    			}
    		}
    		
    		//四星升五星
    		if ($update_level == 5) {
    			//判断累计81个一星会员
    			$count = db('users')->where('level','>=', 1)->count('id');
    			if ($count < 81) {
    				$this->error('需要累计81个会员');
    			}
    			
    			//上级5星会员
    			$check_1 = db('users')->where(['level' => 5])->order('id desc')->find();
    			if (empty($check_1)) {
    				$this->error('升级条件不满足.');
    			}
    			
    			//上级9星会员
    			$check_2 = db('users')->where(['level' => 9])->order('id desc')->find();
    			if (empty($check_2)) {
    				$this->error('升级条件不满足.');
    			}
    			
    		}else{
	    		//上级会员
	    		$last_user = db('users')->where(['level' => $update_level])->order('id desc')->find();
	    		if (empty($last_user)) {
	    			$this->error('升级条件不满足.');
	    		}
    		}
    		if($insert_id = db('apply')->insertGetId([
    			'user_id' => $this->user['id'],
    			'mobile' => $this->user['mobile'],
    			'level' => $update_level,
    			'create_time' => time()
    		])){
    			if ($update_level == 1){
	    			$recomm = [
	    				'log_id' => $insert_id,
	    				'check_uid' => $recommend_info['id'],
	    				'mobile' => $recommend_info['mobile'],
	    				'check_name' => $recommend_info['username'],
	    				'create_time' => time()
	    			];
	    			$xUserCheck = [
	    				'log_id' => $insert_id,
	    				'check_uid' => $xUser['id'],
	    				'mobile' => $xUser['mobile'],
	    				'check_name' => $xUser['username'],
	    				'create_time' => time()
	    			];
	    			$dataSet = [$recomm, $xUserCheck];
	    			db('check_log')->insertAll($dataSet);
    			}elseif ($update_level == 5){
    				$checkData = [
    						'log_id' => $insert_id,
    						'check_uid' => $check_1['id'],
    						'mobile' => $check_1['mobile'],
    						'check_name' => $check_1['username'],
    						'create_time' => time()
    				];
    				$checkData2 = [
    						'log_id' => $insert_id,
    						'check_uid' => $check_2['id'],
    						'mobile' => $check_2['mobile'],
    						'check_name' => $check_2['username'],
    						'create_time' => time()
    				];
    				$dataSet = [$checkData, $checkData2];
    				db('check_log')->insertAll($dataSet);
    			}else{
    				db('check_log')->insert([
    					'log_id' => $insert_id,
    					'check_uid' => $last_user['id'],
    					'mobile' => $last_user['mobile'],
    					'check_name' => $last_user['username'],
    					'create_time' => time()
    				]);
    			}
    			$this->success('提交申请成功');
    		}else{
    			$this->error('提交申请失败');
    		}		
    	}
    }

    public function check(){
    	if ($this->request->isAjax() && $this->request->isPost()) {
    		$type = $this->request->post('type');
    		$id = $this->request->post('id');
    		$find = db('check_log')->where(['check_uid' => $this->user['id'],'log_id' => $id])->find();
    		if (empty($find)) $this->error('操作失败1');
    		db()->startTrans();
    		if ($type == 1){
    			//通过
    			$x1 = db('check_log')->where(['check_uid' => $this->user['id'],'log_id' => $id])
    			->update(['check_status' => 1,'check_time' => time()]);
    		}else{
    			//拒绝
    			$x1 = db('check_log')->where(['check_uid' => $this->user['id'],'log_id' => $id])
    			->update(['check_status' => 2,'check_time' => time()]);
    		}
    		if ($x1){
    			
    			$apply = db('apply')->where(['id' => $find['log_id']])->find();
    			if ($apply['level'] == 1 || $apply['level'] == 5){
    				$check_log = db('check_log')->where(['log_id' => $find['log_id']])->select();
    				$check_status = [];
    				foreach ($check_log as $value){
    					$check_status[] = $value['check_status'];
    				}
    				$status = 2;
    				if (count(array_unique($check_status)) == 1){
    					$status = 1;
    				}
    			}else{
    				$check_log = db('check_log')->where(['log_id' => $find['log_id']])->find();
    				$status = 1;
    				if ($check_log['check_status'] == 2){
    					$status = 2;
    				}
    			}
    			
    			$a = db('apply')->where(['id' => $find['log_id']])->update(['status' => $status]);
    			$b = db('users')->where(['id' => $apply['user_id']])->update(['level' => $apply['level']]);
    			if ($a && $b) {
    				db()->commit();
    			}
    			$this->success('操作成功');
    		}
    		db()->rollback();
    		$this->error('操作失败');
    		return;
    	}
    	$lists = db('check_log c')->join('__APPLY__ a','c.log_id=a.id')
    	->where(['check_uid' => $this->user['id']])
    	->where('check_time','=',0)->field('a.*,c.check_time')->select();
    	foreach ($lists as $key => $value) {
    		$find = db('users')->where(['id' => $value['user_id']])
    		->field('username,wechat')->find();
    		$lists[$key]['username'] = $find['username'];
    		$lists[$key]['wechat'] = $find['wechat'];
    		foreach ($this->level() as $val) {
    			if ($val['level'] == $value['level']){
    				$lists[$key]['level_text'] = $val['name'];
    				break;
    			}
    		}
    	}
    	
    	$this->assign('lists', $lists);
    	return $this->fetch('update');
    }

    public function log(){
    	$lists = db('check_log c')->join('__APPLY__ a','c.log_id=a.id')
    	->where(['check_uid' => $this->user['id']])
    	->where('check_time','<>',0)->field('a.*,c.check_time')->select();
    	foreach ($lists as $key => $value) {
    		$find = db('users')->where(['id' => $value['user_id']])
    		->field('username,wechat')->find();
    		$lists[$key]['username'] = $find['username'];
    		$lists[$key]['wechat'] = $find['wechat'];
    		foreach ($this->level() as $val) {
    			if ($val['level'] == $value['level']){
    				$lists[$key]['level_text'] = $val['name'];
    				break;
    			}
    		}
    	}
    	
    	$this->assign('lists', $lists);
    	return $this->fetch();
    }
    
    public function team(){
    	
    	$count = db('check_log c')->join('__APPLY__ a','c.log_id=a.id')
    	->join('__USERS__ u','u.id=a.user_id')
    	->where(['c.check_uid' => $this->user['id']])
    	->where(['a.status' => 1])
    	->where('u.level','>=',1)->count('u.id');
    	
    	$this->assign('count',$count);
    	
    	$users = db('check_log c')->join('__APPLY__ a','c.log_id=a.id')
    	->where(['check_uid' => $this->user['id']])
    	->where('check_time','<>',0)->field('a.*,c.check_time')->paginate(1000);
    	$userList = $users->all();
    	foreach ($userList as $key => $value) {
    		$find = db('users')->where(['id' => $value['user_id']])->field('wechat,level,username')->find();
    		$userList[$key]['wechat'] = $find['wechat'];
    		$userList[$key]['username'] = $find['username'];
    		if ($find['level']){
	    		foreach ($this->level() as $val){
	    			if ($find['level'] == $val['level']){
	    				$userList[$key]['level_text'] = $val['name'];
	    				break;
	    			}
	    		}
    		}else{
    			$userList[$key]['level_text'] = '普通会员';
    		}
    	}
    	$this->assign('users', $userList);
    	$this->assign('total', $users->total());
    	return $this->fetch();
    }
    
}