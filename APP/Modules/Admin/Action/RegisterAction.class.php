<?php
// 后台查看所有项目页面控制器
class RegisterAction extends  Action{
	//添加用户
	public function index(){
		$this->role=M('role')->select();
		$this->display();
		}
	//添加用户表单处理
	public function addUserHandle(){
		$user=M('user')->where(array('usernamer'=>I('username')))->find();
		if(count($user)!=0){
			$this->ajaxReturn('','用户名UID已经存在，请重新输入！',0);
			}
		if(strtolower(I('usernamer'))=='admin' || strtolower(I('usernamer'))=='superadmin'){
			$this->ajaxReturn('','用户名UID不合法！',0);
			}
		$data=array(
		 'usernamer'=>I('usernamer'),
		 'password'=>I('password','','md5'),
		 'email'=>I('email'),
		 'logintime'=>time(),
		 'loginip'=>get_client_ip()
		);
		
		if(I('code','','strtolower') != session('verify')){ $this->ajaxReturn('','验证码输人错误！',0);}
		
		if(!$data['usernamer'] || !$data['password'] || !$data['email']){
			$this->ajaxReturn('','不能留空哒！',0);
			}
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		if (!preg_match($pattern,$data['email'])){
			$this->ajaxReturn('','邮箱格式不对！',0);
			}

		$role=array();
		if($uid=M("user")->add($data)){
			foreach("8" as $v){
				$role[]=array(
				'role_id'=>$v,
				'user_id'=>$uid
				);
				}
			M("role_user")->addAll($role);
			$this->ajaxReturn('/Admin/Login/','添加成功,跳转登陆页面。',1);
			}else{
			$this->ajaxReturn('','莫名的错！',0);
				}
		}

}
