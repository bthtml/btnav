<?php
// 前台控制器
class IndexAction extends Action {
    public function index(){
/*      import('ORG.Util.Page');
		$count=M('columns')->where(array('pid'=>0))->count();
		$page= new Page($count,18);
		$limit=$page->firstRow.','.$page->listRows;
		$where=array('del'=>0);
		$this->article=D("ArtView")->getAll($where,$limit);
		$this->page=$page->show();
		var_dump($this);
		$this->display();*/
	$where=array('pid'=>0,'csid'=>0);
	//$Course=D('ArtView');
	//$list=array('del'=>0,'sid'=>0);
	//$Course->condition('del=0 and sid=0');
	$this->columns=D('ArtView')->where($where)->order('sort')->relation(true)->select();
	//dump($this);
	//$this->buildHtml("index",'',"");
	$this->display();

    }

}