<?php
return array(
	//'配置项'=>'配置值'

        /* 数据库设置 */
        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_HOST'               =>  'localhost', // 服务器地址
        'DB_NAME'               =>  'shopapp',          // 数据库名
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  'root',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'DB_PREFIX'             =>  'sw_',    // 数据库表前缀
    
    //默认分组
    'DEFAULT_MODULE'        =>  'Home',
    'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),
    'SHOW_PAGE_TRACE'       =>  true,

    //模板输出变量
    'TMPL_L_DELIM'    =>    '<{',
    'TMPL_R_DELIM'    =>    '}>',
);