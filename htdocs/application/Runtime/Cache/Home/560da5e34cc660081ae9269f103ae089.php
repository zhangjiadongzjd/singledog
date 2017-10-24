<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" href="/Public/home/css/global.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/GamesTypes.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/home.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/GamesNews.css" media="all"/>
</head>
<body>
<!-- 注册头开始 -->
<div id='topbar'>
	<div id='topbar-t1'>					
			<div id='login-l1'>	
			<?php if($_SESSION['usermsg']['username']!= ''): ?>您好,　<a class='havelogin' href="/home.php/Login/index"><?php echo ($_SESSION['usermsg']['username']); ?></a>&nbsp;|&nbsp;<a href="/home.php/Login/logout">退出</a>
			<?php else: ?>			
				<a class='notlogin' href="/home.php/Login/index">登录</a>&nbsp;|&nbsp;<a href="/home.php/Regist/index">注册</a><?php endif; ?>
			</div>	
			<div id='topbar-hot'>
				<a href="#">热门游戏</a>
			</div>	
	</div>
</div>
<!-- 注册头结束 -->
<!-- 导航头开始 -->
<div id='head-navi'>
	<div id='gamestype-navi'>
		<ul>
			<li><div><a href="/home.php/Home/index"><span>首页</span><span>首页</span></a></div></li>	
			
			<?php if(is_array($gamestype)): foreach($gamestype as $key=>$v): ?><li><div><a href="/home.php/Gamesdetails/index/typeId/<?php echo ($v["id"]); ?>"><span><?php echo ($v["gamestypename"]); ?></span><span><?php echo ($v["gamestypename"]); ?></span></a></div></li><?php endforeach; endif; ?>
			
			<li><div><a><span>新闻中心</span><span>新闻中心</span></a></div></li>
			<li><div><a><span>更多</span><span>更多</span></a></div></li>
			
		</ul>
	</div>
</div>
<!-- 导航头结束 -->
<!-- 新闻导航开始 -->
<div id='news-navi-bg'>
	<div id='newscontents-navi'>
		<p><a>游戏新闻</a>　<span>></span>　网络新闻</p>
	</div>
</div>
<!-- 新闻导航结束 -->
<!-- 新闻内容开始 -->
<div id='middlecontents'>
	<div id='newscontents'>
		<div id='newscontents-title'>
			<p><?php echo ($newscontent["title"]); ?></p>
		</div>
		<div id='newscontents-date'>
			<p>发表时间:<?php echo ($newscontent["time"]); ?></p>
		</div>
		<div id='newscontents-author'>
			<p>【<?php echo ($newscontent["source"]); ?>：<?php echo ($newscontent["author"]); ?>】</p>
		</div>
		<div id='newscontents-content'>
			<p><?php echo ($content); ?></p>
		</div>
	</div>
</div>


<!-- 新闻内容结束 -->
<!-- 网站底部 -->
<div id='footer'>
	<div id='footer-middle'>
		<div id='footer-hr'></div>
		<div id='footer-content'>
			<img src="/Public/home/images/Logo/logo.png.png"/>
			<div id='footer-content1'>
				<p>
					关于Single Dog　|　家长监护　|　人才招聘　|　广告服务　|　商务洽谈　|　联系方式　|　客服中心　| 网站导航　|　友情链接　|　版权保护投诉指引　|　隐私政策
				</p>
			</div>
			<br/>
			<div id='footer-content2'>
				<p>
					Copyright©2016 SingleDog88.com All rights reserved
					<br/>
					ICP备案:&nbsp;&nbsp;<a href='www.miitbeian.gov.cn' style='color:blue'>沪ICP备16050645号-1</a>
				</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>