<?php
namespace app\common;
use think\Controller;

class Common extends Controller {
	
	public function _empty(){
		$this->redirect(url('index/index'));
	}
	
	protected function level(){
		$level = [
				[
						'name' => '一星会员',
						'level' => 1,
				],
				[
						'name' => '二星会员',
						'level' => 2,
				],
				[
						'name' => '三星会员',
						'level' => 3,
				],
				[
						'name' => '四星会员',
						'level' => 4,
				],
				[
						'name' => '五星会员',
						'level' => 5,
				],
				[
						'name' => '六星会员',
						'level' => 6,
				],
				[
						'name' => '七星会员',
						'level' => 7,
				],
				[
						'name' => '八星会员',
						'level' => 8,
				],
				[
						'name' => '九星会员',
						'level' => 9
				]
		];
		return $level;
	}
	
	protected function wxConfig() {
	    $this->assign('site_name',config('web.site_name'));
	    $this->assign('domain',$this->request->domain());
	    $jssdk = new \JSSDK(config('webinfo.appid'), config('webinfo.appSecret'));
	    $signPackage = $jssdk->GetSignPackage();
	    $this->assign('signPackage', $signPackage);
	    $this->assign('share_title', config('webinfo.share_title'));
	    $this->assign('share_desc', config('webinfo.share_desc'));
	}
	
}