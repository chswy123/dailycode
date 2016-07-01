<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController
{
	/*
	* 用户展示
	*/
	public function index()
	{	
		$usermodel = D('User');
		$userinfo = $usermodel->getUser();

		$this->assign(array(
				'list' => $userinfo,
			));
		$this->display();
	}



	/*
	* 增加用户
	*/
	public function addUser()
	{	
		if(IS_POST)
		{
			// var_dump($_POST);die;
			$usermodel = D('User');
			$res = $usermodel->addUser();
			if($res)
			{
				$this->success('添加成功',U('Home/User/index'),1);
				exit;
			}
			else
			{
				$this->error($usermodel->getError(),'',1);
			}
		}

		$rolemodel = D('Role');
		$roleinfo = $rolemodel->select();

		$this->assign(array(
				'role' => $roleinfo
			));
		$this->display();
	}










}