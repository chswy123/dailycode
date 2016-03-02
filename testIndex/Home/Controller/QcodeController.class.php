<?php
namespace Home\Controller;
use Think\Controller;
class QcodeController extends Controller{

	public function msg(){
    	if(IS_POST){	
	    	// $net = I('post.');
	    	$net=$_POST;
	    	// print_r($net);exit;
	    	$ch = curl_init();
		    $url = 'http://apis.baidu.com/3023/qr/qrcode?size=8&qr=http%3A%2F%2F'.$net['msg'];
		    $header = array(
		        'apikey: 2383f4209ac7a5c7578d316ce231b0cf',
		    );
		    // 添加apikey到header
		    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    // 执行HTTP请求
		    curl_setopt($ch , CURLOPT_URL , $url);
		    $res = curl_exec($ch);
		    $arr = json_decode($res,1);
		    // print_r($arr);exit;
		    $this->assign(array(
		    		'net'=>$arr,
		    		'info'=>$net
		    	));
	    }
    	$this->display();
    	
    }

    public function qcode(){

	    $this->display();

    }


















}