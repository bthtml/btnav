<?php
//自定义redis处理session驱动
 class SessionRedis {
	 //保存redis连接对象
	 private $redis;
	  //保存session有效时间连接对象
	 private $expire;
	 public function execute(){
		 session_set_save_handler(
		 array(&$this,'open'),
		 array(&$this,'close'),
		 array(&$this,'read'),
		 array(&$this,'write'),
		 array(&$this,'destroy'),
		 array(&$this,'gc')
		 );
		 }
		/**
		*打开session
		*/ 
	  public function open($path,$name){
		  $this->expire=C('SESSION_EXPIRE')?C('SESSION_EXPIRE') : ini_get('session.gc_maxlifetime');
		  $this->redis=new Redis();
		  return $this->redis->connect(C('REDIS_HOST'),C('REDIS_RORT'));
		  }
		/**
		*关闭session
		*/  
	  public function close(){
		 return $this->redis->close();
		  }
		/**
		*读取session
		*/
	  public function read($id){
		 $id=C('SESSION_PREFIX').$id;
		 $data=$this->redis->get($id);
		 return $data ?$data : '';
		  }
		/**
		*写入session
		*/
	  public function write($id,$data){
		   $id=C('SESSION_PREFIX').$id;
		  return $this->redis->set($id,$data,$this->expire);
		  }
      /**
		*销毁session
		*/
	  public function destroy($id){
		  $id=C('SESSION_PREFIX').$id;
		  return $this->redis->delete($id);
		  }
		  
	  public function gc($maxLifeTime){
		  return true;
		  }
		  
	 }
	 
?>
