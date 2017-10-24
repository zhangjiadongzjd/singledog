<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GD资讯</title>
<link rel="shortcut icon" href="/Public/home/images/Logo/logo.png.ico"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/global.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/home.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/images_turn.css" media="all"/>
<link type="text/css" rel="stylesheet" href="/Public/home/css/image_font.css" media="all"/>
<link href="/Public/home/css/jquery.slideBox.css" rel="stylesheet" type="text/css" />
<script src="/Public/home/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/Public/home/js/jquery-1.8.0.js"></script>
<script src="/Public/home/js/jquery-1.11.1.min.js"></script>
<script src="/Public/home/js/unslider.min.js"></script>
<script src="/Public/home/js/jquery.slideBox.js" type="text/javascript"></script>
<script type='text/javascript' src="/Public/home/js/jfade.js"></script>
<script src="/Public/home/js/sHover.min.js"></script>
<script type="text/javascript">
window.onload=function(){
	 var a=new sHover("sHoverItem","sIntro");
	 a.set({
	 	slideSpeed:5,
	 	opacityChange:true,
	 	opacity:80
	 });	 	
}
$().ready(function() {
	$('.jfade_image').jfade();
});  
</script> 
<script>
	/* $(function(){
		$('#navi div').hover(function(){
			$(this).css('box-shadow','0 4px 20px 2px #ddd')
		},function(){
			$(this).css('box-shadow','0 2px 10px 1px #ddd')
		})
	}) */
	/* var flag=1;
	$(function(){
		$('dl').mouseover(function(){
			$('#header').css('background-image',"url(/Public/home/images/1347black.jpg)")		
		})
		$('dl').mouseout(function(){
			$('#header').css('background-image',"url(/Public/home/images/1347_db34c5ffe37263f.jpg)")		
		}) */
		//选择DNF
		 /* $('#dnf').mouseover(function(){
			if(flag){
			$('#dnf').append('  -----------')	
			$('#gameimg0').css('display','block')
			$('#gameimg1').css('display','none')
			flag=1;
			}else if(flag=1){
				$('#gameimg0').css('display','none')
				$('#gameimg1').css('display','block')
				flag=1;
			}
			//alert('aaa')  
		}) */
				
		/* $('#dnf').mouseout(function(){
			$('#dnf').html('　　　　　DNF')	
			$('#img').css('visibility','hidden')
		})  */
	/* }) */
		
		 function change(a){
			for(var i=1;i<=<?php echo ($gamesdetails_num); ?>;i++){
				if(i==<?php echo ($lolId["id"]); ?> || i==<?php echo ($dnfId["id"]); ?> || i==<?php echo ($yysId["id"]); ?>){
				if(i==a){
					document.getElementById('gameimg'+i).style.display='block'			
					/* $('#dnfimg0').css('display','block');
					$('#dnfimg1').css('display','none'); */
				}else{
					/* $('#dnfimg0').css('display','none');
					$('#dnfimg1').css('display','block'); */
					document.getElementById('gameimg'+i).style.display='none'
				}
				}
			}
		}
	
