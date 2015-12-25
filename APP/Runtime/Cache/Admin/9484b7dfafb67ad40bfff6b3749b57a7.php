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
<li><a href="/" target="new">前台页面</a></li>
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
<?php if(is_array($column)): foreach($column as $key=>$v): ?><form action="<?php echo U(GROUP_NAME.'/Category/alterCateHandle');?>" method="post">
<p>修改栏目分类</p><p>
<font style="color:#F00">*</font>分类栏目名称：<input name="name" type="text" value="<?php echo ($v["name"]); ?>" class="form-control" required/></p><p>
<font style="color:#F00">*</font>分类栏目别名(英文)：<input type="text" name="ename" value="<?php echo ($v["ename"]); ?>" class="form-control" required/></p>
<p>公开or隐藏：
<select name="csid" required class="form-control">
<?php if($v["csid"] != '0'): ?><option value="0">公开</option>
<option value="1" selected>隐藏</option>
 <?php else: ?> <option value="0" selected>公开</option>
<option value="1" >隐藏</option><?php endif; ?>
</select>
</p>
<p>
<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
<input type="submit" value="修改栏目" class="btn btn-danger"></p>
</form><?php endforeach; endif; ?>
</div>
</body>
</html>