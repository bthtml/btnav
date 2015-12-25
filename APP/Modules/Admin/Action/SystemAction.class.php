<?php
// 后台查看所有项目页面控制器
class SystemAction extends CommonAction {
	
	public function verify(){
		$this->display();
		}
	public function updateVerify(){
		
//verify配置文件源码
/*//验证码长度
'VERIFY_LENGTH' => '2', 
//验证码图片宽度(像素)
'VERIFY_WIDTH' => '100', 
//验证码图片高度(像素
'VERIFY_HEIGHT' => '35', 
//验证码背影颜色(16进制色值
'VERIFY_BGCOLOR' => '#ffffff',
//验证码种子
'VERIFY_SEED' => '3456789aAbBcCdDeEfFgGhHjJkKmMnNpPqQrRsStTuUvVwWxXyY',
//验证码字体文件
'VERIFY_FONTFILE' => './Data/font.ttf',
//验证码字体大小
'VERIFY_SIZE' => '25', 
//验证码字体颜色(16进制色值)
'VERIFY_COLOR' => '#444', 
//SESSION识别名称
'VERIFY_NAME' => 'verify', 
//存储验证码到SESSION时使用函数
'VERIFY_FUNC' => 'strtolower', */
 if(F('verify',$_POST,CONF_PATH)){
	 $this->SUCCESS('修改成功',U(GROUP_NAME.'/System/verify'));
	 }else{
	 $this->error('修改失败'. CONF_PATH .'verify.php权限'); 
	 }

		}
		
}
