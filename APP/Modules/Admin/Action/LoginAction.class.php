<?php
// 后台登录页面控制器
class LoginAction extends Action {
	
    public function index(){
     $this->display();
    }
	
	public function login(){
		
		if(!IS_POST) halt('页面不存在');
		//系统
		//if(I('code','','md5') != session('verify')){$this->error('验证码错误');}
		//自定义
		if(I('code','','strtolower') != session('verify')){$this->error('验证码错误');}
		$user=M('user')->where(array('usernamer'=>I('username')))->find();
		if(!$user||$user['password'] !=I('password','','md5')){
			$this->error('用户名或者密码错误');
			}
		if($user['lock']) $this->error('用户被锁定');
		$data = array(
			'id'=>$user['id'],
			'logintime'=>time(),
			'loginip'=>get_client_ip(),
			);
		M('user')->save($data);
		session(C('USER_AUTH_KEY'), $user['id']);
		session('username', $user['usernamer']);
		session('logintime', date('Y-m-d H:i:s'), $user['logintime']);
		session('loginip', $user['loginip']);
		//$_SESSION['loginip']=$user['loginip'];
		//超级管理员识别
		if($user['usernamer'] == C('RBAC_SUPERADMIN')){
			session(C('ADMIN_AUTH_KEY'),true);
			}
		//读取权限
		import('ORG.Util.RBAC');
		RBAC::saveAccessList();
		/*dump($_SESSION);
		die;*/
		redirect(__GROUP__);

      }	
	public function verify(){
		//自定义验证
		ob_clean();
		import('Class.Image',APP_PATH);
		Image::verify();
		//系统验证
		//import('ORG.Util.Image');
		//Image::buildImageVerify(1,1,'png',80,25);
	}
}
