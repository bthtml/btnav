<?php
// 前台内容
class ShowAction extends Action {
    public function index(){
		if(!IS_GET) halt('页面错误');
		$id = (int)$_GET['id'];
		$field=array('title','time','id','content','cid','keywords','summary');
		$article=M('article')->field($field)->find($id);
		if(!$article){
			$this->error('页面不存在,3秒后跳转到首页',U('/'));
			}
			else{
        $this->article=$article; 
		$cid=$this->article['cid'];
		$column=M('columns')->order('sort')->select();
		import('Class.Category',APP_PATH);
		$this->parent=Category::getParents($column,$cid);
		$this->display();
	
		}
	}
	//点击次数增加
	public function clickNnm(){
		$id = (int)$_GET['id'];
		$where=array('id'=>$id);
		$mysqlus=M('article')->where($where);
		$click=$mysqlus->getField('click');
		M('article')->where($where)->setInc('click');	
		echo $click;
		
		}
}