<?php

namespace Home\Model;
use Think\Model;

class TextModel extends Model
{

    public function repostMsg($postObj)
    {
        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;

        $time = time();
        $Msgtype = 'text';

        switch (strtolower($postObj->Content))
        {
            case 'help':
                $Content = "1.输入“testweb”可查看我的测试主页；\n2.输入城市可查看天气；\n3.输入如“1+1”及“-，*，/”可进行简单计算:D; \n4.输入'空少'可获取最新艳照；";
                break;
        }


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
