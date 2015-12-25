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
<table class="table">
<thead>
<tr>
<td>序列</td>
<td>标题</td>
<td>URL</td>
<td>是否公开</td>
<td>所属栏目</td>
<td>添加时间</td>
<td>操作</td>
</tr>
</thead>
<tbody>
<?php if(is_array($article)): foreach($article as $key=>$v): ?><tr>
<td> <?php echo ($v["id"]); ?></td>
<td> <?php echo ($v["title"]); ?></td>
<td> <a href="<?php echo ($v["imgurl"]); ?>" target="new"><?php echo ($v["imgurl"]); ?></a></td>
<td><?php if($v["sid"] != '0'): ?>不公开
 <?php else: ?>公开<?php endif; ?></td>
<td> <?php echo ($v["c_name"]); ?></td>
<td> <?php echo (date('y-m-d H:i',$v["time"])); ?></td>
<td>
<?php if(ACTION_NAME == "index"): ?><a href="<?php echo U('Admin/Article/torecycle',array('id'=>$v['id'],'type'=>1));?>">删除</a>&nbsp;&nbsp;<a href="<?php echo U('Admin/Article/amendart',array('id'=>$v['id'],'type'=>1));?>">修改</a>
<?php else: ?>
<a href="<?php echo U('Admin/Article/torecycle',array('id'=>$v['id'],'type'=>0));?>">还原</a>&nbsp;&nbsp;<a href="<?php echo U('Admin/Article/delete',array('id'=>$v['id']));?>">彻底删除</a><?php endif; ?>
</td>
</tr><?php endforeach; endif; ?>
</tbody>
</table>
<?php if(ACTION_NAME == "recycle"): ?><a href="<?php echo U('Admin/Article/todelete',array('del'=>1));?>">清空回收站</a><?php endif; ?>
<div class="page">
<span><?php echo ($page); ?></span>
</div>
</div>
</body>
</html>