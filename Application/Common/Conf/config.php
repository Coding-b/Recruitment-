<?php
return array(
	//'配置项'=>'配置值'
    'SESSION_AUTO_START' => true, //是否开启session

    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'humanresouce', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET' =>'utf8',

    'MODULE_ALLOW_LIST'    =>    array('Home','Admin','Department'),
    'DEFAULT_MODULE'       =>    'Home',


);