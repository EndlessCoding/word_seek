<?php
if (!defined('THINK_PATH')) exit();

return $arr = array(
    //'配置项'    => '配置值'
    //'URL_ROUTER_ON' => true,
    'DB_TYPE'    => 'mysql',	    //使用的数据库类型
    'DB_HOST'    => 'localhost',
    'DB_NAME'    => 'dict',	    //数据库名
    'DB_USER'    => 'root',	    //访问数据库账号
    'DB_PWD'     => '',       //访问数据库密码
    'DB_PORT'    => '3306',
    'DB_PREFIX'  => '',	    //表前缀

    //缓存控制
	'DB_FIELD_CACHE'=>false,
	'HTML_CACHE_ON'=>false,   //
    'HTML_CACHE_ON'=>false,
	'TMPL_CACHE_ON'=>false,
	'Action_CACHE_ON'=>false,
	

    'APP_DEBUG'  => 0,	    //调试模式开关
    //'TOKEN_ON'   => true,	    //是否开启令牌验证
    'URL_MODEL'  => 1,		    //URL模式：0普通模式 1PATHINFO 2REWRITE 3兼容模式
    'TMPL_ACTION_ERROR'     => 'Public:success', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'   => 'Public:success', // 默认成功跳转对应的模板文件
);

?>
