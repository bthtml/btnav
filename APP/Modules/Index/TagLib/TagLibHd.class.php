<?php
//自定义标签库
class TagLibHd extends TagLib{
	
	protected $tags = array(
	 'nava'=>array('attr'=>'limit,order','close'=>1),
	 'hot'=>array('attr'=>'limit','close'=>1),
	 'new'=>array('attr'=>'limit','close'=>1),
	 'tjyd'=>array('attr'=>'limit','close'=>1),
	);

	public function _nava($attr,$content){
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
	public function _hot($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		$limit=$attr['limit'];
		$str='<?php ';//空格
		$str.='$field=array("id","title","click");';
		$str.='$_hot=M("article")->field($field)->limit('.$limit.')->order("click DESC")->select();';
		$str.='foreach($_hot as $_hot_v):';
		$str.='extract($_hot_v);';
		$str.='$url=U("/post/".$id);';
		$str.='?>';
		$str.=$content;
	   $str.='<?php endforeach;?>';
       return $str;
		}
    public function _new($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		$limit=$attr['limit'];
		$str='<?php ';//空格
		$str.='$field=array("id","title","click");';
		$str.='$_new=M("article")->field($field)->limit('.$limit.')->order("time DESC")->select();';
		$str.='foreach($_new as $_new_v):';
		$str.='extract($_new_v);';
		$str.='$url=U("/post/".$id);';
		$str.='?>';
		$str.=$content;
	   $str.='<?php endforeach;?>';
       return $str;
		}
	public function _tjyd($attr,$content){

			}

}
