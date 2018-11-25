<?php

namespace Home\Model;
use Think\Model;


class EventModel extends Model
{

    public function dingyEvent($postObj)
    {
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


}
