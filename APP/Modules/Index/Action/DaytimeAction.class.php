<?php
// 前台控制器
class DaytimeAction extends Action {
    public function index(){
$this->assign('info',M('info')->limit(10)->order('id desc')->select());
$this->assign('dinner',M('dinner')->limit(20)->order('id desc')->select())->display();
    }
	public function handle(){
		if(!IS_AJAX) halt('页面错误');
		$data=array(
		'username' => I('username'),
		'content' => I('content'),
		'time'=>strtotime(I('wtime')),
		'number' => I('number'),
		);
		 if($id=M('info')->data($data)->add()){
			 $data['id']=$id;
			 $data['username']=replace_phiz($data['username']);
			 $data['content']=replace_phiz($data['content']);
			 $data['time']=date('y-m-d H:i',$data['time']);
			 $data['number']=replace_phiz($data['number']);
			 $data['status']=1;
			 $this->ajaxReturn($data,'json');
			 }
		 else {
			 $this->ajaxReturn(array('status'=>0),'json');
			 }
		}
    public function addlzz(){
		$this->assign('info',M('info')->limit(20)->order('id desc')->select())->display('');
		}
    public function addalx(){
		$this->assign('dinner',M('dinner')->limit(20)->order('id desc')->select())->display('');
		}
    public function Addalxhandle(){
		if(!IS_AJAX) halt('页面错误');
		$data=array(
		'name' => I('name'),
		'order' => I('order'),
		'time'=>strtotime(I('time')),
		'message' => I('message'),
	);
		 if($id=M('dinner')->data($data)->add()){
			 $data['id']=$id;
			 $data['name']=replace_phiz($data['name']);
			 $data['order']=replace_phiz($data['order']);
			 $data['time']=date('y-m-d H:i',$data['time']);
			 $data['message']=replace_phiz($data['message']);
			 $data['status']=1;
			 $this->ajaxReturn($data,'json');
			 }
		 else {
			 $this->ajaxReturn(array('status'=>0),'json');
			 }
		}
    public function chaxun(){
		
		if(!IS_POST) halt('页面错误');
        $condition['content'] = I('ccontent','','htmlspecialchars');
		$this->assign('info',M('info')->where($condition)->order('id desc')->select())->display('chaxun'); 
	}
}