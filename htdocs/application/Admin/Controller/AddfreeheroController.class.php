<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
header("content-type:text/html;charset=utf-8");
class AddfreeheroController extends Controller{
    public function index(){

        $this->display();
    }
    public function addfreehero(){
       //var_dump($_POST);
       //var_dump($_FILES);
       $result=M('lol_freehero')->data($_POST)->add();
        //var_dump($result);  
       if($result){
            $heroid=$result;
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
            $upload->savePath = "public/admin/images/LOL_freehero/";
            //上传文件
            $upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
            $result1 = $upload->upload();
            $filename='';
            foreach ($result1 as $v){
                $filename=$v['savename'];
            }
            $img_result=M('lol_freehero')->where("id={$heroid}")->save(array("freeheroimg"=>$filename));
           if($img_result){
            $this->success('添加英雄成功',__APP__.'/Modfreehero/index',null);
            }else{
            $this->error('添加英雄失败','index',null);
            }
        } else{
            $this->error('添加英雄失败','index',null);
        }  
       
     } 
}