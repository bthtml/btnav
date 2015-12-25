<?php
//点击次数增加
class ClickAction extends Action {
    public function index(){
	$id = (int)$_GET['id'];
		$where=array('id'=>$id);
		//$mysqlus=;
	M('article')->where($where)->setInc('click');
	$click=M('article')->where($where)->getField('click');
	echo "document.getElementById('clicksum').innerHTML=".$click.";";
	}
}