</script>
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
<!-- 网站头 -->
<div id='header_video'>
	<video class="top-big-video" autoplay loop>
            <!-- <source src="http://ossweb-img.qq.com//Public/home/images/lol/v1/banner/big-v11.webm" type="video/webm"/> -->
            <source src="/Public/home/images/LOL_video/big-v11.mp4" type="video/mp4"/>
    </video>
	<div style="width:1347px;margin:0 auto">
		<div id='header'>
			<div id='navi'>
				<ul>
					<li><div><a><span>首页</span><span>首页</span></a></div></li>	
					<li><div><a href="/home.php/Gamesdetails/index/typeId/<?php echo ($online["id"]); ?>"><span>网络游戏</span><span>游戏详情</span></a></div></li>			
					<li><div><a href="/home.php/Gamesdetails/index/typeId/<?php echo ($alone["id"]); ?>"><span>单机游戏</span><span>游戏详情</span></a></div></li>
					<li><div><a href="/home.php/Gamesdetails/index/typeId/<?php echo ($mobile["id"]); ?>"><span>手机游戏</span><span>游戏详情</span></a></div></li>
					<li><div><a><span>新闻中心</span><span>新闻详情</span></a></div></li>
					<li><div><a><span>更多</span><span>更多</span></a></div></li>
				</ul>
			</div>
			<!-- 左边 -->
			<div id='all-games'>
				<div id='oline-game'>
					<dl>
						<dt>热门网络游戏</dt>
						<br/><br/>
						<?php if(is_array($olinegame)): foreach($olinegame as $key=>$v): ?><dd onclick='change(<?php echo ($v["id"]); ?>)'>　<a><?php echo ($v["gamesname"]); ?></a></dd><br/>
						<!-- <dd>　　　　穿越火线</dd><br/>
						<dd>　　　　龙之谷</dd><br/>
						<dd onmouseover='change(1)'>　　　　DNF</dd><br/>
						<dd>　　　　魔兽世界</dd><br/> --><?php endforeach; endif; ?>
						<dd>　更多</dd>
					</dl>
				</div>
				<div id='Stand-alone-game'>
					<dl>
						<dt>最新单机游戏</dt>
						<br/><br/>
						<?php if(is_array($alonegame)): foreach($alonegame as $key=>$v): ?><dd onclick='change(<?php echo ($v["id"]); ?>)'>　<a><?php echo ($v["gamesname"]); ?></a></dd><br/><?php endforeach; endif; ?>
						<dd>　更多</dd>						
					</dl>
				</div>		
			</div>
			<!-- 左边 -->
			<!-- 中间 -->
			             
			<div id='img'>
						<!-- DNF开始 -->
				<div id='gameimg<?php echo ($dnfId["id"]); ?>' style="display:none">
				<div id='img-top'>
					<div id='allimage' style="border-top-left-radius:20px">
						<!-- DNF图片轮播开始 -->
						<div class="banner" id="b04" style="border-top-left-radius:20px">
						    <ul>
						        <li><img src="/Public/home/images/0aff654440964fb5c29344a8ef47eeec.jpg" alt="" width="450" height="270"/></li>
						        <li><img src="/Public/home/images/02e747bad95cdc49516c337594216cf9.jpg" alt="" width="450" height="270"/></li>
						        <li><img src="/Public/home/images/06a11d3500662180d02597c4f29c1652.jpg" alt="" width="450" height="270"/></li>
						    </ul>
						    <a href="javascript:void(0);" class="unslider-arrow04 prev"><img class="arrow" id="al" src="/Public/home/images/arrowl.png" alt="prev" width="20" height="35"></a>
						    <a href="javascript:void(0);" class="unslider-arrow04 next"><img class="arrow" id="ar" src="/Public/home/images/arrowr.png" alt="next" width="20" height="37"></a>
						</div>
						<script>
							$(document).ready(function(e) {
							
							    var unslider04 = $('#b04').unslider({
							
									dots: true
							
								}),
							
								data04 = unslider04.data('unslider');
							
								$('.unslider-arrow04').click(function() {
							
							        var fn = this.className.split(' ')[1];
							
							        data04[fn]();
							    });
							
							});
						</script>
						<!-- DNF图片轮播结束 -->
					</div>
					<div id='news' class='clear'>
						
							<ul id='t11'>
								<li class='t1' onmouseover="changes(0)">新闻</li>
								<li onmouseover="changes(1)">公告</li>
								<li onmouseover="changes(2)">赛事</li>
								<li onmouseover="changes(3)">社区</li>	
								<li><div><a>更多</a></div></li>							
							</ul>
							<!-- DNF标题内容开始 -->
							<div id='news-c'>
								<!-- DNF新闻标题内容开始 -->
								<div class='news-c1'>
									<ul class='news-hot'>
										<li class='news-hot1'>[新闻] 史诗装备全面增强 公会红包火爆登场</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li> 
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li> 
									</ul>
								</div>
								<!-- DNF新闻标题内容结束-->
								
								<!-- DNF公告内容开始-->
								<div>
									<ul class='news-hot'>
										<li class='news-hot1'>[新闻] 史诗装备全面增强 公会红包火爆登场</li>
										<li>
											<a>[活动] aaa：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li> 
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li> 
									</ul>
								</div>
								<!-- DNF公告内容结束-->	
								<!-- DNF赛事内容开始-->	
								<div>
									<ul class='news-hot'>
										<li class='news-hot1'>[新闻] 史诗装备全面增强 公会红包火爆登场</li>
										<li>
											<a>[活动] bbb：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li> 
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li> 
									</ul>
								</div>
								<!-- DNF赛事内容结束-->	
								<!-- DNF社区内容开始-->
								<div>
									<ul class='news-hot'>
										<li class='news-hot1'>[新闻] 史诗装备全面增强 公会红包火爆登场</li>
										<li>
											<a>[活动] ccc：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li>
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li> 
										<li>
											<a>[活动] 时光之约：我与NPC有个约会~</a>
											<span>11/21</span>
										</li> 
									</ul>
								</div>
								<!-- DNF社区内容结束-->
							</div>
				<script>
				//获取h3对象
				var liobj = document.getElementById('t11').getElementsByTagName("li");
				//获取div对象
				var dobj = document.getElementById("news-c").getElementsByTagName("div");
				//alert(liobj.length)
				 function changes(id){
					//id 鼠标当前划过的li的下标
					for(var i=0;i<liobj.length-1;i++){
						//对比每一个新闻标题的下标和鼠标划过的li的下标
						if(i==id){
							liobj[i].className="t1"; 
							dobj[i].className="news-c1";
						}else{
							liobj[i].className="";
							dobj[i].className="hiddenall";
						}
					}
				}
				</script>
												
					</div>
				</div>
				<!-- 攻略栏 -->
				<div id='img-middle'>
					<div id='tag1'></div>
					<div id='tag2'></div>
				</div>
				<!-- 攻略栏 -->
				<!-- 中间左边开始 -->
				<div id='img-bottom-left'>
					<ul>
						<li><a>DNF肩白改版 教你斩铁兵升级里鬼战士</a></li>
						<li><a>还有用的吗 DNF游戏中最坑爹五种人偶排行</a></li>
						<li><a>辅助花花137光兵百分比怎么堆 合格光兵打造</a></li>
						<li><a>还有用的吗 DNF游戏中最坑爹五种人偶排行</a></li>
						<li><a>DNF肩白改版 教你斩铁兵升级里鬼战士</a></li>
						<li><a>DNF肩白改版 教你斩铁兵升级里鬼战士</a></li>			
					</ul>
				</div>
				<!-- 中间左边结束 -->
				</div>	
							<!-- DNF结束 -->
							
							
							
							
							<!-- 英雄联盟开始 -->
				<div id='gameimg<?php echo ($lolId["id"]); ?>'>
							<!-- 英雄联盟图片轮播开始 -->
					<div id='allimagelol'>
						<div class="banner" id="b03" style="border-top-left-radius:20px;border-top-right-radius:20px">
						    <ul>
						    	<?php if(is_array($LOL_newsimg)): foreach($LOL_newsimg as $key=>$v): ?><li><img src="/Public/admin/images/LOL_newsimg/<?php echo ($v["newsimg"]); ?>" alt="" width="860" height="364"/></li>
						        <!-- <li><img src="/Public/home/images/860LOL2.jpg" alt="" width="860" height="364"/></li> --><?php endforeach; endif; ?>
						    </ul>
						</div>
						<script>
							$(document).ready(function(e) {
							
							    var unslider03 = $('#b03').unslider({
							
									dots: true
							
								}),
							
								data03 = unslider03.data('unslider');
							
							
							});
						</script>
						<div id='free-hreo'>
							<div id='free-hreo-title'>
								<img src="/Public/home/images/1480238875_398413.png"/>
							</div>
							<div id='free-hreo-img'>
								<div class="container">
								<?php if(is_array($LOL_freehero)): foreach($LOL_freehero as $key=>$v): ?><div class="sHoverItem">
										<img src="/Public/admin/images/LOL_freehero/<?php echo ($v["freeheroimg"]); ?>"/>
										<span id="intro1" class="sIntro">
											<h2><?php echo ($v["heroname"]); ?></h2>	
										</span>
									</div><?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>						
							<!-- 英雄联盟图片轮播结束 -->
				</div>				
							<!-- 英雄联盟结束 -->
							
							<!-- 阴阳师开始-->
				<div id='gameimg<?php echo ($yysId["id"]); ?>' style="display:none">
					<div id='allimageyys'>
						<div id='middle-title'>
							<div id='yys_div'>
								<div id='yys_zhujue_tab'>
									<div class='tab_button' id='tab_button0'>
										<div class='zhujue_name' onclick='changename(0)' style='border:2px solid #000;background-color:#fff;'>
											<span>晴明</span>
											<em style='opacity:1'></em>
										</div>
										<div class='zhujue_name' onclick='changename(1)' style='border:2px solid #fff;'>
											<span>神乐</span>
											<em></em>
										</div>
										<div class='zhujue_name' onclick='changename(2)' style='border:2px solid #fff;'>
											<span>源博雅</span>
											<em></em>
										</div>
										<div class='zhujue_name' onclick='changename(3)' style='border:2px solid #fff;'>
											<span>八百比丘尼</span>
											<em></em>
										</div>
									</div>
									<div id='yys_images'>
									</div>							
								</div>
								<div class='Character-introduction' class='clear' id='character0'>
									<img class='Character-introduction-name' src="/Public/home/images/yys/qingming.png"/>
									<img class='Character-introduction-content' src="/Public/home/images/yys/qingming_content1.png" />
									<!-- <p>
										京都城中极具盛名的天才阴阳师<br/>
										却不知为何失去了自己的记忆<br/>
										等待着他的是寻回记忆的喜悦<br/>
										还是不堪回首的残忍真相
									</p> -->
								</div>
								<div class='Character-introduction' class='clear' style="display:none;" id='character1'>
									<img class='Character-introduction-name' src="/Public/home/images/yys/shenle.png"/>
									<img class='Character-introduction-content' src="/Public/home/images/yys/shenle_content1.png" />
								</div>
								<div class='Character-introduction' class='clear' style="display:none;" id='character2'>
									<img class='Character-introduction-name' src="/Public/home/images/yys/yuanboya.png"/>
									<img class='Character-introduction-content' src="/Public/home/images/yys/yuanyabo_content1.png" />
								</div>
								<div class='Character-introduction' class='clear' style="display:none;" id='character3'>
									<img class='Character-introduction-name' src="/Public/home/images/yys/babaibiqiuni.png"/>
									<img class='Character-introduction-content' src="/Public/home/images/yys/babaibiqiuni_content.png" />
								</div>
								<script>
											var tabobj=document.getElementById('tab_button0').getElementsByTagName('div');
											var emobj=document.getElementById('tab_button0').getElementsByTagName('em');
											var bgcolor=$('#img').css('backgroundColor');
											function changename(id){
												for(var c=0;c<tabobj.length;c++){		
												 	if(c==id){
												 		tabobj[c].style.border='2px solid #000'						 		
												 		tabobj[c].style.backgroundColor='#fff'
												 		emobj[c].style.opacity='1'
												 		$('#character'+c).fadeIn(200)
												 	}else{
												 		tabobj[c].style.border='2px solid #fff'
													 	tabobj[c].style.backgroundColor=''
													 	emobj[c].style.opacity='0' 	
													 	$('#character'+c).fadeOut(100)
												 	}
												 	if(id==1){
												 		$('#yys_images').css('background','url(/Public/home/images/yys/zhujue_shenle_585e7f3.png) no-repeat')
												 	}else if(id==2){
												 		$('#yys_images').css('background','url(/Public/home/images/yys/zhujue_yby_820fcd9.png) no-repeat')
												 	}else if(id==3){
												 		$('#yys_images').css('background','url(/Public/home/images/yys/zhujue_bqn_a6c9b81.png) no-repeat')
												 	}else{
												 		$('#yys_images').css('background','url(/Public/home/images/yys/zhujue_qingming_aee7c92.png) no-repeat')
												 	}
												}
											}	
											
											/* alert(bgcolor) */
													
												
													$('#tab_button0 div').hover(function(){
														
														if($(this).find('em').css('opacity')!=1){
															
															$(this).css('border','2px solid #000')
															$(this).find('em').css('opacity',1)
														}	
														
													},function(){
														if($(this).css('backgroundColor')!=bgcolor){
															
															$(this).css('border','2px solid #fff')
															$(this).find('em').css('opacity',0)
														}
														
													}) 
												
										
										</script>	
							</div>
						</div>
					</div>	
				</div>						
							<!-- 阴阳师结束-->
			</div>
			              
		
			<!-- 中间 -->
			<!-- 右边-->
			<div id='all-games1'>
				<div id='Popular-hand-tour'>
					<dl>
						<dt>热门手游</dt>
						<br/><br/>
						<?php if(is_array($mobilegame)): foreach($mobilegame as $key=>$v): ?><dd onclick='change(<?php echo ($v["id"]); ?>)'>　<a><?php echo ($v["gamesname"]); ?></a></dd><br/><?php endforeach; endif; ?>
						<dd>　更多</dd>
					</dl>
				</div>
				<div id='Online-games-recommended'>
					<dl>
						<dt>页游推荐</dt>
						<br/><br/>
						<?php if(is_array($webgames)): foreach($webgames as $key=>$v): ?><dd onclick='change(<?php echo ($v["id"]); ?>)'>　<a><?php echo ($v["gamesname"]); ?></a></dd><br/><?php endforeach; endif; ?>
						<dd>　更多</dd>
					</dl>
				</div>
			</div>	
			<!-- 右边-->
		</div>
	</div>
