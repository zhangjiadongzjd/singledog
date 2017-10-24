<?php
namespace Admin\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class AddgamestypeController extends Controller{
    public function index(){
        $this->display();
    }
    public function addtype(){
        $result=M('gamestype')->data($_POST)->add();
        if($result){
            $this->success('添加分类成功',__APP__.'Modgamestype/index',null); 
        }else{
            $this->error('添加分类失败','index',null);
        }
    }
}