<?php
/**
*前台列表关联模型
*/
class ArtViewModel extends RelationModel{
	
/*   Protected $viewFields=array(
   	'columns'=>array('id','name','_type'=>'LEFT'),
	'article'=>array('id','title','time','imgurl','click','summary','_on'=>'article.cid = columns.id')
   //'columns'=>array('name','_on'=>'article.cid = columns.id')
   );*/
   
   	Protected $tableName='columns';

	Protected $_link = array(	
		'article'=>array(
		'mapping_type'=>HAS_MANY,
		'class_name'=>'article',
		'foreign_key'=>'cid',
		'mapping_name'=>'article',
		'condition'=>'sid=0 and del=0',
		//'mapping_fields'=>'id,title,imgurl,summary',
		),
		);
		
	public function getlist($type=0){
		$field=array('del');
		$where=array('del'=>$type);
		return $this->field($field,true)->where($where)->relation(true)->select();
		}
   





}
