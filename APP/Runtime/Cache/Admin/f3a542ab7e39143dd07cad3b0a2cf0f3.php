<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>收藏管理后台</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/css/style.css">
<!--[if IE]><script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js?v=20150511"></script><![endif]-->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body>


<nav class="navbar navbar-inverse">
<ul class="nav navbar-nav">
<li><a href="/Admin">收藏管理后台</a></li>
<li><a href="/" target="new">前台正常页面</a></li>
<li><a href="/admin/UserIndex/" target="new">个人隐藏页面</a></li>
</ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<?php echo (session('username')); ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/admin/index/logout">退出后台</a></li>
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
<?php if($_SESSION['username']!= 'admin'): else: ?> 
<li><strong>RBAC</strong></li>
<li><a href="<?php echo U('Admin/Rbac/index');?>" target="_parent">用户列表</a></li>
<li><a href="<?php echo U('Admin/Rbac/role');?>" target="_parent">角色列表</a></li>
<li><a href="<?php echo U('Admin/Rbac/node');?>" target="_parent">节点列表</a></li>
<li><a href="<?php echo U('Admin/Rbac/addUser');?>" target="_parent">添加用户</a></li>
<li><a href="<?php echo U('Admin/Rbac/addRole');?>"  target="_parent">添加角色</a></li>   
<li><a href="<?php echo U('Admin/Rbac/addNode');?>" target="_parent">添加节点</a></li>
<li><strong>系统设置</strong></li>
<li><a href="<?php echo U('Admin/System/verify');?>">验证码设置</a></li><?php endif; ?>
</ul>
</div>

<div class="col-md-10">
<form action="<?php echo U(GROUP_NAME.'/Category/addCateHandle');?>" method="post">
<p>添加栏目分类</p><p><font style="color:#F00">*</font>
分类栏目名称：<input name="name" type="text" required class="form-control"/></p><p>
<font style="color:#F00">*</font>分类栏目别名(英文)：<input type="text" name="ename" required class="form-control"/></p><p>
排序：<input type="text" name="sort" value="100" class="form-control"></p>
<p>公开or自己用：
<select name="csid" required class="form-control">
<option value="1">自己用</option>
<option value="0">公开</option>
</select>
</p>
<p>
<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
<input type="hidden" name="uid" value="<?php echo (session('uid')); ?>">
<input type="submit" value="添加栏目" class="btn btn-danger"></p>
</form>
</div>
</body>
</html>