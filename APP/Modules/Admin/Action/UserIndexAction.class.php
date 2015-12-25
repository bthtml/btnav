<?php
// 添加文章控制器
class UserIndexAction extends CommonAction {
	//文章列表
	public function index(){
	$uid=session('uid');
		if($uid==3){
		$list='del=0';
		}else{
		$list='del=0 and uid='.$uid;
		}
	$where=array('pid'=>0);
	//$_link['article']['condition'] = 'uid='.$uid.'';
	$Course=D('UserArtView');
	$Course->condition($list);
	$this->columns=$Course->where($where)->order('sort')->relation(true)->select();
	//dump($this);
	$this->display();
	}
		
	
		
}
