<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Fullscreen Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link rel="stylesheet" href="/Public/home/css/login/reset.css">
        <link rel="stylesheet" href="/Public/home/css/login/supersized.css">
        <link rel="stylesheet" href="/Public/home/css/login/style.css">
    </head>

    <body oncontextmenu="return false">

        <div class="page-container">
            <h1>用户登录</h1>
            <form action="/home.php/Login/check" method="post" id="frm" >
				<div>
					<input type="text" name="username" class="username" placeholder="请输入用户名" autocomplete="off"/>
				</div>
                <div>
					<input type="password" name="password" class="password" placeholder="请输入密码" oncontextmenu="return false" onpaste="return false" />
                </div>
              <input class='sub1' id="submit" type="submit" value="登　录"/>
            </form>
        </div>
		<div class="alert" style="display:none">
			<h2>消息</h2>
			<div class="alert_con">
				<p id="ts"></p>
				<p style="line-height:70px"><a class="btn">确定</a></p>
			</div>
		</div>

        <!-- Javascript -->
		<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
        <script src="/Public/home/js/login/supersized.3.2.7.min.js"></script>
		<script>
		$(".btn").click(function(){
			is_hide();
		})
		var u = $("input[name=username]");
		var p = $("input[name=password]");
		$("#submit").live('click',function(){
			if(u.val() == '' || p.val() =='')
			{
				$("#ts").html("用户名或密码不能为空~");
				is_show();
				return false;
			}
			
			$("#frm").submit();
		});
		window.onload = function()
		{
			$(".connect p").eq(0).animate({"left":"0%"}, 600);
			$(".connect p").eq(1).animate({"left":"0%"}, 400);
		}
		function is_hide(){ $(".alert").animate({"top":"-40%"}, 300) }
		function is_show(){ $(".alert").show().animate({"top":"45%"}, 300) }
		
		jQuery(function($){

		$.supersized({

		        // Functionality
		        slide_interval     : 6000,    // Length between transitions
		        transition         : 1,    // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		        transition_speed   : 3000,    // Speed of transition
		        performance        : 1,    // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)

		        // Size & Position
		        min_width          : 0,    // Min width allowed (in pixels)
		        min_height         : 0,    // Min height allowed (in pixels)
		        vertical_center    : 1,    // Vertically center background
		        horizontal_center  : 1,    // Horizontally center background
		        fit_always         : 0,    // Image will never exceed browser width or height (Ignores min. dimensions)
		        fit_portrait       : 1,    // Portrait images will not exceed browser height
		        fit_landscape      : 0,    // Landscape images will not exceed browser width

		        // Components
		        slide_links        : 'blank',    // Individual links for each slide (Options: false, 'num', 'name', 'blank')
		        slides             : [    // Slideshow Images
		                                 {image : "/Public/home/images/login/201508191038516097074.jpg"},
		                                 {image : "/Public/home/images/login/1347_db34c5ffe37263f.jpg"},
		                                 {image : "/Public/home/images/login/20130613125833_NFnTc.thumb.700_0.jpeg"}
		                             ]

		    });

		});
		
		</script>
    </body>

</html>