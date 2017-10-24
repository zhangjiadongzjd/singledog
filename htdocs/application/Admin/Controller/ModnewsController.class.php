<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
header("content-type:text/html;charset=utf-8");
class ModnewsController extends Controller{
	public function index(){
		
	    $totalRow = M("gamesnews")->count();
	    $page = new Page($totalRow,10);
	    
	    $news=M('gamesnews')->field('gamesnews.id,gamesnews.title,gamesnews.time,gamestype.gamestypename')->join('gamestype on gamesnews.nid = gamestype.id')->order("time desc")->limit($page->firstRow,$page->listRows)->select();
	    //var_dump($news_img);
	    
	    
		//$news=M('gamesnews')->query("select n.id,n.title,n.time,t.gamestypename from gamesnews as n inner join gamestype as t on n.nid=t.id order by n.time desc");
		
		$this->assign('news',$news);
		$this->assign("pageList",$page->show());
		$this->display();
	}
	public function modarea(){
		$newsId=$_GET['newsId'];
		$current_news=M('gamesnews')->where("id={$newsId}")->find();
		
		$gamestype=M('gamestype')->select();
		
		//$news_img=M('newsimg')->query("select m.imgname,m.shunxu,m.special from newsimg as m inner join gamesnews as n on m.newsid=n.id where newsid={$newsId} order by shunxu ");
		
		//$this->assign('news_img',$news_img);
		$this->assign('current_news',$current_news);
		$this->assign('gamestype',$gamestype);
		$this->display('modnews');
	}
	public function modnewscontent(){
		//var_dump($_POST);
		$result=M('gamesnews')->data($_POST)->save();
		if($result){
			$this->success('修改新闻内容成功','index',5);
		}else{
			$this->error('修改新闻内容失败','modnews/newsId/'.$_POST['id'],5);
		}
	}
	public function modimgarea(){
	    $newsId=$_GET['newsId'];
	    $totalRow = M("newsimg")->where("newsid={$newsId}")->count();
	    $page = new Page($totalRow,3);
		
		$news_img=M('newsimg')->join('gamesnews on newsimg.newsid = gamesnews.id')->where("newsid={$newsId}")->order("shunxu")->limit($page->firstRow,$page->listRows)->select();
		//var_dump($news_img);
		$this->assign('newsId',$newsId);
		$this->assign("pageList",$page->show());
		$this->assign('news_img',$news_img);
		$this->display('modimg');
	}
	public function modnewsimg(){
		$imgId=$_GET['imgId'];
		$newsId=$_GET['newsId'];
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
		$upload->savePath = "public/admin/images/newsimg/".$newsId."/";
		//上传文件
		$upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
		$result1 = $upload->upload();
		$filename='';
		foreach($result1 as $v){
			$filename=$v['savename'];
		}
		$img_result=M('newsimg')->where("imgId={$imgId}")->save(array("imgname"=>$filename));
		//var_dump($imgId);
		if($img_result){
			$this->success('修改游戏新闻图片成功',__APP__.'/Modnews/modimgarea/newsId/'.$newsId,5);
		}else{
			$this->error('修改游戏新闻图片失败',__APP__.'/Modnews/modimgarea/newsId/'.$newsId,5);
		}
		
	}
	public function delnewsimg(){
		$imgId=$_GET['imgId'];
		$newsId=$_GET['newsId'];
		//var_dump($_GET);
		$result=M('newsimg')->where("imgId={$imgId}")->delete();
		if($result){
			$this->success('删除新闻图片成功',__APP__.'/Modnews/modimgarea/newsId/'.$newsId,5);
		}else{
			$this->error('删除新闻图片失败',__APP__.'/Modnews/modimgarea/newsId/'.$newsId,5);
		}
	}
	public function delnews(){
	    $newsId=$_GET['delId'];
	    //var_dump($_GET);
	    $img_result=M('newsimg')->where("newsid={$newsId}")->delete();
	    $news_result=M('gamesnews')->where("id={$newsId}")->delete();
	    if($news_result && $img_result){
	        $this->success('删除新闻图片成功',__APP__.'/Modnews/index',5);
	    }else{
	        $this->error('删除新闻图片失败',__APP__.'/Modnews/index',5);
	    }
	}
}
