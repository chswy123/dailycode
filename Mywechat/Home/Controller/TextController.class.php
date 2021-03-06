<?php

namespace Home\Controller;
use Think\Controller;

class TextController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function repostMsg($postObj)
    {
        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;

        $time = time();
        $Msgtype = 'text';

        $repostConfig = M('Repost_config', 'wx_', 'db');
        $contentRes = $repostConfig->where("key_words = '{$postObj->Content}'")->find();
        \Think\Log::write('debug:' . json_encode($contentRes));

        if ($contentRes) {
            $content = $contentRes['repost_words'];
        } else {
            $content = '不要扯犊子!';
        }

//        switch (strtolower($postObj->Content))
//        {
//            case 'help':
//                $Content = "1.输入“testweb”可查看我的测试主页；\n2.输入城市可查看天气；\n3.输入如“1+1”及“-，*，/”可进行简单计算:D; \n4.输入'test'可获取最新资讯；";
//                break;
//            case 'admin':
//                $Content = 'http://www.v24php.cn/Mywechat.php/Admin/Login/login';
//                break;
//            case 'news':
//                $news = $this->news($toUser, $fromUser, $time);
//                echo $news;
//                break;
//            default:
//                $Content = '要啥自行车';
//                break;
//        }


        $template = C('TEMPLATE.RETURN_WX_TEXT');
        $info = sprintf($template,$toUser,$fromUser,$time,$Msgtype,$content);
        echo $info;

    }



    public function news($toUser, $fromUser, $time)
    {
        $Msgtype = 'news';

        $tmplate = '<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <ArticleCount>%s</ArticleCount>
                        <Articles>
                            <item>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <PicUrl><![CDATA[%s]]></PicUrl>
                            <Url><![CDATA[%s]]></Url>
                            </item>
                            <item>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <PicUrl><![CDATA[%s]]></PicUrl>
                            <Url><![CDATA[%s]]></Url>
                            </item>
                        </Articles>
                    </xml>
                    ';

        $title = 'test';
        $desc = 'this is test';
        $picUrl = 'http://v24php.cn/Public/wx_img/2.jpg';
        $url = 'http://www.v24php.cn/Mywechat.php/Admin/Login/login';
        return sprintf($tmplate, $toUser, $fromUser, $time, $Msgtype, '2', $title, $desc, $picUrl, $url, $title, $desc, $picUrl, $url);
    }



}
