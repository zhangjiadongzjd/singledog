<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert title here</title>
<link rel="shortcut icon" href="/Public/home/images/Logo/logo.png.ico"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/global.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/GamesTypes.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/home.css" media="all"/>
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
<!-- 游戏类型名称开始 -->
<div id='gamestypes-name'>
	<div id='gamestypes-name1'>
		<h2>网络游戏</h2>
	</div>
</div>
<!-- 游戏类型名称结束 -->
<!-- 中间内容开始 -->
<div id='gamestypes-content' class='clear'>
	<?php if(is_array($gamesdetails)): foreach($gamesdetails as $key=>$v): ?><div id='gamestypes-c'>
		<div id='gamestypes-img'>	    
			<span><img src="/Public/admin/images/gamedesktop/<?php echo ($v["bigdesktop"]); ?>"/></span>
		</div>
		<div id='gamestypes-c-right'>
			<h2><?php echo ($v["gamesname"]); ?></h2>
			<div id='gamestypes-c-bottom'>
				<dl>
					<dt>中文名</dt>
						<dd><?php echo ($v["gamesname"]); ?></dd>
					<dt>原版名称</dt>
						<dd><?php echo ($v["yname"]); ?></dd>
					<dt>其他名称</dt>
						<dd><?php echo ($v["oname"]); ?></dd>
					<dt>游戏类型</dt>
						<dd><?php echo ($v["gametype"]); ?></dd>
					<dt>游戏平台</dt>
						<dd><?php echo ($v["platform"]); ?></dd>
					<dt>开发商</dt>
						<dd><?php echo ($v["developers"]); ?></dd>
					<dt>发行商</dt>
						<dd><?php echo ($v["publisher"]); ?></dd>
					<dt>发行日期</dt>
						<dd><?php echo ($v["issuedate"]); ?></dd>
					<dt>游戏画面</dt>
						<dd><?php echo ($v["gamescreen"]); ?></dd>
					<dt>玩家人数</dt>
						<dd><?php echo ($v["playernum"]); ?></dd>
				</dl>
			</div>
		</div>
	</div><?php endforeach; endif; ?>
	<div id='tab-bar'>
		<div>
			<?php echo ($pageList); ?>
		</div>
	</div>
</div>
<!-- 中间内容结束 -->
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