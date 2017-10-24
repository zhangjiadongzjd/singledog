<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
header("content-type:text/html;charset=utf-8");
class AddnewsController extends Controller{
	public function index(){
		$newstype=M('gamestype')->select();
		$this->assign('newstype',$newstype);
		$this->display();
	}
	public function addnews(){
		//var_dump($_POST);
		unset($_POST['newsimg']);
		$re=M('gamesnews')->data($_POST)->add();
		if($re){
			$newsid=$re;
			//var_dump($_FILES);
			 $upload = new Upload();
			//设置最大上传的大小
			$upload->maxSize = 10000000;
			//设置允许上传的扩展名
			$upload->exts = array("jpg","gif","png");
			//是否创建子目录
			$upload->autoSub = false;
			//设置保存路径的根目录
			$upload->rootPath = "./";	
			//保存路径
			$upload->savePath = "public/admin/images/newsimg/".$newsid."/";
			//上传文件
			$upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
			
			$result = $upload->upload();
			//var_dump($result);
			
			foreach($result as $key=>$v){
				if($key==0){
					$newsimg=M('newsimg')->add(array('imgname'=>$v['savename'],'newsid'=>$newsid,'shunxu'=>$key,'special'=>1));
				}else{
					$newsimg=M('newsimg')->add(array('imgname'=>$v['savename'],'newsid'=>$newsid,'shunxu'=>$key));
				}
			} 
			if($newsimg){
				$this->success('添加新闻成功',__APP__.'/Modnews/index',null);
			}else{
				$this->error('添加新闻失败','index',null);
			}
		}else{
				$this->error('添加新闻失败','index',null);
		//var_dump($result);
	} 
    }
}