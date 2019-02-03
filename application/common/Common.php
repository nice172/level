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
	
}