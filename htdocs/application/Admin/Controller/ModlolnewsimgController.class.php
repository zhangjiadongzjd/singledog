<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Page;
header("content-type:text/html;charset=utf-8");
class ModlolnewsimgController extends Controller{
     public function index(){
        
        $totalRow = M("lol_newsimg")->count();
        //实例化分页类
        $page = new Page($totalRow,3);
         
        $newarr=array();
        $newsimg = M("lol_newsimg")->limit($page->firstRow,$page->listRows)->select();
        
        $p=isset($_GET['p'])?$_GET['p']:1;
        //var_dump($p);
        //var_dump($newarr);
        $this->assign("p",$p);
        $this->assign("pageList",$page->show());//分页栏
        $this->assign("newsimg",$newsimg);
        //var_dump(ROOT);
        $this->display();
     }
     public function modimg(){
         $a=$_FILES['newsimg']['name'];
         //var_dump($a);
         $id=$_POST['id'];
         $p=$_GET['p'];
         //var_dump($_POST);
         unset($_POST['id']);
         //var_dump($a);
         //var_dump($b);
         if($a!=''){
             //unset($_POST['freeheroimg']);
             $re=M('lol_freehero')->where("id={$id}")->save($_POST);
             //var_dump($re);
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
             $upload->savePath = "public/admin/images/LOL_newsimg/";
             //上传文件
             $upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
             $result1 = $upload->upload();
             $filename='';
             foreach($result1 as $v){
                 $filename=$v['savename'];
             }
             $img_result=M('lol_newsimg')->where("id={$id}")->save(array("newsimg"=>$filename));
             if($img_result){
                 $this->success('修改免费英雄信息成功',__APP__.'/Modlolnewsimg/index/p/'.$p,5);
             }else{
                 $this->error('修改免费英雄信息失败',__APP__.'/Modlolnewsimg/index/p/'.$p,5);
             }
         
         }else{
             unset($_POST['newsimg']);
             $re=M('lol_newsimg')->where("id={$id}")->save($_POST);
             if($re){
                 $this->success('修改免费英雄信息成功',__APP__.'/Modlolnewsimg/index/p/'.$p,5);
             }else{
                 $this->error('修改免费英雄信息失败',__APP__.'/Modlolnewsimg/index/p/'.$p,5);
             }
         }
     }
     public function delimg(){
         $heroId=$_GET['delId'];
         //var_dump($heroId);
         $p=$_GET['p'];
         //var_dump($_GET);
         //var_dump($_SERVER);
         $del_re=M('lol_newsimg')->where("id={$heroId}")->delete();
         if($del_re){
             $this->success('删除免费英雄信息成功',__APP__.'/Modlolnewsimg/index/p/'.$p,null);
         }else{
             $this->error('删除免费英雄信息失败',__APP__.'/Modlolnewsimg/index/p/'.$p,null);
         }
     }
}