<?php
return array(
	//'配置项'=>'配置值'

	// 'TMPL_ENGINE_TYPE'=>'Smarty',
	'LOAD_EXT_CONFIG'		=> array('DB' => 'db'),
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    'SHOW_PAGE_TRACE'       =>   false,

	'WECHAT_TOKEN'			=> 'weixin',


    'RETURN_WX_TEXT'        => '<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[%s]]></MsgType>
                                    <Content><![CDATA[%s]]></Content>
                                </xml>',    //  返回文本

                                


);
