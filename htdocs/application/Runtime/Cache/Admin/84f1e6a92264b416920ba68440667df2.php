<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/games10/Public/admin/css/admin.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/games10/Public/admin/css/global.css" media="all"/>
<script type="text/javascript" src="/games10/Public/admin/js/jquery-1.4.js"></script>
<script type="text/javascript" src="/games10/Public/admin/js/kindeditor/kindeditor.js"></script>
<script type="text/javascript">
      var editor;
      KindEditor.ready(function(e){
          editor = e.create("[name=content]",{
              width:"800px",
              height:"400px"
          });
      });
</script>
<style>
table tr{
	height:40px;
}
.inputwidth input{
	width: 600px;
	height: 25px;
    line-height: 25px;
    text-indent: 15px;
    font-size: 16px;
    font-family: "微软雅黑 ";
}
.selwidth select{
	width:90px;
	height:25px;
}
</style>
<title>Insert title here</title>
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
		<p>后台管理 : 添加新闻</p>
	</div>
</div>
<!-- 正文内容 -->
<div id='main-content'>
	<div id='main-content1'>
		<!-- 左侧树状列表 -->
		<div id='leftDiv'><script type="text/javascript" src="/games10/Public/admin/js/dtree.js"></script>
			<script  type="text/javascript"> 
			  function hello()
			  {
			    d = new dTree('d','/games10/Public/admin/');
			
			    d.add(0,-1,'后台管理','');
			    d.add(1,0,'重新登陆','javascript:logout()');
			
			    d.add(2,0,'游戏新闻管理','');
			    d.add(21,2,'添加新闻','/games10/admin.php/Addnews/index.html');
			    d.add(22,2,'修改新闻','/games10/admin.php/Modnews/index.html');
			
			    d.add(3,0,'游戏分类管理','');
			    d.add(31,3,'添加游戏分类','/games10/admin.php/Addgamestype/index.html');
			    d.add(32,3,'修改游戏分类','/games10/admin.php/Modgamestype/index.html');
			    
			    d.add(4,0,'游戏信息管理','');
			    d.add(41,4,'添加游戏信息','/games10/admin.php/Addgamesinfo/index.html');
			    d.add(42,4,'修改游戏信息','/games10/admin.php/Modgamesinfo/index.html');
			    
			    d.add(5,0,'个别游戏管理','');
			    d.add(51,5,'LOL游戏信息','');
			    d.add(511,51,'添加游戏新闻图片','/games10/admin.php/Addlolnewsimg/index.html');
			    d.add(512,51,'修改游戏新闻图片','/games10/admin.php/Modlolnewsimg/index.html');
			    d.add(513,51,'添加免费英雄信息','/games10/admin.php/Addfreehero/index.html');
			    d.add(514,51,'修改免费英雄信息','/games10/admin.php/Modfreehero/index.html');
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
					  window.location="/games10/admin.php/Login/logout";
				  }
			  }
			</script>
		</div>
		<!-- 右侧页面内容 -->
		<div id='rightDiv'>
			<form action='/games10/admin.php/Addnews/addnews' method='post' enctype="multipart/form-data">
				<table border='1' cellpadding="0" cellspacing="0" style='width:800px;margin:0 auto;'>
					<tr>
						<td style='width:100px;height:30px;'>新闻标题:</td>
						<td class='inputwidth'>
							<input type='text' name='title' size="80"/>
						</td>
					</tr>
					<tr>
						<td>新闻类型:</td>
						<td class='selwidth'>
							<select name='nid'>
								<?php if(is_array($newstype)): foreach($newstype as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["gamestypename"]); ?></option><?php endforeach; endif; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>新闻作者:</td>
						<td class='inputwidth'>
							<input type='text' name='author' size="80"/>
						</td>
					</tr>
					<tr>
						<td>新闻来源:</td>
						<td class='inputwidth'>
							<input type='text' name='source' size="80"/>
						</td>
					</tr>
					<tr>
						<td>新闻概述:</td>
						<td class='inputwidth'>
							<input type='text' name='overview' size="80"/>
						</td>
					</tr>
					<tr>
						<td>新闻图片:</td>
						<td>
							<input type="file" name="newsimg[]" size="80" multiple="multiple"/>
						</td>
					</tr>
					<tr>
						<td colspan='2' style="font:18px 微软雅黑;">新闻内容:</td>
					</tr>
					<tr>
						<td colspan='2'>
							<textarea name="content"></textarea>
						</td>
					</tr>
					<tr>
			            <td colspan='2'>
			              <input type="submit" value="添加" class="btn2"/>
			              &nbsp;&nbsp;&nbsp;
			              <input type="reset" value="取消" class="btn2"/>
			            </td>
         			 </tr>
				</table>
			</form>
		</div>
	</div>
</div>
</body>
</html>