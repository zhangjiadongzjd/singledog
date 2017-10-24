<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
header("content-type:text/html;charset=utf-8");
class GamesdetailsController extends Controller {
	public function index(){
		/* 游戏类型 */
		$gamestype=M('gamestype')->limit(0,3)->select();
		//var_dump($gamestype);
		$this->assign('gamestype',$gamestype);
		
		$typeId=$_GET['typeId'];
		$totalRow = M("gamesdetails")->where("tid={$typeId}")->count();
		$page = new Page($totalRow,4);
		$gamesdetails=M('gamesdetails')->where("tid={$typeId}")->order("gamehot desc")->limit($page->firstRow,$page->listRows)->select();
		$this->assign('gamesdetails',$gamesdetails);
		//var_dump($gamesdetails);
		$this->assign("pageList",$page->show());
		$this->display();
	}
}