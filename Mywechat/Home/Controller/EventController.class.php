<?php

namespace Home\Controller;
use Think\Controller;

class EventController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dingyEvent($postObj)
    {
        //回复用户消息
        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;
        $time = time();
        $Msgtype = 'text';
        $title_model = M('Title', 'wx_', 'db');
        $title_info = $title_model->where('tag = 1')->find();
        $Content = $title_info['title'];
        // $Content = '哎呦！不错哦！感谢关注！输入“help”可查看帮助菜单:D';
        $template = C('TEMPLATE.RETURN_WX_TEXT');
        $info   = sprintf($template,$toUser,$fromUser,$time,$Msgtype,$Content);

        echo $info;
    }




}
