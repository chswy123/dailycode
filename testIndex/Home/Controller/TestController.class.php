<?php
	namespace Home\Controller;
	use Think\Controller;

class TestController extends BaseController{


	public function testindex(){

		$model = D('Test');
		$info = $model -> findall();

		$this -> assign(array(
				'info' => $info
			));

		$this->display();
	}












}