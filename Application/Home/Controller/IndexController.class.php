<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController 
{
    public function index()
    {
    	$user_id = $_SESSION['user_id'];
    	//获得登录用户所对应的页面有哪些
    	$usermodel = D('User');
    	$res_menu = $usermodel->getMenu($user_id);
    	foreach($res_menu as $rk=>$rv)
    	{
    		$temp[] = $rv['menu_id'];
    	}
    	$temp = array_unique($temp);
    	$menumodel = D('Menu');
    	foreach($temp as $tk=>$tv)
    	{
    		$head_menu[] = $menumodel->where(array('id'=>$tv))->find();
    	}
    	$menu_info = array_merge($res_menu,$head_menu);
    	// var_dump($menu_info);die;

		$_SESSION['menu'] = $menu_info;
		// var_dump($_SESSION);die;
    	
        $this->display();
    }
}