<?php
namespace Home\Controller;
use Think\Controller;
class RoleController extends BaseController
{
	/*
	* 角色展示首页
	*/
	public function index()
	{	
		$rolemodel = D('Role');
		$info = $rolemodel->select();

		$this->assign(array(
				'list'=>$info
			));
		$this->display();
	}




	/*
	* 角色展示首页
	*/
	public function addRole()
	{	
		if(IS_POST)
		{	
			$rolemodel = D('Role');
			$res = $rolemodel->addRole();
			if($res)
			{	
				$this->redirect('Role/index',0);
			}
			else
			{
				$this->error($rolemodel->getError(),'',1);
			}
		}

		$menumodel = D('Menu');
		$menuinfo = $menumodel->select();
		foreach($menuinfo as $k=>$v)
		{
			if($v['menu_id']=='0')
			{
				$menu_one[] = $menuinfo[$k];
			}
		}
		// var_dump($menu_one);die;
		foreach($menu_one as $ok=>$ov)
		{
			foreach($menuinfo as $kk=>$vv)
			{
				if($ov['id'] == $vv['menu_id'])
				{
					$menu_one[$ok]['child'][] = $menuinfo[$kk];
				}
			}
		}
		// var_dump($menu_one);die;

		$this->assign(array(
				'menu_info' => $menu_one
			));
		$this->display();
	}













}
