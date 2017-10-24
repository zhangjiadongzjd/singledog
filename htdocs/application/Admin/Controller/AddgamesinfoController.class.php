<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
header("content-type:text/html;charset=utf-8");
class AddgamesinfoController extends Controller{
    public function index(){
        $newstype=M('gamestype')->select();
        $this->assign('newstype',$newstype);
        $this->display();
    }
    public function addgamesinfo(){
        //var_dump($_POST);
        //var_dump($_FILES);
       $result=M('gamesdetails')->data($_POST)->add();
        //var_dump($result);  
       if($result){
            $gameid=$result;
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
            $upload->savePath = "public/admin/images/gamedesktop/";
            //上传文件
            $upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
            $result1 = $upload->upload();
            $newarr=array();
            
            foreach($result1 as $v){
                $newarr[]=$v['savename'];
            }
           //var_dump($result1);
            $img_result=M('gamesdetails')->where("id={$gameid}")->save(array("bigdesktop"=>$newarr[0],"smalldesktop"=>$newarr[1]));
           if($img_result){
            $this->success('添加游戏信息成功',__APP__.'/Modgamesinfo/index',null);
            }else{
            $this->error('添加游戏信息失败','index',null);
            }
        } else{
            $this->error('添加游戏信息失败','index',null);
        }  
       
     } 
}