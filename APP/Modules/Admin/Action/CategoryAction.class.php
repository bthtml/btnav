<?php
// 后台添加栏目控制器
class CategoryAction extends CommonAction {
	
	//栏目列表
	public function index(){
		import('Class.Category',APP_PATH);
		$uid=session('uid');
		if($uid==3){
		$where=array('del'=>0);
		}else{
		$where=array('del'=>0,'uid'=>$uid);
		}
		$column=M('columns')->where($where)->order('sort ASC')->select();
		//传递1个父ID返回所以子级分类
		//$column=Category::getChilds($column,2);
		//传递1个父ID返回所以子级分类ID
		//$column=Category::getChildsID($column,2);
		//传递1个子ID返回所以父级分类
		//$column=Category::getParents($column,2);
		//下拉菜单递归
		//$column=Category::unlimitedForLayer($column,'pk');
		//列表递归
		$this->column=Category::unlimitedForLevel($column);
		$this->display();
		}
	
	//添加栏目
	public function addCate(){
		$this->pid=I('pid',0,'intval');
		$this->display();
		}
	//添加栏目表单处理	
	public function addCateHandle(){
		if(M('columns')->add($_POST)){
			$this->success('添加成功',U(GROUP_NAME.'/admin/category/index'));
			}else{
			$this->error('添加失败');
				}
		}
		
	public function delete(){
		$id=I('id','','intval');
		if(M('columns')->delete($id)){
			$this->success('删除成功',U('/admin/category/index'));
			}
		else{
			$this->error('删除失败');	
		    }
			
		}
		//修改栏目
		public function alterCate(){
			$condition['id']=I('id','','intval');
		$this->assign('column',M('columns')->where($condition)->select())->display();
			}
		public function alterCateHandle(){
			 $condition['id']=I('id','','intval');
			$data = array(
			'name'=>I('name'),
			'ename'=>I('ename'),
			'keywords'=>I('keywords'),
			'description'=>I('description'),
			'csid'=>I('csid'),
			);
			
		if(M('columns')->where($condition)->save($data)){
			$this->success('修改成功',U(GROUP_NAME.'/admin/category/index'));
			}else{
				$this->error('修改失败');	
				}
			}
	//排序
		public function sortCate(){
		$db=M('columns');
		foreach($_POST as $id => $sort){
		$db->where(array('id'=>$id))->setField('sort',$sort);
		}
		$this->redirect(GROUP_NAME . '/admin/category/index');
	}

}
