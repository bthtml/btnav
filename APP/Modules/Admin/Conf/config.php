<?php
//后台配置文件
return array(
			
         //超级管理员帐号开启
         'RBAC_SUPERADMIN'=>'admin', //超级管理员帐号名称
		 'ADMIN_AUTH_KEY'=>'superadmin', //超级管理员识别号
		 'USER_AUTH_ON'=>true,//是否开启识别验证
		 'USER_AUTH_TYPE'=>1,//验证类型 （1：登录验证， 2：时时验证）
		 //'USER_AUTH_MODEL'=>'user',  
		 'USER_AUTH_KEY'=>'uid',//用户认证识别号
		'NOT_AUTH_MODULE' => 'Index,article,category,UserIndex',						//无需认证的控制器
		'NOT_AUTH_ACTION' => 'addUserHandle,addRoleHandle,addNodeHandle,setAccess,amendartHandle,addArtHandle,upload,addCateHandle,alterCateHandle',				//无需认证的动作方法
		 'RBAC_ROLE_TABLE'=>'th_role',//角色表名称
		 'RBAC_USER_TABLE'=>'th_role_user',//角色与用户的中间表名称
		 'RBAC_ACCESS_TABLE'=>'th_access',//权限表名称
		 'RBAC_NODE_TABLE'=>'th_node',//节点表名称
		 //模板路径缩略
		'TMPL_PARSE_STRING'=>array(
		'__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Tpl/Public',),
		//'SESSION_AUTO_START'=>'true',
		'URL_HTML_SUFFIX'=>'',
		'APP_AUTOLOAD_PATH'=>'@.TagLib',
		'TAGLIB_BUILD_IN'=>'Cx,Hd',
);
?>