<?php	
class  Category {
	//组合一维数组
	static public function unlimitedForLevel($column,$html='__',$pid=0,$level=0){
		$arr=array();
		foreach($column as $v){
			if($v['pid']==$pid){
				$v['level']=$level+1;
				$v['html']=str_repeat($html,$level);
				$arr[]=$v;
				$arr=array_merge($arr,self::unlimitedForLevel($column,$html,$v['id'],$level+1));
				}
			}
		return $arr;
		}
		//组合文章属性一维数组
	static public function unlimitedForLevelwz($art_attr,$attr_id){
		$arr=array();
		foreach($art_attr as $v){
			if($v['attr_id']==$attr_id){
				$arr[]=$v;
				$arr=array_merge($arr,self::unlimitedForLevel($art_attr,$v['art_id']));
				}
			}
		return $arr;
		}
	//组合多维数组
	static public function unlimitedForLayer($column,$name='child',$pid=0){
		$arr=array();
		foreach($column as $v){
			if($v['pid']==$pid){
				$v[$name]=self::unlimitedForLayer($column,$name,$v['id']);
				$arr[]=$v;
				}
			}
			return $arr;
		}
		//传递1个子ID返回所以父级分类
		static public function getParents($column,$id){
			$arr=array();
			foreach($column as $v){
				if($v['id']==$id){
					$arr[]=$v;
					$arr=array_merge($arr,self::getParents($column,$v['pid'],$arr));
				}
				}
			return $arr;
			}
		//传递1个父ID返回所以子级分类ID
			static public function getChildsID($column,$pid){
			$arr=array();
			foreach($column as $v){
				if($v['pid']==$pid){
					$arr[]=$v['id'];
					$arr=array_merge($arr,self::getChildsID($column,$v['id']));
				}
				}
			return $arr;
			}
		//传递1个父ID返回所以子级分类
			static public function getChilds($column,$pid){
			$arr=array();
			foreach($column as $v){
				if($v['pid']==$pid){
					$arr[]=$v;
					$arr=array_merge($arr,self::getChilds($column,$v['id']));
				}
				}
			return $arr;
			}
			
	}
?>