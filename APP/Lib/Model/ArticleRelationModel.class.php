<?php

class ArticleRelationModel extends RelationModel{
	
	Protected $tableName='article';
	
	Protected $_link = array(
		'attr'=>array(
		'mapping_type'=>MANY_TO_MANY,
		'mapping_name'=>'attr',
		'foreign_key'=>'art_id',
		'relation_foreign_key'=>'attr_id',
		'relation_table'=>'th_art_attr',
		),
		
		'columns'=>array(
		'mapping_type'=>BELONGS_TO,
		'foreign_key'=>'cid',
		'mapping_fields'=>'name',
		'as_fields'=>'name:c_name'
		),
		);
	public function getart($type=0){
		$field=array('del');
		$where=array('del'=>$type);
		return $this->field($field,true)->where($where)->relation(true)->select();
		}
	public function deleteart($type=1){
		$field=array('del');
		$where=array('del'=>$type);
		return $this->field($field,true)->where($where)->relation(true)->delete();
		}

}
