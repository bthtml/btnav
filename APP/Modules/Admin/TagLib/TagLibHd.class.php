<?php
//自定义标签库
class TagLibHd extends TagLib{
	
	protected $tags = array(
	 'navb'=>array('attr'=>'limit,order','close'=>1),
	 'navc'=>array('attr'=>'limit,order','close'=>1),
	);

	public function _navb($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		$limit=$attr['limit'];
        $order=$attr['order'];
		$str='<?php 
		$where=array(\'csid\'=>\'0\');
		$column=M("columns")->where($where)->order("'.$order.'")->limit('.$limit.')->select();';
       $str.='import("Class.Category",APP_PATH);';
       $str.='$column=Category::unlimitedForLayer($column);';  
       $str.='foreach($column as $_v):';
	   $str.='extract($_v);';
	   $str.='?>';
       $str.=$content;
	   $str.='<?php endforeach;?>';
      return $str;
	}
	
		public function _navc($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		$limit=$attr['limit'];
        $order=$attr['order'];
		$str='<?php 
		$where=array(\'csid\'=>\'1\');
		$column=M("columns")->where($where)->order("'.$order.'")->limit('.$limit.')->select();';
       $str.='import("Class.Category",APP_PATH);';
       $str.='$column=Category::unlimitedForLayer($column);';  
       $str.='foreach($column as $_v):';
	   $str.='extract($_v);';
	   $str.='?>';
       $str.=$content;
	   $str.='<?php endforeach;?>';
      return $str;
	}


}
