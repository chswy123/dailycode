<?php 
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller{

	public function news(){
    	$ch = curl_init();
	    $url = 'http://apis.baidu.com/songshuxiansheng/news/news';
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
	    $info = $arr['retData'];

	    $this->assign(array(
	    		'info'=>$info
	    	));
        $this->display();
	}

















}