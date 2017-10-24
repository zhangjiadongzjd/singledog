<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" href="/Public/admin/css/admin.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/admin/css/global.css" media="all"/>
<script src="/Public/admin/js/jquery-1.8.0.js"></script>
<script>
	$(function(){
		$('#type1').change(function(){
			//alert('aaa');
			var typeId=$('#type1 option:selected').val();
			//alert(typeId);
			$.post('/admin.php/Modgamesinfo/getnames',{'typeId':typeId},function(data){
			$('#gamesname').html(data);
			})
		})
		$('#gamesname').change(function(){
			//alert('aaa');
			$('#gamelist').nextUntil('#buttonw').remove();
			var gameId=$('#gamesname option:selected').val();
			//alert(typeId);
			$.post('/admin.php/Modgamesinfo/getdetails',{'gameId':gameId},function(data){
			$('#gamelist').after(data);
			})
		})			
	})
	var oldgameId;
	var oldgamesname;
	var oldyname;
	var oldoname;
	var oldpublisher;
	var oldgametype;
	var oldplatform;
	var olddevelopers;
	var oldissuedate;
	var oldgamescreen;
	var oldplayernum;
	var oldgamehot;
	var oldbigdesktop;
	var oldsmalldesktop;
	var oldLink;
	function showText(){
			oldgameId=$('#gamesname option:selected').val();
			oldgamesname=$('.gamesnameinput').html();
			oldyname=$('.ynameinput').html();
			oldoname=$('.onameinput').html();
			oldpublisher=$('.publisherinput').html();
			oldgametype=$('.gametypeinput').html();
			oldplatform=$('.platforminput').html();
			olddevelopers=$('.developersinput').html();
			oldissuedate=$('.issuedateinput').html();
			oldgamescreen=$('.gamescreeninput').html();
			oldplayernum=$('.playernuminput').html();
			oldgamehot=$('.gamehotinput').html();
			oldbigdesktop=$('.bigdesktopinput').html();
			oldsmalldesktop=$('.smalldesktopinput').html();
			oldLink=$('#buttonw td').html();
			
			$('.inw td:odd').css({"background-color":"#AECAE8"})
			$('.gamesnameinput').html("<input name='gamesname' value='"+oldgamesname+"'/>")
			$('.ynameinput').html("<input name='yname' value='"+oldyname+"'/>")
			$('.onameinput').html("<input name='oname' value='"+oldoname+"'/>")
			$('.publisherinput').html("<input name='publisher' value='"+oldpublisher+"'/>")
			$('.gametypeinput').html("<input name='gametype' value='"+oldgametype+"'/>")
			$('.platforminput').html("<input name='platform' value='"+oldplatform+"'/>")
			$('.developersinput').html("<input name='developers' value='"+olddevelopers+"'/>")
			$('.issuedateinput').html("<input name='issuedate' value='"+oldissuedate+"'/>")
			$('.gamescreeninput').html("<input name='gamescreen' value='"+oldgamescreen+"'/>")
			$('.playernuminput').html("<input name='playernum' value='"+oldplayernum+"'/>")
			$('.gamehotinput').html("<input name='gamehot' value='"+oldgamehot+"'/>")
			$('.bigdesktopinput').html("<input type='file' name='bigdesktop' style='width:300px;height:30px;font-size:20px;'/>")
			$('.smalldesktopinput').html("<input type='file' name='smalldesktop'/>")
			$('#buttonw td').html("<input type='button' value='确认修改' style='width:60px' onclick='submitForm()'/>&nbsp;&nbsp;<input type='button' value='取消' onclick='hideText()'/>")
			//$('#gamelist').nextAll().remove();
			//var gameId=$('#gamesname option:selected').val();
			//alert(typeId);
			//$.post('/admin.php/Modgamesinfo/moddetails',{'gameId':gameId},function(data){
			//$('#gamelist').after(data);
		}	
	function hideText(){
		$('.inw td:odd').css({"background-color":"white"});
		$('.gamesnameinput').html(oldgamesname);
		$('.ynameinput').html(oldyname);
		$('.onameinput').html(oldoname);
		$('.publisherinput').html(oldpublisher);
		$('.gametypeinput').html(oldgametype);
		$('.platforminput').html(oldplatform);
		$('.developersinput').html(olddevelopers);
		$('.issuedateinput').html(oldissuedate);
		$('.gamescreeninput').html(oldgamescreen);
		$('.playernuminput').html(oldplayernum);
		$('.gamehotinput').html(oldgamehot);
		$('.bigdesktopinput').html(oldbigdesktop);
		$('.smalldesktopinput').html(oldsmalldesktop);
		//$('#td2'+oldTypeId).html(oldArticleNums)
		$('#buttonw td').html(oldLink)
		}
	function submitForm(){
		document.frm.action="/admin.php/Modgamesinfo/modgamesinfo/gameid/"+oldgameId;
		document.frm.submit();
		}
	function del(){
		if(confirm('是否确认删除该游戏信息')){
			var delId=$('#gamesname').val();
			window.location="/admin.php/Modgamesinfo/delgamesinfo/delId/"+delId;
		}
	}
	
</script>
<style>
table{
	width:700px;
	margin:0 auto;
}
table tr{
	height:40px;
	font-size: 16px;
    font-family: "微软雅黑 ";
}

.wid{
	font-weight:700;
	width:102px;
}
.inw input{
	width: 150px;
	height: 25px;
    line-height: 25px;
    text-indent: 15px;
    font-size: 16px;
    font-family: "微软雅黑 ";
}
.textwidth{
	width:170px;
}
#buttonw input{
	width:50px;
	height:22px;
	cursor:pointer;
}
select{
	width:100px;
	height:28px;
	color:#2A00E1;
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
		<p>后台管理 : 修改游戏信息</p>
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
			<div style='width:700px;height:300px;margin:0 auto;margin-top:50px;'>
				<form action="" method='post' name='frm' onsubmit='return check()' enctype="multipart/form-data">
					<table border='1' cellspacing='0' cellpadding='0'>
						<tr>
							<td class='wid'>游戏分类:</td>
							<td colspan='3' style='text-align:left;padding-left:20px;'>
								<select name='tid' id='type1'>
									<option value='0'>请选择分类</option>
									<?php if(is_array($newstype)): foreach($newstype as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["gamestypename"]); ?></option><?php endforeach; endif; ?>
								</select>
							</td>				
						</tr> 
						<tr id='gamelist'>
							<td class='wid'>游戏名称:</td>
							<td colspan='3' style='text-align:left;padding-left:20px;'>
								<select name='id' id='gamesname'>
									<option value='0'>请选择游戏</option>
								</select>
							</td>				
						</tr>
						
						<tr id='buttonw'>
							<td colspan='4'>
								<input type='button' value='修改' onclick="showText()"/>
								&nbsp;&nbsp;
								<input type='button' value='删除' onclick="del()"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>