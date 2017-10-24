<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller {
    public function index(){
    	/* 最新单机游戏5条 */
    	$alonegame=M('gamesdetails')->cache(true,86400)->where("tid=2")->order("gamehot desc")->limit(0,5)->select();
    	//var_dump($alonegame);
    	$this->assign('alonegame',$alonegame);
    	
    	/* 热门网络游戏5条 */
    	$olinegame=M('gamesdetails')->cache(true,86400)->where("tid=1")->order("gamehot desc")->limit(0,5)->select();
    	//var_dump($olinegame);
    	$this->assign('olinegame',$olinegame);
    	
    	/* 热门手游5条 */
    	$mobilegame=M('gamesdetails')->cache(true,86400)->where("tid=3")->order("gamehot desc")->limit(0,5)->select();
    	$this->assign('mobilegame',$mobilegame);
    	
    	/* 页游推荐5条 */
    	$webgames=M('gamesdetails')->cache(true,86400)->where("tid=4")->order("gamehot desc")->limit(0,5)->select();
    	//var_dump($webgames);
    	$this->assign('webgames',$webgames);
    	
    	/* 英雄联盟ID */
    	$lolId=M('gamesdetails')->field('id')->where("gamesname='英雄联盟'")->find();
    	//var_dump($lolId);
    	$this->assign('lolId',$lolId);
    	
    	/* 地下城与勇士ID */
    	$dnfId=M('gamesdetails')->field('id')->where("gamesname='地下城与勇士'")->find();
    	//var_dump($dnfId);
    	$this->assign('dnfId',$dnfId);
    	
    	/* 阴阳师ID */
    	$yysId=M('gamesdetails')->field('id')->where("gamesname='阴阳师'")->find();
    	//var_dump($yysId);
    	$this->assign('yysId',$yysId);
    	
    	/* 热门网游 */
    	$hotonline=M('gamesdetails')->cache(true,86400)->field('gamesname,gamehot')->where('tid=1')->limit(0,12)->select();
    	//var_dump($hotonline);
    	$this->assign('hotonline',$hotonline);
    	
    	/* 热门手游 */
    	$hotmobile=M('gamesdetails')->cache(true,86400)->field('gamesname,gamehot')->where('tid=3')->limit(0,12)->select();
    	//var_dump($hotmobile);
    	$this->assign('hotmobile',$hotmobile);
    	
    	/* 热门单机 */
    	$hotalonegame=M('gamesdetails')->cache(true,86400)->field('gamesname,gamehot')->where('tid=2')->limit(0,12)->select();
    	//var_dump($hotalonegame);
    	$this->assign('hotalonegame',$hotalonegame);
    	
    	/* 热门页游*/
    	$hotwebgame=M('gamesdetails')->cache(true,86400)->field('gamesname,gamehot')->where('tid=4')->limit(0,13)->select();
    	//var_dump($hotwebgame);
    	$this->assign('hotwebgame',$hotwebgame);
    	
    	/* 游戏总数 */
    	$gamesdetails_num=M('gamesdetails')->count();
    	$this->assign('gamesdetails_num',$gamesdetails_num);
    	
    	/* LOL 新闻图片 */
    	$LOL_newsimg=M('lol_newsimg')->cache(true,86400)->order('dateandtime desc')->limit(0,4)->select();
    	$this->assign('LOL_newsimg',$LOL_newsimg);
    	
    	/* LOL 免费英雄 */
    	$LOL_freehero=M('lol_freehero')->cache(true,604800)->limit(4,10)->select();
    	$this->assign('LOL_freehero',$LOL_freehero);
    	
    	/* 游戏排行 */
    	$gamesrank=M('gamestype')->cache(true,86400)->select();
    	//var_dump($gamesrank);
    	foreach($gamesrank as $key=>$v){
    		$v['rank']=M('gamesdetails')->where("tid={$v['id']}")->field('gamesname,smalldesktop,gametype')->order('gamehot desc')->limit(0,10)->select();
    		$gamesrank[$key]=$v;
    	}
    	//var_dump($gamesrank);
    	$this->assign('gamesrank',$gamesrank);
    	
		/* 网络游戏 */
    	$online=M('gamestype')->field('id')->where("gamestypename='网络游戏'")->find();
    	$this->assign('online',$online);
    	//var_dump($online);
    	
    	/* 单机游戏 */
    	$alone=M('gamestype')->field('id')->where("gamestypename='单机游戏'")->find();
    	$this->assign('alone',$alone);
    	
    	/* 手机游戏 */
    	$mobile=M('gamestype')->field('id')->where("gamestypename='手机游戏'")->find();
    	$this->assign('mobile',$mobile);
    	
    	/* 今日热闻 */
    	$todayhotnews=M('gamesnews')->order('hints desc')->limit(0,4)->select();
    	$this->assign('todayhotnews',$todayhotnews);
    	//var_dump($todayhotnews);
    	
    	/* 手机游戏新闻带图片的2条 */
    	$mobilenews=M('gamesnews')->cache(true,86400)->field("id,title")->where('nid=3')->order('hints desc')->limit(0,2)->select();
    	//var_dump($mobilenews);
    	foreach($mobilenews as $key=>$v){
    		$v['mainimg']=M('newsimg')->cache(true,86400)->field('imgname')->where("newsid={$v['id']} && special=1")->find();
    		$mobilenews[$key]=$v;
    	} 
    	//var_dump($mobilenews);
    	$this->assign('mobilenews',$mobilenews);
    	
    	/* 网络游戏新闻带图片的2条 */
    	$onlinenews=M('gamesnews')->cache(true,86400)->field("id,title")->where('nid=1 && hints<1000')->order('hints desc')->limit(0,2)->select();
    	//var_dump($mobilenews);
    	foreach($onlinenews as $key=>$v){
    		$v['mainimg']=M('newsimg')->cache(true,86400)->field('imgname')->where("newsid={$v['id']} && special=1")->find();
    		$onlinenews[$key]=$v;
    	}
    	//var_dump($mobilenews);
    	$this->assign('onlinenews',$onlinenews);
    	
    	/* 单机游戏新闻带图片的2条 */
    	$alonenews=M('gamesnews')->cache(true,86400)->field("id,title")->where('nid=2 && hints<1000')->order('hints desc')->limit(0,2)->select();
    	//var_dump($mobilenews);
    	foreach($alonenews as $key=>$v){
    		$v['mainimg']=M('newsimg')->cache(true,86400)->field('imgname')->where("newsid={$v['id']} && special=1")->find();
    		$alonenews[$key]=$v;
    	}
    	//var_dump($mobilenews);
    	$this->assign('alonenews',$alonenews);
    	
    	/* 网页游戏新闻带图片的2条 */
    	$webnews=M('gamesnews')->cache(true,86400)->field("id,title")->where('nid=4 && hints<1000')->order('hints desc')->limit(0,2)->select();
    	//var_dump($webnews);
    	foreach($webnews as $key=>$v){
    		$v['mainimg']=M('newsimg')->cache(true,86400)->field('imgname')->where("newsid={$v['id']} && special=1")->find();
    		$webnews[$key]=$v;
    	}
    	//var_dump($webnews);
    	$this->assign('webnews',$webnews);
    	
    	/* 手机游戏新闻不带图片的新闻标题 */
    	$mobile_noimg=M('gamesnews')->cache(true,86400)->field("id,title,time")->where('nid=3 && hints<700')->order('hints desc')->limit(0,2)->select();
    	$this->assign('mobile_noimg',$mobile_noimg);
    	
    	/* 网络游戏新闻不带图片的新闻标题 */
    	$online_noimg=M('gamesnews')->cache(true,86400)->field("id,title,time")->where('nid=1 && hints<700')->order('hints desc')->limit(0,2)->select();
    	$this->assign('online_noimg',$online_noimg);
    	
    	/* 单机游戏新闻不带图片的新闻标题 */
    	$alone_noimg=M('gamesnews')->cache(true,86400)->field("id,title,time")->where('nid=2 && hints<700')->order('hints desc')->limit(0,2)->select();
    	$this->assign('alone_noimg',$alone_noimg);
    	
    	/* 网页游戏新闻不带图片的新闻标题 */
    	$web_noimg=M('gamesnews')->cache(true,86400)->field("id,title,time")->where('nid=4 && hints<700')->order('hints desc')->limit(0,2)->select();
    	$this->assign('web_noimg',$web_noimg);
    	
    	$this->display();
    }
}