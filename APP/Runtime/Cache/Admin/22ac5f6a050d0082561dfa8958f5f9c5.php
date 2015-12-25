<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>收藏管理后台</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/css/style.css">
<!--[if IE]><script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js?v=20150511"></script><![endif]-->

</head>

<body>


<nav class="navbar navbar-inverse">
<ul class="nav navbar-nav">
<li><a href="/Admin">收藏管理后台</a></li>
<li><a href="<?php echo U('Admin/Index/logout');?>">退出后台</a></li>
<li><a href="/" target="new">前台正常页面</a></li>
<li><a href="/admin/UserIndex/" target="new">个人隐藏页面</a></li>
</ul>
</nav>
<div class="col-md-2 sidebar">
<ul class="nav list-unstyled" style="padding:20px;">
<li><strong>收藏管理</strong></li>
<li><a href="<?php echo U('Admin/Article/index');?>" target="_parent">收藏列表</a></li>
<li><a href="<?php echo U('Admin/Article/addArt');?>" target="_parent">添加收藏</a></li>
<li><a href="<?php echo U('Admin/Article/recycle');?>" target="_parent">回收站</a></li>
<li><strong>栏目分类</strong></li>
<li><a href="<?php echo U('Admin/Category/index');?>" target="_parent">栏目列表</a></li>
<li><a href="<?php echo U('Admin/Category/addCate');?>" target="_parent">添加栏目</a></li>
<li><strong>RBAC</strong></li>
<li><a href="<?php echo U('Admin/Rbac/index');?>" target="_parent">用户列表</a></li>
<li><a href="<?php echo U('Admin/Rbac/role');?>" target="_parent">角色列表</a></li>
<li><a href="<?php echo U('Admin/Rbac/node');?>" target="_parent">节点列表</a></li>
<li><a href="<?php echo U('Admin/Rbac/addUser');?>" target="_parent">添加用户</a></li>
<li><a href="<?php echo U('Admin/Rbac/addRole');?>"  target="_parent">添加角色</a></li>   
<li><a href="<?php echo U('Admin/Rbac/addNode');?>" target="_parent">添加节点</a></li>
<li><strong>系统设置</strong></li>
<li><a href="<?php echo U('Admin/System/verify');?>">验证码设置</a></li>
</ul>
</div>

<div class="col-md-10">

<h3>权限分配</h3>

<form action="<?php echo U('Admin/Rbac/setAccess');?>" method="post">
<?php if(is_array($node)): foreach($node as $key=>$app): ?><div id="app">
<ul class="list-unstyled">
<li class="st"><b><?php echo ($app["title"]); ?></b>-<input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" level='1' <?php if($app["access"]): ?>checked<?php endif; ?>></li>
</ul>
<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><div id="action">
<ul class="list-unstyled">
<li class="at"><?php echo ($action["title"]); ?>-<input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_2" level='2' <?php if($action["access"]): ?>checked<?php endif; ?>></li>
</ul>
<ul class="list-unstyled">
<li>
<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><span>&nbsp;<input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" <?php if($method["access"]): ?>checked<?php endif; ?>>-<?php echo ($method["title"]); ?></span><?php endforeach; endif; ?>
</li>
</ul>
</div><?php endforeach; endif; ?>
</div><?php endforeach; endif; ?>
</div>
<input type="hidden" name="rid" value="<?php echo ($rid); ?>"/>
<input type="submit" value="提交保存" class="btn btn-danger">
</form>


<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$('input[level=1]').click(function(){
		var inputs=$(this).parents('#app').find('input');
		$(this).attr('checked') ? inputs.attr('checked','checked'):
		inputs.removeAttr('checked');
		});
		$('input[level=2]').click(function(){
		var inputs=$(this).parents('#action').find('input');
		$(this).attr('checked') ? inputs.attr('checked','checked'):
		inputs.removeAttr('checked');
		});
	});
</script>
</body>
</html>