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
<form action="<?php echo U(GROUP_NAME.'/System/updateVerify');?>" method="post">
<p>验证码长度：<input type="text" name="VERIFY_LENGTH" value="<?php echo (C("VERIFY_LENGTH")); ?>"></p>
<p>验证码图片宽度(像素)：<input type="text" name="VERIFY_WIDTH" value="<?php echo (C("VERIFY_WIDTH")); ?>"></p>
<p>验证码图片高度(像素)：<input type="text" name="VERIFY_HEIGHT" value="<?php echo (C("VERIFY_HEIGHT")); ?>"></p>
<p>验证码背影颜色(16进制色值)：<input type="text" name="VERIFY_BGCOLOR" value="<?php echo (C("VERIFY_BGCOLOR")); ?>"></p>
<p>验证码种子：<input type="text" name="VERIFY_SEED" value="<?php echo (C("VERIFY_SEED")); ?>"></p>
<p>验证码字体文件：<input type="text" name="VERIFY_FONTFILE" value="<?php echo (C("VERIFY_FONTFILE")); ?>"></p>
<p>验证码字体大小：<input type="text" name="VERIFY_SIZE" value="<?php echo (C("VERIFY_SIZE")); ?>"></p>
<p>验证码字体颜色(16进制色值)：<input type="text" name="VERIFY_COLOR" value="<?php echo (C("VERIFY_COLOR")); ?>"></p>
<p>SESSION识别名称:<input type="text" name="VERIFY_NAME" value="<?php echo (C("VERIFY_NAME")); ?>"></p>
<p>存储验证码到SESSION时使用函数:<input type="text" name="VERIFY_FUNC" value="<?php echo (C("VERIFY_FUNC")); ?>"></p>
<p><input type="submit" value="更新"></p>
</form>
</div>
</body>
</html>