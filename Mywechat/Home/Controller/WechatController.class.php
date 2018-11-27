<?php
namespace Home\Controller;
use Think\Controller;
// use Think\Model;
class WechatController extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}


    public function init()
	{
	    echo 999;die;
    	//获得参数 signature nonce token timestamp echostr
    	$nonce = $_GET['nonce'];
    	$token = 'weixin';
    	$timestamp = $_GET['timestamp'];
    	$echostr = $_GET['echostr'];
    	$signature = $_GET['signature'];

    	//形成数组，然后字典排序
    	$array = array();
    	$array = array($nonce, $timestamp, $token);
    	sort($array);

    	//拼接成字符串，sha1加密，然后与signature进行校验
    	$str = sha1(implode($array));

    	if ($str == $signature && $echostr) {
    		//第一次接入weixin api 接口的时候
    		echo $echostr;
    		exit;
    	} else {
    		$this->responseMsg();
    	}
    }

    //接收事件推送并回复
    public function responseMsg()
	{
    	//接收到微信推送过来的post数据(XML格式)
    	$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];

    	//处理消息类型，并设置回复类型和内容
		$postObj = simplexml_load_string($postArr);

		//判断该数据包是否是订阅的事件推送
		if (strtolower($postObj->MsgType) == 'event') {
			if (strtolower($postObj->Event) == 'subscribe') {
				// $IndexModel = new \Home\Model\EventModel;
                // $IndexModel->dingyEvent($postObj);
				$IndexModel = A('Event');
                $IndexModel->dingyEvent($postObj);
			}
		}

        //用户发送特定消息服务号自动回复
        if (strtolower($postObj->MsgType) == 'text') {
            //回复用户消息
            // $IndexModel = new \Home\Model\TextModel;
            // $IndexModel->repostMsg($postObj);
			$IndexModel = A('Text');
			$IndexModel->repostMsg($postObj);

        }

    }

    public function test()
	{
        $test = new \Model\IndexModel();
        $test->testMsg();
    }






}
