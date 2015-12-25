<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/css/style.css">
<!--[if IE]><script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js?v=20150511"></script><![endif]-->

</head>

<body>


<div class="container">



        <h2 class="form-signin-heading">添加用户</h2>

        <label for="Uid" >UID</label>
        <input type="text" name="usernamer" id="usernamer" class="form-control" placeholder="UID" required autofocus autocomplete="off">

        <label for="Password" >Password</label>
        <input type="password" name="password"  id="password"  class="form-control" placeholder="Password" required autocomplete="off">
        
       <label for="email" >Email</label>
        <input type="email" name="email" id="email"  class="form-control" placeholder="email" required autocomplete="off">
 
        <div class="form-inline form-group">
		<label for="code" >Code</label><br>
        <input type="text" name="code" id="code"  class="form-control" placeholder="code" required autocomplete="off">
        <img style="cursor:pointer;" onclick="this.src=this.src" src="<?php echo U(GROUP_NAME.'/Login/verify');?>" id="imgurl"><a onClick="Doimgurl()" href="javascript:#">看不清点击</a></div>
        <button class="btn btn-lg btn-primary btn-block" type="button" onClick="addFormPost()">确定并且注册</button>
       <p id="returnInfo" style="padding-top:10px; color:#F00;"></p>


    </div>


<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
	method={
		getFormVal:function(a){
			return document.getElementById(a).value;
			},
		hint:function(id,i){
			return document.getElementById(id).innerHTML=i;
			},
		hintout:function(m,n){
			document.getElementById(m).onfocus = function(){
				method.hint(n,'');
				}
			}
		}
		
function Doimgurl(){
document.getElementById("imgurl").src='/admin/login/verify?tm='+Math.random();

	}
function addFormPost(){
var usernamer=method.getFormVal("usernamer");
var password=method.getFormVal("password");
var email=method.getFormVal("email");
var code=method.getFormVal("code");
if(usernamer=='' || password=='' || email=='' || code==''){
	method.hint("returnInfo","请输入对应的内容！");
	return false;
	}
$.ajax({ 
url:"<?php echo U('Admin/Register/addUserHandle');?>", 
type:"post",
data: eval({
usernamer:usernamer,
password:password,
email:email,
code:code
}),
contentType: "application/x-www-form-urlencoded; charset=utf-8", 
dataType: "json",  
success: function (data) { 
if(data.status==0){
	method.hint("returnInfo",data.info);
	return false;
	}else if(data.status==1){
		alert(data.info);
		location.href=data.data;
		return false;
		}
}});
Doimgurl();
	}
method.hintout("usernamer","returnInfo");
method.hintout("password","returnInfo");
method.hintout("email","returnInfo");
method.hintout("code","returnInfo");

</script>
</body>
</html>