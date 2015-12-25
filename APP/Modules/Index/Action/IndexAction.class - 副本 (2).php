<?php
// 前台控制器
class IndexAction extends Action {
   public function index(){
		$this->article=M('article')->select();
		$count=M('article')->count();
		import('Class.Category',APP_PATH);
		import('ORG.Util.Page');
		$page= new Page($count, 15);
		$this->page=$page->show();
		$this->display();
		die;
		if(!$cl){
			$this->error('页面不存在,3秒后跳转到首页',U('/'));
			}else{
		$id=$cl[0]['id'];
		import('Class.Category',APP_PATH);
		import('ORG.Util.Page');
		$columns=M('columns')->order('sort')->select();
		$cids=Category::getChildsID($columns,$id);
		$this->parent=Category::getParents($columns,$id);
		$cids[]=$id;
		$where=array('cid'=>array('IN',$cids));
		$count=M('article')->where($where)->count();
		$page= new Page($count, 15);
		$limit=$page->firstRow.','.$page->listRows;
		$this->article=D("ArtView")->getAll($where,$limit);
		$this->cl=$cl; 
		$this->page=$page->show();
		$this->display();
		}
    }

}