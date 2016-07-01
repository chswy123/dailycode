<?php
namespace Model;
use Think\Model;
class IndexModel extends Model{

	 public function dingyEvent($postObj){
        //回复用户消息
        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;
        $time = time();
        $Msgtype = 'text';
        $title_model = M('Title');
        $title_info = $title_model->where('tag = 1')->find();
        $Content = $title_info['title'];
        // $Content = '哎呦！不错哦！感谢关注！输入“help”可查看帮助菜单:D';
        $template = '<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    </xml>';
        $info   = sprintf($template,$toUser,$fromUser,$time,$Msgtype,$Content);

        echo $info;
    }


    //用户回复
	public function repostMsg($postObj){

        // $data = M('News');
        // $mysqldata = $data -> limit(1) -> select();
        // file_put_contents('http://www.v24php.cn/error_log',$data,FILE_APPEND);


		$toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;
        $time = time();
        $Msgtype = 'text';
        // $Content = 'hi,你好!';
        switch(strtolower($postObj->Content)){
        case 'help':
            $Content = "1.输入“testweb”可查看我的测试主页；\n2.输入城市可查看天气；\n3.输入如“1+1”及“-，*，/”可进行简单计算:D; \n4.输入'news'可获取最新动态；";
            break;
        // case 'num':
        //     $Content = '123456';
        //     break;
        // case 'mysqltest':
        //     $Content = $mysqldata[0]['desc'];
        //     break;
        case 'testweb':
            $web_model = M('Web');
            $web_info = $web_model->where('tag = 1')->find();
            // $res = json_encode($web_model);
            // $Content = $res;
            $Content = $web_info['text'].$web_info['link'];  //模式为下面↓↓↓↓↓↓
            // $Content = '点我链接进入测试首页：http://www.v24php.cn/testIndex.php';
            break;
        case $res = $postObj->Content:
            $pipei = '/(\d+)(\+|-|\*|\/)(\d+)/';   //利用正则表达式将数字和负号拆分成数组
            preg_match($pipei,$res,$matches);
            if($matches[2]=='+'){                  //根据不同的负号，进行不同的计算
                $Content = $matches[1]+$matches[3];
            }
            else if($matches[2]=='-'){
                $Content = $matches[1]-$matches[3];
            }
            else if($matches[2]=='*'){
                $Content = $matches[1]*$matches[3];
            }
            else if($matches[2]=='/'){
                $Content = $matches[1]/$matches[3];
            }
            else{
                $Content = $this->weather($res);   //其他情况比如输入城市，则返回天气
            }
            break;
        // case $city = $postObj->Content:
        //     $Content = $this->testMsg($city);
        //     break;
        }

        //$city = $postObj->Content;
        //$Content=$this->testMsg($city);

        if($postObj->Content == 'news'){
            $info = $this -> news($toUser,$fromUser,$time);
            echo $info;
        }
        else{
            $template = '<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        </xml>';
            $info = sprintf($template,$toUser,$fromUser,$time,$Msgtype,$Content);
            echo $info;
        }

        
	}



    /*
     *   回复新闻请求 
    */
    public function news($toUser,$fromUser,$time){
        $Msgtype = 'news';
        // $Artcount = 2;
        $templateHeader = '<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <ArticleCount>%s</ArticleCount>
                            <Articles>';

                $templateBody = '
                                <item>
                                <Title><![CDATA[%s]]></Title> 
                                <Description><![CDATA[%s]]></Description>
                                <PicUrl><![CDATA[%s]]></PicUrl>
                                <Url><![CDATA[%s]]></Url>
                                </item>';

        $templateFoot = '   </Articles>
                            </xml>';

        $model = M('News');
        $news_arr = $model -> limit(10) -> select();

        $Artcount = 0;

        foreach($news_arr as $k => $v){
            $Artcount ++;
            $bodyStr .=sprintf($templateBody,$v['title'],$v['desc'],$v['pic_url'],$v['url']);
        }

        $headerStr = sprintf($templateHeader,$toUser,$fromUser,$time,$Msgtype,$Artcount);
        $footStr = sprintf($templateFoot);

        return $headerStr.$bodyStr.$footStr;    
    }



   
    /*
    *   获得天气接口数据
    */

	public function weather($city){
		$ch = curl_init();
        $city = urlencode($city);
        $url = 'http://apis.baidu.com/apistore/weatherservice/cityname?cityname='.$city;
        $header = array(
            'apikey: 4cdb5b8440139072b5a335dc5006b19c',
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);

        $city_arr = json_decode($res,1);
         // print_r($city_arr['retData']);exit;
        if(!empty($city_arr['retData'])){
            $msg='城市：'.$city_arr['retData']['city']."\n日期：".$city_arr['retData']['date']."\n更新时间：".$city_arr['retData']['time']."\n天气：".$city_arr['retData']['weather']."\n温度：".$city_arr['retData']['temp'];
            return $msg;
        }
        else{
            return '额哦，出错了，请按要求输入！';
        }

        

        // print_r(json_decode($res));
	}


	




}
