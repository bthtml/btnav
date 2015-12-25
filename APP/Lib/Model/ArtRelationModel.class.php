<?php

class ArtRelationModel extends RelationModel{
	
	Protected $tableName='art_attr';
	
	Protected $_link = array(
		 'article'=> array(  
        'mapping_type'=>HAS_MANY,
        'class_name'=>'article',
        'foreign_key'=>'art_id',
        'mapping_name'=>'article',
        'mapping_order'=>'time desc',
           )
		);
	public function getart($type=2){
		$field=array('attr_id');
		$where=array('attr_id'=>$type);
		return $this->field($field,true)->where($where)->relation(true)->select();
		}
}
