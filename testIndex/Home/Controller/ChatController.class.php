<?php
namespace Home\Controller;
use Think\Controller;
class ChatController extends BaseController{
	
	public function chat(){

		// echo '<pre>';
		$ip = $_SERVER['REMOTE_ADDR'];

		// $ip_arr = explode('.',$ip);
		// print_r($ip_arr);
		$this->assign(array(
				'ipname' => $ip
			));

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