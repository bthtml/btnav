<?php
// 添加文章属性控制器
class AttributeAction extends CommonAction {
	
	public function index(){
		$this->attr=M('attr')->select();
		$this->display();
		}
		
	public function addAttr(){
		$this->display();
		}
		
	public function addAttrHandle(){
		if(M('attr')->add($_POST)){
			$this->success('添加成功',U(GROUP_NAME.'/Attribute/index'));
			}else{
			$this->error('添加失败');
				}
		}
		
}
