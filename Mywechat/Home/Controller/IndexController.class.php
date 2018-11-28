<?php
namespace Home\Controller;
use Think\Controller;
// use Think\Model;
class IndexController extends Controller{

	public function __construct(){

	}

	public function index(){
		// echo 'this is a test'; exit;

		//获得参数 signature nonce token timestamp echostr
		$nonce = $_GET['nonce'];
		$token = 'weixin';
		$timestamp = $_GET['timestamp'];
		$echostr = $_GET['echostr'];
		$signature = $_GET['signature'];

		//形成数组，然后字典排序
		$array = array();
		$array = array($nonce,$timestamp,$token);
		sort($array);

		//拼接成字符串，sha1加密，然后与signature进行校验
		$str = sha1(implode($array));

		if($str == $signature && $echostr){
			//第一次接入weixin api 接口的时候
			echo $echostr;
			exit;
		}
		else{
			$this->responseMsg();
		}
	}

	//接收事件推送并回复
	public function responseMsg(){
		//接收到微信推送过来的post数据(XML格式)
		$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];

		//处理消息类型，并设置回复类型和内容

		//   		<xml>
		// <ToUserName><![CDATA[toUser]]></ToUserName>
		// <FromUserName><![CDATA[FromUser]]></FromUserName>
		// <CreateTime>123456789</CreateTime>
		// <MsgType><![CDATA[event]]></MsgType>
		// <Event><![CDATA[subscribe]]></Event>
		// </xml>
		$postObj = simplexml_load_string($postArr);

		//判断该数据包是否是订阅的事件推送
		if(strtolower($postObj->MsgType)== 'event'){
			if(strtolower($postObj->Event)== 'subscribe'){
				$IndexModel = new \Model\IndexModel;
				$IndexModel -> dingyEvent($postObj);
			}
			// else if($postObj->Event=='LOCATION'){
			//     $toUser = $postObj->FromUserName;
			//     $fromUser = $postObj->ToUserName;
			//     $time = time();
			//     $Msgtype = 'text';
			//     $Content = '维度：'.$postObj->Latitude.'<br/>经度：'.$postObj->Longitude.'<br/>精度:'.$postObj->Precision;
			//     $template = '<xml>
			//                 <ToUserName><![CDATA[%s]]></ToUserName>
			//                 <FromUserName><![CDATA[%s]]></FromUserName>
			//                 <CreateTime>%s</CreateTime>
			//                 <MsgType><![CDATA[%s]]></MsgType>
			//                 <Content><![CDATA[%s]]></Content>
			//                 </xml>';
			//     $info = sprintf($template,$toUser,$fromUser,$time,$Msgtype,$Content);
			//     echo $info;
			// }
		}

		//用户发送特定消息服务号自动回复
		if(strtolower($postObj->MsgType)=='text'){
			//回复用户消息
			$IndexModel = new \Model\IndexModel;
			$IndexModel->repostMsg($postObj);

		}

	}

	public function test(){
		// print_r($_SERVER);exit;
		// $test = new \Model\IndexModel;
		echo '<pre>';
		$test = new \Model\IndexModel();
		$test->testMsg();
	}






}