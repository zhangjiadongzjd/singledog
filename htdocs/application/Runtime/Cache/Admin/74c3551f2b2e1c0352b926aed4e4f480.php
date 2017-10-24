<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" href="/Public/admin/css/admin.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/admin/css/global.css" media="all"/>
<script src="/Public/admin/js/jquery-1.8.0.js"></script>
<script>
	var olddateandtime;
	var oldnewsimg;
	var oldnewsimgId;
	var	oldLink;
	function showText(newsimgId){
		//alert(heroId)
		hideText();
		olddateandtime=$('#t2'+newsimgId).html();
	  	oldnewsimg=$('#t1'+newsimgId).html();
		oldnewsimgId=$('#t0'+newsimgId).html();
		oldnewsimgId=newsimgId;
	  	oldLink=$('#t3'+newsimgId).html();
	  	
	$('#t0'+newsimgId).css({"background-color":"#AECAE8"})
	$('#t1'+newsimgId).css({"background-color":"#AECAE8"})
	$('#t2'+newsimgId).css({"background-color":"#AECAE8"})
	$('#t0'+newsimgId).html("<input type='text' size='1' name='id' value='"+oldnewsimgId+"' style='height:25px;font-size:18px;width:10px'/>")
	$('#t2'+newsimgId).html("<input type='text' size='15' name='dateandtime' value='"+olddateandtime+"' style='height:25px;font-size:18px;'/>")
	$('#t1'+newsimgId).html("<input type='file' name='newsimg' style='width:200px;'/>")
	$('#t3'+newsimgId).html("<a href='#' onclick='submitForm()'>更新</a>&nbsp;|&nbsp;<a href='#' onclick='hideText()'>取消</a>")
		}
	function hideText(){
	$('#t0'+oldnewsimgId).css({"background-color":"white"})
	$('#t1'+oldnewsimgId).css({"background-color":"white"})
	$('#t2'+oldnewsimgId).css({"background-color":"white"})
	$('#t0'+oldnewsimgId).html(oldnewsimgId)
	$('#t1'+oldnewsimgId).html(oldnewsimg)
	$('#t2'+oldnewsimgId).html(olddateandtime)
	$('#t3'+oldnewsimgId).html(oldLink)
		}
	function submitForm(){
		document.frm.action="/admin.php/Modlolnewsimg/modimg/p/"+<?php echo ($p); ?>;
		//alert(<?php echo ($p); ?>)
		document.frm.submit();
		}
	function del(newsimgId){
		if(confirm('是否确认删除该游戏信息')){
			//alert(heroId)
			window.location="/admin.php/Modlolnewsimg/delimg/delId/"+newsimgId+"/p/"+<?php echo ($p); ?>;
		}
	} 
</script>
<style>
table{
	width:930px;
	margin:0 auto;
	margin-top:20px;
	text-align:center;
}
table tr{
	height:40px;
	font-size: 16px;
    font-family: "微软雅黑 ";
	margin-top:10px;
}
a{
	cursor:pointer;
}
.newsimgwidth{
	width:300px;
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
		<p>后台管理 : 管理首页</p>
	</div>
</div>
<!-- 正文内容 -->
<div id='main-content'>
	<div id='main-content1'>
		<!-- 左侧树状列表 -->
		<div id='leftDiv'><script type="text/javascript" src="/Public/admin/js/dtree.js"></script>
			<script  type="text/javascript"> 
			  function hello()
			  {
			    d = new dTree('d','/Public/admin/');
			
			    d.add(0,-1,'后台管理','');
			    d.add(1,0,'重新登陆','javascript:logout()');
			
			    d.add(2,0,'游戏新闻管理','');
			    d.add(21,2,'添加新闻','/admin.php/Addnews/index.html');
			    d.add(22,2,'修改新闻','/admin.php/Modnews/index.html');
			
			    d.add(3,0,'游戏分类管理','');
			    d.add(31,3,'添加游戏分类','/admin.php/Addgamestype/index.html');
			    d.add(32,3,'修改游戏分类','/admin.php/Modgamestype/index.html');
			    
			    d.add(4,0,'游戏信息管理','');
			    d.add(41,4,'添加游戏信息','/admin.php/Addgamesinfo/index.html');
			    d.add(42,4,'修改游戏信息','/admin.php/Modgamesinfo/index.html');
			    
			    d.add(5,0,'个别游戏管理','');
			    d.add(51,5,'LOL游戏信息','');
			    d.add(511,51,'添加游戏新闻图片','/admin.php/Addlolnewsimg/index.html');
			    d.add(512,51,'修改游戏新闻图片','/admin.php/Modlolnewsimg/index.html');
			    d.add(513,51,'添加免费英雄信息','/admin.php/Addfreehero/index.html');
			    d.add(514,51,'修改免费英雄信息','/admin.php/Modfreehero/index.html');
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
					  window.location="/admin.php/Login/logout";
				  }
			  }
			</script>
		</div>
		<!-- 右侧页面内容 -->
		<div id='rightDiv'>
			<form action='' name='frm' method='post' enctype='mulitpart/form-data'>
				<table border=1 cellspacing=0 cellpadding=0>
					<tr>
						<th>编号</th>
						<th>新闻图片</th>
						<th>上传时间</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($newsimg)): foreach($newsimg as $key=>$v): ?><tr>
						<td id='t0<?php echo ($v["id"]); ?>'><?php echo ($v["id"]); ?></td>
						<td id='t1<?php echo ($v["id"]); ?>'><img class='newsimgwidth' src="/Public/admin/images/LOL_newsimg/<?php echo ($v["newsimg"]); ?>"/></td>
						<td id='t2<?php echo ($v["id"]); ?>'><?php echo ($v["dateandtime"]); ?></td>
						<td id='t3<?php echo ($v["id"]); ?>'><a href="#" onclick='showText(<?php echo ($v["id"]); ?>)'>修改</a>&nbsp;|&nbsp;<a href="#" onclick="del(<?php echo ($v["id"]); ?>)">删除</a></td>
					</tr><?php endforeach; endif; ?>
					<tr>
						<td colspan='4'><?php echo ($pageList); ?></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
</body>
</html>