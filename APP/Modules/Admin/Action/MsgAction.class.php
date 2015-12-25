<?php
// 后台查看所有项目页面控制器
class MsgAction extends CommonAction {
	
    public function index(){
		import('ORG.Util.Page');
		$count=M('info')->count();
		$page= new Page($count,10);
		$limit=$page->firstRow.','.$page->listRows;
		$this->page=$page->show();
    $this->assign('info',M('info')->order('id desc')->limit($limit)->select())->display('index');
    }
	public function delete(){
		$id=I('id','','intval');
		if(M('info')->delete($id)){
			$this->success('删除成功',U('Admin/Msg/index'));
			}
		else{
			$this->error('删除失败');	
		    }
			
		}
	public function alter(){
		$condition['id']=I('id','','intval');
		$this->assign('info',M('info')->where($condition)->select())->display('alter');
		}
		
	public function update(){
		if(!IS_POST) halt('页面错误');
		    $condition['id']=I('id','','intval');
			$data = array(
			'username'=>I('name'),
			'content'=>I('content'),
			'number'=>I('number')
			);
			
		if(M('info')->where($condition)->save($data)){
			$this->success('修改成功',U('Admin/Msg/index'));
			}else{
				$this->error('修改失败');	
				}
		}
}
