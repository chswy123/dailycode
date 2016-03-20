<?php
	namespace Home\Model;
	use Think\Model;

class AdminModel extends Model{

	/*
	*	登录
	*/
	public function login($user_name,$user_password){
		$res = $this -> where(array('user_name'=>array('eq',$user_name)))->find();
		if($res){
			if($res['user_password'] == md5($user_password.C('MIYAO'))){
				session('user_id',$res['user_id']);
				session('user_name',$res['user_name']);
				return true;
			}
			else{
				$this->error = '密码不正确';
				return false;
			}
		}
		else{
			$this->error = '用户名不正确';
			return false;
		}
	}


	






















}