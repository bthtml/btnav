<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html><html>
<head>
<meta charset="utf-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>收藏的网址导航</title>
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="Public/css/style.css">
<!--[if IE]><script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js?v=20150511"></script><![endif]-->
</head>


<body class="bg-gray">
<div class="container-fluid hidden-xs">
<div class="col-xs-12 col-md-2 sidebar navbar-fixed-top">
          <ul class="nav" id="leftnav">
          <?php  $where=array('csid'=>'0'); $column=M("columns")->where($where)->order("sort")->limit(20)->select();import("Class.Category",APP_PATH);$column=Category::unlimitedForLayer($column);foreach($column as $_v):extract($_v);?><li class="item-<?php echo ($id); ?>"><a href="#url-<?php echo ($id); ?>"><?php echo ($name); ?></a></li><?php endforeach;?>
           <li ><a href="/Admin/Login" style="color:#428bca"> LOGIN IN</a></li>

          </ul>
        </div>
</div>




<div class="col-xs-12 col-md-2"></div>

<div class="col-xs-12 col-md-10">
<div class="container">
<div class="row">

<div class="col-xs-12 col-md-10">

<?php if(is_array($columns)): foreach($columns as $key=>$value): if($value["article"] != NULL): ?><div class="row item" id='url-<?php echo ($value["id"]); ?>'>
<div class="row">
<h4 class="col-md-2 col-xs-12"><?php echo ($value["name"]); ?></h4>
</div>
<ul class="list-unstyled">
<?php if(is_array($value["article"])): foreach($value["article"] as $key=>$v): if($v["del"] != 1): ?><li><a href="<?php echo ($v["imgurl"]); ?>" target="new"><?php echo ($v["title"]); ?></a><br><?php echo ($v["summary"]); ?></li><?php endif; endforeach; endif; ?>
</ul>
</div><?php endif; endforeach; endif; ?>


</div> 

  </div> 
</div>        

</div>

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script language="javascript">
var ss;
window.onload=function()
{
var h=document.documentElement.clientHeight;//可见区域高度
ss=document.getElementById('leftnav');
ss.style.height=h+"px";
}
</script>
</body></html>