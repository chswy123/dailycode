<?php
namespace Home\Controller;
use Think\Controller;
class ChatController extends Controller{
	
	public function chat(){



		$this->display();
	}


	public function ajaxsave(){
		
		$get=$_POST;
		if(!empty($_POST['data'])){
			$model=D("chat");
			$info=$model->chat();
			echo $get["data"];

		}
		// var_dump($get);exit;
		
		// foreach($get as $k=>$v){
		// 	echo $v;
		// }

	}












}