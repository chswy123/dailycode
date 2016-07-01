<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller
{	
	/*
	*	用户登录
	*/
	public function login()
	{	
		if(IS_POST)
		{
			$adminModel = D('User');
			$info = $adminModel->checkUser();
			if($info)
			{
				$this->success('登录成功!',U('Home/Index/index'),1);
				exit;
			}
			else
			{
				$this->error($adminModel->getError(),'',1);
			}
		}
		$this->display();
	}



	/*
	*	用户注销登录
	*/
	public function logout()
	{	
		$res = session(null);
		$this->success('注销成功！',U('Login/login'),1);
	}





















}