<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert title here</title>
</head>
<body>
	<form action="/admin.php/Login/check.html" method="post">
		<table style='text-align:center'>
			<tr>
				<th colspan='2'>后台登录界面</th>
			</tr>
			<tr>
				<td>用户名:</td>
				<td>
					<input type='text' placeholder='请输入用户名' name='username'/>
				</td>
			</tr>
			<tr>
				<td>密　码:</td>
				<td>
					<input type='password' placeholder='请输入密码' name='pwd'/>
				</td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' value='登录'/>
					<input type='reset' value='重写'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>