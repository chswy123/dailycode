<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    
    public function index(){
    	$ch = curl_init();
	    $url = 'http://apis.baidu.com/apistore/weatherservice/weather?citypinyin=beijing';
	    $header = array(
	        'apikey: 2383f4209ac7a5c7578d316ce231b0cf',
	    );
	    // 添加apikey到header
	    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    // 执行HTTP请求
	    curl_setopt($ch , CURLOPT_URL , $url);
	    $res = curl_exec($ch);

	    // echo '<pre>';
	    // var_dump(json_decode($res));
	    $res=json_decode($res,1);
	    // print_r($res);exit;	

	    $this->assign(array(
	    		'info'=>$res
	    	));
    	$this->display();
    }

    public function weather(){
    	


	    	// $this->display();
	    }


    public function ajaxtime(){
    	// echo 123;
    	$date=Date("Y-m-d H:i:s");
    	// print_r($date);exit;
    	echo $date;
    }



    

   

    

















}