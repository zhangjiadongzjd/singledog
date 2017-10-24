<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" href="/GAMES13/Public/admin/css/admin.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/GAMES13/Public/admin/css/global.css" media="all"/>
<script src="/GAMES13/Public/admin/js/jquery-1.8.0.js"></script>
<script>
var oldimgId;
var oldimgname;
var oldLink;
function showText(imgId){
	//alert(imgId);
	oldimgId=imgId;
	oldimgname=$("#t1"+imgId).html();
	oldLink=$("#t2"+imgId).html();
	$("#t1"+imgId).css({"background-color":"#AECAE8"});
	$("#t1"+imgId).html("<input type='file' name='imgname'/>")
	$("#t2"+imgId).html("<input type='button' value='确认修改' style='width:60px' onclick='submitForm()'/>&nbsp;&nbsp;<input type='button' value='取消' onclick='hideText()'/>")
}
function hideText(){
	$("#t1"+oldimgId).css({"background-color":"#fff"});
	$("#t1"+oldimgId).html(oldimgname)
	$("#t2"+oldimgId).html(oldLink)
}
function submitForm(){
	document.frm.action="/GAMES13/admin.php/Modnews/modnewsimg/imgId/"+oldimgId+"/newsId/"+<?php echo ($newsId); ?>;
	document.frm.submit();
	}
function del(imgId){
	if(confirm('是否确认删除该张新闻图片')){
		window.location="/GAMES13/admin.php/Modnews/delnewsimg/imgId/"+imgId+"/newsId/"+<?php echo ($newsId); ?>;
	}
}
</script>
<style>
table{
	width:900px;
	margin:0 auto;
}
table tr{
	height:40px;
	font-size: 16px;
    font-family: "微软雅黑 ";
}
a{
	color:#00f;
	text-decoration:underline;
	cursor:pointer;
}
table img{
	width:260px;
}
</style>
</head>
<body>
<!-- 头部 -->
<div id='header clear'>
	<div id='header-title'>			
		<p>www.singledog88.com　后台管理系统</p>
	</div>
</div>
<!-- 当前位置 -->
<div id='locationdiv'>
	<div>
		<p>后台管理 : 修改新闻图片</p>
	</div>
</div>
<!-- 正文内容 -->
<div id='main-content'>
	<div id='main-content1'>
		<!-- 左侧树状列表 -->
		<div id='leftDiv'><script type="text/javascript" src="/GAMES13/Public/admin/js/dtree.js"></script>
			<script  type="text/javascript"> 
			  function hello()
			  {
			    d = new dTree('d','/GAMES13/Public/admin/');
			
			    d.add(0,-1,'后台管理','');
			    d.add(1,0,'重新登陆','javascript:logout()');
			
			    d.add(2,0,'游戏新闻管理','');
			    d.add(21,2,'添加新闻','/GAMES13/admin.php/Addnews/index.html');
			    d.add(22,2,'修改新闻','/GAMES13/admin.php/Modnews/index.html');
			
			    d.add(3,0,'游戏分类管理','');
			    d.add(31,3,'添加游戏分类','/GAMES13/admin.php/Addgamestype/index.html');
			    d.add(32,3,'修改游戏分类','/GAMES13/admin.php/Modgamestype/index.html');
			    
			    d.add(4,0,'游戏信息管理','');
			    d.add(41,4,'添加游戏信息','/GAMES13/admin.php/Addgamesinfo/index.html');
			    d.add(42,4,'修改游戏信息','/GAMES13/admin.php/Modgamesinfo/index.html');
			    
			    d.add(5,0,'个别游戏管理','');
			    d.add(51,5,'LOL游戏信息','');
			    d.add(511,51,'添加游戏新闻图片','/GAMES13/admin.php/Addlolnewsimg/index.html');
			    d.add(512,51,'修改游戏新闻图片','/GAMES13/admin.php/Modlolnewsimg/index.html');
			    d.add(513,51,'添加免费英雄信息','/GAMES13/admin.php/Addfreehero/index.html');
			    d.add(514,51,'修改免费英雄信息','/GAMES13/admin.php/Modfreehero/index.html');
			    d.add(52,5,'DNF游戏信息','');
			    d.add(521,52,'添加游戏新闻图片','addnewsimg.php');
			    d.add(522,52,'修改游戏新闻图片','modnewsimg.php');
			    
			    d.add(6,0,'用户管理','');
			    d.add(61,6,'添加用户','adduser.php');
			
			    d.add(7,0,'返回首页','index.php');
			
			    document.write(d);
			  }
			
			  hello();
			  function logout(){
				  if(confirm('是否退出登录')){
					  window.location="/GAMES13/admin.php/Login/logout";
				  }
			  }
			</script>
		</div>
		<!-- 右侧页面内容 -->
		<div id='rightDiv'>
			<div style='width:900px;height:300px;margin:0 auto;margin-top:50px;'>
				<form action="" method='post' name='frm' onsubmit='return check()' enctype="multipart/form-data">
					<table border='1' cellspacing='0' cellpadding='0'>
							<tr>
								<td>新闻ID</td>
								<td><?php echo ($news_img["0"]["id"]); ?></td>
								<td>操作</td>
							</tr>
						<?php if(is_array($news_img)): foreach($news_img as $key=>$v): if($v['special'] == 1): ?><tr>
								<td>新闻主图片:</td>
								<td id="t1<?php echo ($v["imgId"]); ?>"><img src="/GAMES13/Public/admin/images/newsimg/<?php echo ($newsId); ?>/<?php echo ($v["imgname"]); ?>"/></td>
								<td id="t2<?php echo ($v["imgId"]); ?>"><a href="#" onclick="showText(<?php echo ($v["imgId"]); ?>)">修改</a>&nbsp;|&nbsp;<a href="#" onclick="del(<?php echo ($v["imgId"]); ?>)">删除</a></td>
							</tr>
							<?php elseif($v['special']==0): ?>
							<!-- <if condition="$v['special']==2"/> -->
							<tr>
								<td>其他新闻图片<?php echo ($v["shunxu"]); ?>:</td>
								<td id="t1<?php echo ($v["imgId"]); ?>"><img src="/GAMES13/Public/admin/images/newsimg/<?php echo ($newsId); ?>/<?php echo ($v["imgname"]); ?>"/></td>
								<td id="t2<?php echo ($v["imgId"]); ?>"><a href="#" onclick="showText(<?php echo ($v["imgId"]); ?>)">修改</a>&nbsp;|&nbsp;<a href="#" onclick="del(<?php echo ($v["imgId"]); ?>)">删除</a></td>
							</tr><?php endif; endforeach; endif; ?>
							<tr>
								<td colspan='3' style="text-align:center"><?php echo ($pageList); ?></td>
							</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>