<?php
return array(
	//'TMPL_EXCEPTION_FILE'=>'./Public/Tpl/error.html',
	'APP_AUTOLOAD_PATH'=>'@.TagLib',
	'TAGLIB_BUILD_IN'=>'Cx,Hd',
	//'__ROOT__'=>'http://www.th.com',
	//开启静态缓存
	'HTML_CACHE_ON'=>true,
	'HTML_CACHE_RULES'=>array(
	'List:index'=>array('{:module}_{:action}_{ename}_{p}',3600*24),
    'Index:index'=>array('{:module}_{:action}_{p}',3600*24),
    'show:'=>array('{:module}_{:action}_{id}',3600*24),
	),
	
	//开启动态缓存
	//'DATA_CACHE_TYPE'=>'Memcache',
	//'MEMCACHE_HOST'=>'127.0.0.1',
	//'MEMCACHE_PORT'=>11211
);
?>