<?php
namespace Home\Controller;
use Think\Controller;
class TrainController extends Controller{

	// public static $a='';

	public function train(){
		// print_r("__ROOT__");exit;
		$this->display();
	}

	public function chaxun(){
		// print_r($_POST);exit;
		if(IS_POST){
			$chufa=$_POST['chufa'];
			$daoda=$_POST['daoda'];
			$date=$_POST['date'];
			$chufa=urlencode($chufa);
			$daoda=urlencode($daoda);
			// print_r($city);exit;
			$ch = curl_init();
		    $url = 'http://apis.baidu.com/qunar/qunar_train_service/s2ssearch?version=1.0&from='.$chufa.'&to='.$daoda.'&date='.$date;
		    $header = array(
		        'apikey: 2383f4209ac7a5c7578d316ce231b0cf',
		    );
		    // 添加apikey到header
		    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    // 执行HTTP请求
		    curl_setopt($ch , CURLOPT_URL , $url);
		    $res = curl_exec($ch);
		    $res=json_decode($res,1);
		    // echo '<pre>';
		    // print_r($res);exit;

		    $this->assign(array(
		    		'date'=>$date,
		    		'info'=>$res
		    	));
		    $this->display();
		    // var_dump(json_decode($res));
		}
		
	}


	public function details(){
		// print_r($a);
		$this->display();
	}




















}