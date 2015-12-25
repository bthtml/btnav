<?php
//工具
class HotWidget extends Widget{
	public function render ($data){
		//热门文章
		$field=array('id','title','click');
		$data['article']=M('article')->field($field)->order('click DESC')->limit(12)->select();
		return $this->renderFile('',$data);
		}
}
