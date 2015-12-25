$(document).ready(function () {
$('#dlht').click(function(){
var username = $('input[name=username]');
var password = $('input[name=password]');
var code = $('input[name=code]');
 $.post(loginUrl,
    {
	 username:username.val(),
	 password:password.val(),
	 code:code.val()
    },
    function(data){
    },'json');
});
});


<script type="text/javascript">
var loginUrl='{:U("Admin/Login/login",'','')}';
</script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/login.js"></script>



	public function _initialize(){
		if(!isset($_SESSION['uid']) || !isset($_SESSION['username'])){
			$this->redirect('Admin/Login/index');
			}
		}


