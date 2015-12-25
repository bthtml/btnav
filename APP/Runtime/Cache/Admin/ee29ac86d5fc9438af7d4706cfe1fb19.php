<?php if (!defined('THINK_PATH')) exit();?><!doctype html><html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>收藏的网址导航</title>
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/css/style.css">
<!--[if IE]><script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js?v=20150511"></script><![endif]-->
</head>


<body class="bg-gray" style="margin-top:52px;" data-spy="scroll" data-target="#navbar-example" data-offset="0">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/Admin">导航管理系统</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">公开导航<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php  $where=array('csid'=>'0'); $column=M("columns")->where($where)->order("sort")->limit(20)->select();import("Class.Category",APP_PATH);$column=Category::unlimitedForLayer($column);foreach($column as $_v):extract($_v);?><li class="item-<?php echo ($id); ?>"><a href="#url-<?php echo ($id); ?>"><?php echo ($name); ?></a></li><?php endforeach;?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">私人导航<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php  $where=array('csid'=>'1'); $column=M("columns")->where($where)->order("sort")->limit(20)->select();import("Class.Category",APP_PATH);$column=Category::unlimitedForLayer($column);foreach($column as $_v):extract($_v);?><li class="item-<?php echo ($id); ?>"><a href="#url-<?php echo ($id); ?>"><?php echo ($name); ?></a></li><?php endforeach;?>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="/">前台导航页面<span class="sr-only">(current)</span></a></li>
        <li><a href="/Admin">返回管理页面</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<?php echo (session('username')); ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/admin/index/logout">退出后台</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="col-xs-12 col-md-12"  id="navbar-example">
<div class="container">
<div class="row">

<div class="col-xs-12 col-md-12">

<?php if(is_array($columns)): foreach($columns as $key=>$value): if($value["article"] != NULL): ?><div class="row item" id='url-<?php echo ($value["id"]); ?>'>
<div class="row">
<h4 class="col-md-2 col-xs-12"><?php echo ($value["name"]); ?></h4>
</div>

<ul class="list-unstyled">
<?php if(is_array($value["article"])): foreach($value["article"] as $key=>$v): ?><li><a href="<?php echo ($v["url"]); ?>" target="new"><?php echo ($v["title"]); ?></a><br><?php echo ($v["summary"]); ?></li><?php endforeach; endif; ?>
</ul>
</div><?php endif; endforeach; endif; ?>


</div> 

  </div> 
</div>        

</div>

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body></html>