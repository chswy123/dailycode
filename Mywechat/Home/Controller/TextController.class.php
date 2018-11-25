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

        switch (strtolower($postObj->Content))
        {
            case 'help':
                $Content = "1.输入“testweb”可查看我的测试主页；\n2.输入城市可查看天气；\n3.输入如“1+1”及“-，*，/”可进行简单计算:D; \n4.输入'test'可获取最新资讯；";
                break;
            case 'admin':
                $Content = 'http://www.v24php.cn/Mywechat.php/Admin/Login/login';
                break;
            default:
                $Content = '要啥自行车';
                break;
        }


        $template = C('RETURN_WX_TEXT');
        $info = sprintf($template,$toUser,$fromUser,$time,$Msgtype,$Content);
        echo $info;

    }

}
