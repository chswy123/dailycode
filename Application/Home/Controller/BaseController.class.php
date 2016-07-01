<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$_SESSION['user_name'])
		{
			$this->error('请先登录！',U('Login/login'),1);
		}
	}
}