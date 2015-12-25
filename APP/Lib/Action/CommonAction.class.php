<?php
// 后台公共控制器
class CommonAction extends Action {
	
		public function _initialize(){
		$this->action = ACTION_NAME;
			 if(!isset($_SESSION[C('USER_AUTH_KEY')])){
				 $this->redirect('/'.GROUP_NAME.'/Login');
				 }
				 $notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODEL'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));

			if (C('USER_AUTH_ON') && !$notAuth) {
				import('ORG.Util.RBAC');
				RBAC::AccessDecision(GROUP_NAME) || $this->error('没有权限操作');
			}
		
/*	if(!isset($_SESSION['uid'])||!isset($_SESSION['username'])){
			$this->redirect('Admin/Login/index');
			}*/
		}
}