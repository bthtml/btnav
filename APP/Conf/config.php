<?php
//公共配置文件
return array(
     // 开启分组
	'APP_GROUP_LIST'=>'Index,Admin',
	'DEFAULT_GROUP'=>'Index',
	//开启独立分组
	'APP_GROUP_MODE'=>1,
	//分组目录名称
	'APP_GROUP_PATH'=>'Modules',
		// 添加数据库配置信息
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'myurl', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => 'root', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => 'th_', // 数据库表前缀
		
		//加载新建配置文件
		'LOAD_EXT_CONFIG'=>'verify',
		//开启页面Trace
		//'SHOW_PAGE_TRACE' =>true, 
		//点语法默认解析
		'TMPL_VAR_IDENTIFY'=>'array',
		//模板路径缩略
		'TMPL_FILE_DEPR'=>'_',
		//模板路径缩略
		'DEFAULT_FILTER'=>'htmlspecialchars',
		//自定义session数据存储
		'SESSION_TYPE'=>'db',
		//SESSION前缀
		//'SESSION_PREFIX'=>'ssnsess_',
		//自定义session-Redis数据存储
		//'SESSION_TYPE'=>'Redis',
		//'REDIS_HPST'=>'localhost',// Redis服务器地址
	    //'REDIS_PORT'=> 6379, // Redis端口
		 'URL_CASE_INSENSITIVE'=> true, //URL不区分大小写
		'URL_HTML_SUFFIX'=>'.html',
		'URL_MODEL'=> 2, 
		'URL_ROUTER_ON'=>true,
		'URL_ROUTE_RULES'=>array(
		//'/^post\/(\d+)$/'=>'Index/List/?id=:',
		'/^post\/(\d+)$/'=>'Index/Show/?id=:1',
		'list/:ename'=>'Index/List/:ename',
		'index/:p' => 'Index/index/?p=:1',
		//'list/:ename'=>'Index/List/:ename',
		':ename/(\d+)$/'=>'Index/List/',
		),

		
);
?>