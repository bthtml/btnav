<?php
// 添加文章控制器
class ArticleAction extends CommonAction {
	//文章列表
	public function index(){
		
		}
	//添加文章
	public function addArt(){
		//文章分类
		import('Class.Category',APP_PATH);
		$column=M('column')->order('sort ASC')->select();
		$this->column=Category::unlimitedForLevel($column);
		//文章属性
		$this->attr=M('attr')->select();
		$this->display();
		
		}
	//添加文章处理
	public function addArtHnadle(){
		
		}
		
	// 编辑器图片上传处理
	public function upload(){
		/*import('ORG.Net.UploadFile');
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
				}*/
				
		//编辑器图片上传处理
        date_default_timezone_set("Asia/chongqing");
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");
        
        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("./Data/Ueditor/php/config.json")), true);
        $action = $_GET['action'];
        switch ($action) {
            case 'config':
                $result =  json_encode($CONFIG);
                break;
        
                /* 上传图片 */
            case 'uploadimage':
                /* 上传涂鸦 */
            case 'uploadscrawl':
                /* 上传视频 */
            case 'uploadvideo':
                /* 上传文件 */
            case 'uploadfile':
                //$result = include("action_upload.php");
                import('ORG.Net.UploadFile');
                $upload = new UploadFile();
                $upload->autoSub = true;
                $upload->subType = 'date';
                $upload->dateFormat = 'Ym';
                if ($upload->upload('./Uploads/')){
                    $info = $upload->getUploadFileInfo();
                    echo json_encode(array(
                            'url'        =>    __ROOT__.'/Uploads/'.$info[0]['savename'],
                            'title'        =>    htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
                            'original'    =>    $info[0]['name'],
                            'state'        =>    'SUCCESS'
                            ));
                    
                }else{
                    echo json_encode(array(
                            'state'    => $upload->getErrorMsg(),
                            ));
                }
                break;
        
                
        }
        
        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                        'state'=> 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }

	
		}
		
}
