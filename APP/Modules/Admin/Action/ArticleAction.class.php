<?php
// 添加文章控制器
class ArticleAction extends CommonAction {
	//文章列表
	public function index(){
		import('ORG.Util.Page');
		$count=M('article')->where($where)->count();
		$page= new Page($count, 10);
		$limit=$page->firstRow.','.$page->listRows;
		$uid=session('uid');
		//dump($uid);
		if($uid==3){
		$where=array('del'=>0);
		}else{
		$where=array('del'=>0,'uid'=>$uid);
		}
		$this->article=D('ArticleRelation')->where($where)->relation(true)->select();
		$this->page=$page->show();
		$this->display();
		}
		
	//删除文章
	public function torecycle(){
		$type=(int)$_GET['type'];
		$msg =$type?'删除':'还原';
		$update=array(
		'id'=>(int)$_GET['id'],
		'del'=>$type
		);
		if(M('article')->save($update)){
			$this->success($msg.'操作成功',U(GROUP_NAME.'/Article/index'));
			}else{
				$this->error($msg.'失败了');
				}
		}
	//回收站
	public function recycle(){
		$uid=session('uid');
		$where=array('del'=>1,'uid'=>$uid);
		$this->article=D('ArticleRelation')->where($where)->relation(true)->select();
		$this->display('index');
		}
	//删除文章	
	public function delete(){
		$id=(int)$_GET['id'];
		if(M('article')->delete($id)){
			M('art_attr')->where(array('art_id'=>$id))->delete();
			$this->success('删除成功',U(GROUP_NAME.'/Article/recycle'));
			}else{
				$this->error('删除失败');
				}
		}
	//修改文章
	public function amendart(){
		$id=(int)$_GET['id'];
		$this->article=M('article')->select($id);
		$this->display();
		}
		
	public function amendartHandle(){
		$data=array(
		'title'=>$_POST['title'],
		'content'=>$_POST['content'],
		'summary'=>$_POST['summary'],
		'summary'=>$_POST['summary'],
		'keywords'=>$_POST['keywords'],
		'sid'=>$_POST['sid']
		);
		$condition['id'] = $_POST['id'];
        $condition['status'] = 1;
		if(M('article')->where($condition)->save($data)){
			$this->success('修改成功',U(GROUP_NAME.'/Article/index'));
			}else{
			$this->error('修改失败');
			}
		}
	//清空回收站
	public function todelete(){
		if(D('ArticleRelation')->deleteart()){
			$this->success('清空成功',U(GROUP_NAME.'/Article/recycle'));
			}else{
				$this->error('清空失败');
				}
		}
	//添加文章
	public function addArt(){
		//文章分类
		import('Class.Category',APP_PATH);
		$column=M('columns')->order('sort ASC')->select();
		$this->column=Category::unlimitedForLevel($column);
		//文章属性
		$this->attr=M('attr')->select();
		$this->display();
		
		}
	//添加文章处理
	public function addArtHandle(){
		$uid=session('uid');
		$data=array(
		'title'=>$_POST['title'],
		'content'=>$_POST['content'],
		'summary'=>$_POST['summary'],
		'imgurl'=>$_POST['imgurl'],
		'keywords'=>$_POST['keywords'],
		'time'=>time(),
		'click'=>(int)$_POST['click'],
		'cid'=>(int)$_POST['cid'],
		'sid'=>(int)$_POST['sid'],
		'uid'=>$uid
		);
        if($art_id=M('article')->add($data)){
			if(isset($_POST['aid'])){
			$sql='INSERT INTO`'.C('DB_PREFIX').'art_attr`(art_id,attr_id)VALUES';
			foreach($_POST['aid'] as $v){
				$sql.='('.$art_id.','.$v.'),';
				}
				$sql=rtrim($sql,',');
				M('art_attr')->query($sql);
			}
			$this->success('添加成功',U(GROUP_NAME.'/Article/index'));
			}else{
				$this->error('添加失败');
				}
		
	}
	
	// 编辑器图片上传处理
	public function upload(){
	import('ORG.Net.UploadFile');
		$upload=new UploadFile();
		$upload->autoSub=true;
		$upload->subType='date';
		$upload->dateFormat='Ym';
		if($upload->$upload('./Uploads/')){
			$info=$upload->getUploadFileInfo();
			echo json_encode(array(
			'url'=>$info[0]['savename'],
			'title'=>htmlspecialchars($_POST['pictitle'],ENT_QUOTES),
			'original'=>$info[0]['name'],
			'state'=>'SUCCESS'
			));
			}else{
				echo json_encode(array(
				'state'=>$upload->getErrorMsg()
				));
				}
				
		}
		
}
