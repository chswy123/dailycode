<?php
namespace Home\Controller;
use Think\Controller;
class WeixinController extends BaseController
{	
	/*
	*	微信管理首页
	*/
	public function index()
	{
		// $model = M('news','wx_');
		// $info = $model->select();
		// var_dump($info);die;
		$this->display();
	}


	/*
	*	微信管理 图文页
	* 
	*/
	public function news()
	{	

		$this->display();
	}


	/*
	*	微信管理  订阅提示页
	*/
	public function title()
	{
		$this->display();
	}



	/*
	*	微信管理 链接页
	*/
	public function web()
	{	
		$web_model = M('web','wx_');
		$web_info = $web_model->select();
		// var_dump($web_info);die;

		$this->assign(array(
				'info'=>$web_info
			));
		$this->display();
	}


	/*
	*	微信管理 链接页  新增
 	*/
	public function addweb()
	{
		if(IS_POST)
		{
			$params = $_POST;
			// var_dump($params);die;
			$web_model = M('web','wx_');
			if($params['tag']=='1')
			{
				//先改变数据库中存在的tag为1的，将其变成0
				$web_info = $web_model->where('tag = 1')->find();
				$res = $web_model->save(array('id'=>$web_info['id'],'tag'=>'0'));
				// var_dump($res);die;
				if($res)
				{	
					$result = $web_model->add($params);
					// var_dump($result);die;
					if($result)
					{
						$this->success('新增成功',U('Weixin/web'),1);
						exit;
					}
					else
					{
						$this->error('新增失败','',1);
						exit;
					}
					
				}
				else
				{
					$this->error('新增失败','',1);
					exit;
				}
			}
			else if($params['tag']=='0')
			{
				//只是存入
				$result = $web_model->add($params);
				if($result)
				{
					$this->success('新增成功',U('Weixin/web'),1);
					exit;
				}
				else
				{
					$this->error('新增失败','',1);
					exit;
				}
			}


		}

		$this->display();
	}














}