<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
	/*
	*	获得用户首页数据
	*/
	public function getUser()
	{
		$sql = '
			select 
				u.*,
				r.*
			from t_sys_user as u
			left join t_sys_userrole as ur
			on u.user_id = ur.user_id
			left join t_sys_role as r
			on ur.role_id = r.role_id
		';
		$res = $this->query($sql);
		// var_dump($res);die;
		return $res;
	}


	/*
	*	获得用户对应页面菜单数据
	*/
	public function getMenu($user_id)
	{
		$sql="
			select 
				u.user_id,
				u.user_name,
				r.*,
				m.*
			from t_sys_user as u
			left join t_sys_userrole as ur
			on u.user_id = ur.user_id
			left join t_sys_role as r 
			on ur.role_id = r.role_id
			left join t_sys_rolemenu as rm
			on r.role_id = rm.role_id
			left join t_sys_menu as m
			on rm.m_id = m.id 
			where u.user_id = '{$user_id}'
		";
		$res = $this->query($sql);
		return $res;
	}





	/*
	*	验证用户
	*/
	public function checkUser()
	{	
		$user_name = $_POST['user_name'];
		$user_pwd	= $_POST['user_pwd'];
		$user = D('User');
		if(!empty($user_name))
		{	
			$count = $user->where(array('user_name'=>array('eq',$user_name)))->find();
			// var_dump($count);die;
			if(!empty($count))
			{	
				if($count['user_pwd']==md5($user_pwd))
				{
					$_SESSION['user_id'] = $count['user_id'];
					$_SESSION['user_name'] = $count['user_name'];

					return TRUE;
				}
				else
				{
					$this->error='密码不正确！';
					return FALSE;
				}
				
			}
			else
			{
				$this->error='用户不存在！';
				return FALSE;
			}
		}
		$select = $user->select();
	}



	/*
	*	添加用户
	*/
	public function addUser()
	{
		$data['user_name'] = $_POST['user_name'];
		$data['user_pwd'] = md5($_POST['user_pwd']);
		// $data['user_id'] = rand(10000,20000);
		$data['user_id'] = $this->getUid();

		// var_dump($data);die;
		if(!empty($data['user_name'])&&!empty($data['user_pwd']))
		{	
			if(!empty($_POST['role']))
			{
				$res = $this->add($data);

				$ur_model = D('Userrole');
				$role_res = $ur_model->add(array('user_id'=>$data['user_id'],'role_id'=>$_POST['role']));
				// var_dump($user_info);die;
				return TRUE;
			}
			else
			{
				$this->error='角色不能为空';
				return FALSE;
			}
		}
		else
		{
			$this->error='用户名或密码不能为空';
			return FALSE;
		}
 	}



 	/*
	*	获得唯一user_id
	*/
	public function getUid()
	{
		$user_info = $this->select();
		foreach($user_info as $uk=>$uv)
		{	
			$user_id = array();
			$user_id[] = $uv['user_id'];
		}


		for($i=0;$i<=10000;$i++)
		{	
			$rand_id = rand(10000,20000);
			if(!in_array($rand_id,$user_id))
			{
				return $rand_id;
				die;
			}
		}

	}


















}