</div>
<!-- 网站头结束 -->

<!-- 中间内容 -->
<div id='web-middle'>
	<div id='web-middle1'>
		<div id='web-middle-title-hotgames'>
			<div class='hotgames'>
				<strong>热门</strong>
				<?php if(is_array($hotonline)): foreach($hotonline as $key=>$v): if($v["gamehot"] > 9.7): ?><a class='red'><?php echo ($v["gamesname"]); ?></a>
					<?php else: ?>
					|<a><?php echo ($v["gamesname"]); ?></a><?php endif; endforeach; endif; ?>
			</div>
			<div class='hotgames'>
				<strong>手游</strong>
				<?php if(is_array($hotmobile)): foreach($hotmobile as $k=>$v): if($v["gamehot"] > 9.7): if($k != 0): ?>|<a class='red'><?php echo ($v["gamesname"]); ?></a>
							<?php else: ?>
							<a class='red'><?php echo ($v["gamesname"]); ?></a><?php endif; ?>
					<?php else: ?>
						|<a><?php echo ($v["gamesname"]); ?></a><?php endif; endforeach; endif; ?>
			</div>
			<div class='hotgames'>
				<strong>单机</strong>
				<?php if(is_array($hotalonegame)): foreach($hotalonegame as $k=>$v): if($v["gamehot"] > 9.7): if($k != 0): ?>|<a class='red'><?php echo ($v["gamesname"]); ?></a>
							<?php else: ?>
							<a class='red'><?php echo ($v["gamesname"]); ?></a><?php endif; ?>
					<?php else: ?>
						|<a><?php echo ($v["gamesname"]); ?></a><?php endif; endforeach; endif; ?> 
			</div>
			<div class='hotgames'>
				<strong>页游</strong>
				<?php if(is_array($hotwebgame)): foreach($hotwebgame as $k=>$v): if($v["gamehot"] > 9.7): if($k != 0): ?>|<a class='red'><?php echo ($v["gamesname"]); ?></a>
							<?php else: ?>
							<a class='red'><?php echo ($v["gamesname"]); ?></a><?php endif; ?>
					<?php else: ?>
						|<a><?php echo ($v["gamesname"]); ?></a><?php endif; endforeach; endif; ?>
			</div>
		</div>
		<div id='middle-hotnews-main-content'>
			<div id='today-hotnews'>
				<div class='today-hotnews-title'>
					<h2>今日热闻</h2>
				</div>
				<div class='today-hotnews-newstitle'>
					<ul>
					<?php if(is_array($todayhotnews)): foreach($todayhotnews as $key=>$v): ?><li>
							<h3><a href="/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></h3>
							<p><?php echo ($v["overview"]); ?></p>
						</li><?php endforeach; endif; ?>	
					</ul>
				</div>
			</div>
			<div id='today-hotnews-picture'>
				<div id="news_turn" class="slideBox">
				  <ul class="items">				
				    <li><a href="" title="这里是测试标题一"><img src="/Public/home/images/hotnews/139080875.jpg"/></a></li>				
				    <li><a href="" title="抓住孙亚龙！六大主播陪你逛盛典!"><img src="/Public/home/images/hotnews/140457060.jpg"/></a></li>				
				    <li><a href="" title="这里是测试标题三"><img src="/Public/home/images/hotnews/140457209.jpg"/></a></li>				
				    <li><a href="" title="这里是测试标题四"><img src="/Public/home/images/hotnews/ninja147971815769308.jpg"/></a></li>				
				    <li><a href="" title="微软今日正式引进Xbox One S国行版"><img src="/Public/home/images/hotnews/140449267.png"/></a></li>			
				  </ul>			
				</div>
				<script>
						jQuery(function($){						
							$('#news_turn').slideBox({						
								duration : 0.5,//滚动持续时间，单位：秒						
								easing : 'linear',//swing,linear//滚动特效						
								delay : 5,//滚动延迟时间，单位：秒						
								hideClickBar : false,//不自动隐藏点选按键
								clickBarRadius : 10						
							});						
						});					
				</script>
			</div>
		</div>
	
		<!-- 手机游戏 -->
		<div id='middle-newscontent-left'>
		<div class='middle-mobilegame-main-content'>
			<div class='middle-mobilegame-left'>
				<div class='mg_hd'>
					<h2>手机游戏</h2>
					<div>
						<a>更多</a>
					</div>
				</div>
				<div class='mg_content'>
					<div class='mg_newstitle'>
						<ul>
						
						<?php if(is_array($mobile_noimg)): foreach($mobile_noimg as $key=>$v): ?><li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'><?php echo ($v["time"]); ?></span>
								</span>
								<span class='mg-news-title'><a class='bold' href="/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></span>
							</li><?php endforeach; endif; ?>
							
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
						</ul>
					</div>
					<?php if(is_array($mobilenews)): foreach($mobilenews as $key=>$v): ?><a href='/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>'>
						<div class='mg-image'>
							<img src="/Public/admin/images/newsimg/<?php echo ($v["id"]); ?>/<?php echo ($v["mainimg"]["imgname"]); ?>"/>
							<span><strong><?php echo ($v["title"]); ?></strong></span>
						</div>
					</a><?php endforeach; endif; ?>					
				</div>		
			</div>
		</div>
		<!-- 手机游戏结束 -->
		
		<!-- 客户端游戏开始 -->
		<div class='middle-mobilegame-main-content'>
			<div class='middle-mobilegame-left'>
				<div class='mg_hd'>
					<h2>网络游戏</h2>
					<div>
						<a>更多</a>
					</div>
				</div>
				<div class='mg_content'>
					<div class='mg_newstitle'>
						<ul>
						<?php if(is_array($online_noimg)): foreach($online_noimg as $key=>$v): ?><li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'><?php echo ($v["time"]); ?></span>
								</span>
								<span class='mg-news-title'><a class='bold' href="/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></span>
							</li><?php endforeach; endif; ?>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
						</ul>
					</div>
					<?php if(is_array($onlinenews)): foreach($onlinenews as $key=>$v): ?><a href='/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>'>
						<div class='mg-image'>
							<img src="/Public/admin/images/newsimg/<?php echo ($v["id"]); ?>/<?php echo ($v["mainimg"]["imgname"]); ?>"/>
							<span><strong><?php echo ($v["title"]); ?></strong></span>
						</div>
					</a><?php endforeach; endif; ?>
					
				</div>		
			</div>
		</div>
		<!-- 客户端游戏结束 -->
		
		<!-- 单机游戏开始 -->
		<div class='middle-mobilegame-main-content'>
			<div class='middle-mobilegame-left'>
				<div class='mg_hd'>
					<h2>单机游戏</h2>
					<div>
						<a>更多</a>
					</div>
				</div>
				<div class='mg_content'>
					<div class='mg_newstitle'>
						<ul>
						<?php if(is_array($alone_noimg)): foreach($alone_noimg as $key=>$v): ?><li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'><?php echo ($v["time"]); ?></span>
								</span>
								<span class='mg-news-title'><a class='bold' href="/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></span>
							</li><?php endforeach; endif; ?>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
						</ul>
					</div>
					<?php if(is_array($alonenews)): foreach($alonenews as $key=>$v): ?><a href='/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>'>
						<div class='mg-image'>
							<img src="/Public/admin/images/newsimg/<?php echo ($v["id"]); ?>/<?php echo ($v["mainimg"]["imgname"]); ?>"/>
							<span><strong><?php echo ($v["title"]); ?></strong></span>
						</div>
					</a><?php endforeach; endif; ?>
					
				</div>		
			</div>
		</div>
		<!-- 单机游戏结束 -->
		
		<!-- 网页游戏开始 -->
		<div class='middle-mobilegame-main-content'>
			<div class='middle-mobilegame-left'>
				<div class='mg_hd'>
					<h2>网页游戏</h2>
					<div>
						<a>更多</a>
					</div>
				</div>
				<div class='mg_content'>
					<div class='mg_newstitle'>
						<ul>
						<?php if(is_array($web_noimg)): foreach($web_noimg as $key=>$v): ?><li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'><?php echo ($v["time"]); ?></span>
								</span>
								<span class='mg-news-title'><a class='bold' href="/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></span>
							</li><?php endforeach; endif; ?>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
							<li>
								<span class='mg-news-time'>
									<span class='mg-news-time-inner'>2016-11-25 09:00</span>
								</span>
								<span class='mg-news-title'><a>《放开那三国2》评测：指尖暴走不负王名</a></span>
							</li>
						</ul>
					</div>
					<?php if(is_array($webnews)): foreach($webnews as $key=>$v): ?><a href='/home.php/Gamesnews/index/newsId/<?php echo ($v["id"]); ?>'>
						<div class='mg-image'>
							<img src="/Public/admin/images/newsimg/<?php echo ($v["id"]); ?>/<?php echo ($v["mainimg"]["imgname"]); ?>"/>
							<span><strong><?php echo ($v["title"]); ?></strong></span>
						</div>
					</a><?php endforeach; endif; ?>
					
				</div>		
			</div>
		</div>	
		<!-- 网页游戏结束 -->
	
		<!-- 精美图片 -->
		<div class='game-selection'>
			<!-- <div class='middle-mobilegame-main-content'> -->
				<!-- <div class='middle-mobilegame-left'> -->
					<div class='mg_hd'>
						<h2>精美图片</h2>
						<div>
							<a>更多</a>
						</div>
					</div>
				<div id='over'>
					<div class='over-black'>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class='table-image'>
		
							<img class="jfade_image" src="/Public/home/images/549a4ece4ff95.jpg" width='300' height='188'/>
							
							<img class="jfade_image" src="/Public/home/images/20130613125833_NFnTc.thumb.700_0.jpeg" width='300' height='188'/>
						
							<img class="jfade_image" src="/Public/home/images/549a4ece4ff95.jpg" width='300' height='188'/>
						
							<img class="jfade_image" src="/Public/home/images/549a4ece4ff95.jpg" width='300' height='188'/>
						
							<img class="jfade_image" src="/Public/home/images/549a4ece4ff95.jpg" width='300' height='188'/>
					
							<img class="jfade_image" src="/Public/home/images/549a4ece4ff95.jpg" width='300' height='188'/>
					
							<img class="jfade_image" src="/Public/home/images/549a4ece4ff95.jpg" width='300' height='188'/>
					
							<img class="jfade_image" src="/Public/home/images/549a4ece4ff95.jpg" width='300' height='188'/> 
						
					</div>
				 </div>
				<!-- </div>	 -->
			<!-- </div> -->
		</div>
	</div>
	
	<!-- 手机,网络,单机,网页游戏新闻右边 -->
	<div id='middle-newscontent-right'>
	<?php if(is_array($gamesrank)): foreach($gamesrank as $key=>$v): ?><div class='game-ranking'>
			<div class='game-ranking-title'>
				<span><?php echo ($v["gamestypename"]); ?>排行榜</span>
			</div>
			<div class='game-ranking-content'>
				<ul id='mobileul<?php echo ($v["id"]); ?>'>
					<!-- 1 -->
					<?php if(is_array($v["rank"])): foreach($v["rank"] as $k=>$r): if( $k == 0): ?><li	class='game-rankingname-img'>
						<span><?php echo ($k+1); ?></span>
						<div class='game-rankingname-img1'>
							<img src="/Public/admin/images/gamedesktop/<?php echo ($r["smalldesktop"]); ?>"/>
						</div>
						<div class='game-rankingname-img2'>
							<div class='game-rankingname-img2-1'>
								<a><?php echo ($r["gamesname"]); ?></a>
							</div>
							<div class='game-rankingname-img2-2'><?php echo ($r["gametype"]); ?></div>
							<div class='game-rankingname-img2-3'>
								<a>下载</a>
							</div>
						</div>
					</li>
					<li	class='game-rankingname-txt none'>
						<div class='game-rankingname-t1'><?php echo ($k+1); ?></div>
						<div class='game-rankingname-t2'><a><?php echo ($r["gamesname"]); ?></a></div>
					</li>
					<?php else: ?>
					<li	class='game-rankingname-img none'>
						<span><?php echo ($k+1); ?></span>
						<div class='game-rankingname-img1'>
							<img src="/Public/admin/images/gamedesktop/<?php echo ($r["smalldesktop"]); ?>"/>
						</div>
						<div class='game-rankingname-img2'>
							<div class='game-rankingname-img2-1'>
								<a><?php echo ($r["gamesname"]); ?></a>
							</div>
							<div class='game-rankingname-img2-2'><?php echo ($r["gametype"]); ?></div>
							<div class='game-rankingname-img2-3'>
								<a>下载</a>
							</div>
						</div>
					</li>
					<li	class='game-rankingname-txt'>
						<div class='game-rankingname-t1'><?php echo ($k+1); ?></div>
						<div class='game-rankingname-t2'><a><?php echo ($r["gamesname"]); ?></a></div>
					</li><?php endif; endforeach; endif; ?>
					
				</ul>
				<script>
					$('#mobileul<?php echo ($v["id"]); ?> .game-rankingname-txt').mouseover(function(){
						/* alert('aaa') */
						$("#mobileul<?php echo ($v["id"]); ?> .game-rankingname-img").css('display','none')
						$("#mobileul<?php echo ($v["id"]); ?> .game-rankingname-txt").css('display','block') 
						$(this).prev().css('display','block')
						$(this).css('display','none') 
					})
				</script>
			</div>
		</div><?php endforeach; endif; ?>
	</div>
</div>
</div>
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