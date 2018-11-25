<?php
return array(
	//'配置项'=>'配置值'

	// 'TMPL_ENGINE_TYPE'=>'Smarty',

	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'qdm108294313.my3w.com', // 服务器地址
    'DB_NAME'               =>  'qdm108294313_db',          // 数据库名
    'DB_USER'               =>  'qdm108294313',      // 用户名
    'DB_PWD'                =>  'wy1991529',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'wx_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    'SHOW_PAGE_TRACE'       =>   false,


    'RETURN_WX_TEXT'        => '<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[%s]]></MsgType>
                                    <Content><![CDATA[%s]]></Content>
                                </xml>',    //  返回文本

                                


);
