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
<p>项目分类</p>
<form action="<?php echo U(GROUP_NAME.'/Category/sortCate');?>" method="post">
<table class="table">
<thead>
<tr>
<td>id</td>
<td>名称</td>
<td>别名</td>
<td>级别</td>
<td>排序</td>
<td>是否公开</td>
<td>操作</td>
</tr>
</thead>
<tbody>
<?php if(is_array($column)): foreach($column as $key=>$v): ?><tr>
<td> <?php echo ($v["id"]); ?></td>
<td><?php echo ($v["html"]); echo ($v["name"]); ?></td>
<td><?php echo ($v["ename"]); ?></td>
<td><?php echo ($v["level"]); ?>级栏目</td>
<td><input type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>" class="form-control" style=" width:60px;"></td>
<td>
<?php if($v["csid"] != '0'): ?>不公开
 <?php else: ?>公开<?php endif; ?>
</td>
<td><a href="<?php echo U('Admin/Category/delete',array('id'=>$v['id']));?>">删除</a>&nbsp;&nbsp;<a href="<?php echo U('Admin/Category/alterCate',array('id'=>$v['id']));?>">编辑</a></td>
</tr><?php endforeach; endif; ?>
</tbody>
</table>
<input type="submit" value="重新排序" class="btn btn-danger">
</form>
</div>
</body>
</html>