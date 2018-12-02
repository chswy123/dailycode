<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 18/12/2
 * Time: 下午6:23
 */

return array(
    'RETURN_WX_TEXT'        => '<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[%s]]></MsgType>
                                    <Content><![CDATA[%s]]></Content>
                                </xml>',    //  返回文本
);