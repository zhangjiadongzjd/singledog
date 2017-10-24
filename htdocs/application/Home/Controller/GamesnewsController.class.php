<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class GamesnewsController extends Controller {
	public function index(){
		/* 游戏类型 */
		$gamestype=M('gamestype')->cache(true,86400)->limit(0,3)->select();
		//var_dump($gamestype);
		$this->assign('gamestype',$gamestype);
		
		//var_dump($_GET);
		$newsId=$_GET['newsId'];
		
		/* 点击量+1 */
		M('gamesnews')->where("id={$newsId}")->setInc("hints",1);
		
		$newscontent=M('gamesnews')->cache(true,86400)->where("id={$newsId}")->find();
		$this->assign('newscontent',$newscontent);
		$content=$newscontent['content'];
		$img_count=M('newsimg')->cache(true,86400)->where("newsid={$newsId}")->count();
		$newsimg=M('newsimg')->cache(true,86400)->where("newsid={$newsId}")->order('shunxu')->select();
		//var_dump($img_count);
		for($i=1;$i<=$img_count;$i++){
			if($img_count==1){
				$a=$i-1;
				$replace="<div><img src='".ROOT."/admin/images/newsimg/{$newsId}/{$newsimg[$a]['imgname']}'/></div>";
				$content=str_replace("{img".$i."}", $replace, $content);
			}else{
			
			$replace="<div><img src='".ROOT."/admin/images/newsimg/{$newsId}/{$newsimg[$i]['imgname']}'/></div>";
			$content=str_replace("{img".$i."}", $replace, $content);		
			}
		} 
		//var_dump($content);
		$this->assign('content',$content);
		$this->display();
	}
}