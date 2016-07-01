<?php
namespace Home\Model;
use Think\Model;
class RoleModel extends Model
{
	/*
	*	添加角色
	*/
	public function addRole()
	{
		$role = $_POST['role'];
		$menu = $_POST['menu'];
		if(!empty($role))
		{	
			if(!empty($menu))
			{
				$info = $this->add(array('role_name'=>$role));
				// var_dump($info);die;
				$role_id = $info;
				$rm_model = D('Rolemenu');
				foreach($menu as $k=>$v)
				{
					$res = $rm_model->add(array('role_id'=>$role_id,'m_id'=>$v));
				}
				return TRUE;
			}
			else
			{
				$this->error='菜单选项不能为空';
				return FALSE;
			}
			
		}
		else
		{
			$this->error="角色不能为空";
			return FALSE;
		}
			
	}






















}
