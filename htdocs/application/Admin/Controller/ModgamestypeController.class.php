<?php
namespace Admin\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class ModgamestypeController extends Controller{
    public function index(){
        $gamestype=M('gamestype')->select();
        $this->assign('gamestype',$gamestype);
        $this->display();
    }
    public function modtype(){
        //var_dump($_GET);
        $typeId=$_GET['id'];
        $result=M('gamestype')->where("id={$typeId}")->data($_POST)->save();
        if($result){
            $this->success('修改分类成功',__APP__.'/Modgamestype/index',null);
        }else{
            $this->error('修改分类失败',__APP__.'/Modgamestype/index',null);
        }
    }
    public function deltype(){
        $typeId=$_GET['id'];
        $newsimg_result=M('newsimg')->where("newsid in (select id from gamesnews where nid={$typeId})")->delete();
        $gamesdetails_result=M('gamesdetails')->where("tid={$typeId}")->delete();
        $gamesnews_result=M('gamesnews')->where("nid={$typeId}")->delete();
        $gamestype_result=M('gamestype')->where("id={$typeId}")->delete();
        if($gamestype_result){
            $this->success('删除分类成功',__APP__.'/Modgamestype/index',null);
        }else{
            $this->error('删除分类失败',__APP__.'/Modgamestype/index',null);
        }
    }
}