<?php
namespace Home\Model;
use Think\Model;
class ChatModel extends Model{

	public function chat(){
		$model=M("chat");
		$data=$_POST;
		$data['date']=Date("Y-m-d H:i:s");
		$model->data($data)->add();
	}




















}