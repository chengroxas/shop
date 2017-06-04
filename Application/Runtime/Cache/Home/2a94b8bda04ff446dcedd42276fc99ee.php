<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>首页</title>

	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

	<link href="/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />

	<link href="/Public/css/hmstyle.css" rel="stylesheet" type="text/css" />
	<script src="/Public/Tools/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
	<script src="/Public/Tools/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

</head>

<body>
		<div class="hmtop">
		
		<!--顶部导航条 -->
	<div class="am-container header">
		<ul class="message-l">
			<div class="topMessage">
				<div class="menu-hd">
					<?php if($_SESSION['user']== '' ): ?><a href="/Home/Login/login" target="_top" class="h">亲，请登录</a>
						<a href="/Home/Login/regist" target="_top">免费注册</a>
					<?php else: ?>
						<a href="/Home/User/index" target="_top" class="h"><?php echo (session('user')); ?>,欢迎登录orange</a><?php endif; ?>
				</div>
			</div>
		</ul>
		<ul class="message-r">
			<div class="topMessage home">
				<div class="menu-hd"><a href="/Home/Index/index" target="_top" class="h">商城首页</a></div>
			</div>
			<div class="topMessage my-shangcheng">
				<div class="menu-hd MyShangcheng"><a href="/Home/User/index" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
			</div>
			<div class="topMessage mini-cart">
				<div class="menu-hd">
					<a id="mc-menu-hd" href="/Home/User/shopcart" target="_top">
						<i class="am-icon-shopping-cart  am-icon-fw"></i>
						<span>购物车</span>
						<strong id="CartNum" class="h">
							<?php if($_SESSION['cartnum']== '' ): ?>0
							<?php else: ?>
								<?php echo (session('cartnum')); endif; ?>
							
						</strong>
					</a>
				</div>
			</div>
			<div class="topMessage favorite">
				<div class="menu-hd"><a href="/Home/User/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
		</ul>
		</div>

			<!--悬浮搜索框-->

		<div class="nav white">
			<div class="logo"><img src="/Public/images/logo.png" /></div>
			<div class="logoBig">
				<li><img src="/Public/images/logobig.png" /></li>
			</div>

			<div class="search-bar pr">
				<a name="index_none_header_sysc" href="#"></a>
				<form action="/Home/Goods/search">
					<input id="searchInput" name="key" type="text" placeholder="搜索" autocomplete="off">
					<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
				</form>
			</div>
		</div>
		<div class="clear"></div>

		
		<div class="banner">
				  <!--轮播 -->
			<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
				<ul class="am-slides">
					<li class="banner1"><a href="introduction.html"><img src="/Public/images/ad1.jpg" /></a></li>
					<li class="banner2"><a><img src="/Public/images/ad2.jpg" /></a></li>
					<li class="banner3"><a><img src="/Public/images/ad3.jpg" /></a></li>
					<li class="banner4"><a><img src="/Public/images/ad4.jpg" /></a></li>

				</ul>
			</div>
			<div class="clear"></div>	
		</div>						
		
		<div class="shopNav">
			<div class="slideall">
				
			   <div class="long-title"><span class="all-goods">全部分类</span></div>
			   <div class="nav-cont">
					<ul>
						<li class="index"><a href="/Home/Index/index">首页</a></li>
						<!---<li class="qc"><a href="#">闪购</a></li>
						<li class="qc"><a href="#">限时抢</a></li>
						<li class="qc"><a href="#">团购</a></li>
						<li class="qc last"><a href="#">大包装</a></li>---->
					</ul>
					<div class="nav-extra">
						<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
					</div>
				</div>
							
					<!--侧边导航 -->
					<div id="nav" class="navfull">
						<div class="area clearfix">
							<div class="category-content" id="guide_2">
								
								<div class="category">
									<ul class="category-list" id="js_climit_li">
										<?php if(is_array($data)): foreach($data as $key=>$type): ?><li class="appliance js_toggle relative first">
											<div class="category-info">
												<h3 class="category-name b-category-name"><i><img src="<?php echo ($type['icon']); ?>"></i><a class="ml-22" title="点心"><?php echo ($type['types']); ?></a></h3>
												<em>&gt;</em></div>
											<div class="menu-item menu-in top">
												<div class="area-in">
													<div class="area-bg">
														<div class="menu-srot">
															<div class="sort-side">
																<dl class="dl-sort">
																	<dt><span title="<?php echo ($type['types']); ?>"><?php echo ($type['types']); ?></span></dt>
																	<?php if(is_array($type["stype"])): foreach($type["stype"] as $key=>$stype): ?><dd><a title="<?php echo ($stype['types']); ?>" href="/Home/Goods/goods?pid=<?php echo ($stype['fid']); ?>"><span><?php echo ($stype['types']); ?></span></a></dd><?php endforeach; endif; ?>	
																</dl>
															</div>
															<div class="brand-side">
																<dl class="dl-sort"><dt><span>实力商家</span></dt>
																	<?php if(is_array($type["shop"])): foreach($type["shop"] as $key=>$shopname): ?><dd><a rel="nofollow" title="<?php echo ($shopname['manger']); ?>" target="_blank" href="#" rel="nofollow"><span  class="red" ><?php echo ($shopname['manger']); ?></span></a></dd><?php endforeach; endif; ?>
																</dl>
															</div>
														</div>
													</div>
												</div>
											</div>
										<b class="arrow"></b>	
										</li><?php endforeach; endif; ?>
										
									</ul>
								</div>
							</div>

						</div>
					</div>
					<!--轮播 -->
					<script type="text/javascript">
						(function() {
							$('.am-slider').flexslider();
						});
						$(document).ready(function() {
							$("li").hover(function() {
								$(".category-content .category-list li.first .menu-in").css("display", "none");
								$(".category-content .category-list li.first").removeClass("hover");
								$(this).addClass("hover");
								$(this).children("div.menu-in").css("display", "block")
							}, function() {
								$(this).removeClass("hover")
								$(this).children("div.menu-in").css("display", "none")
							});
						})
					</script>


				<!--小导航 -->
				<div class="am-g am-g-fixed smallnav">
					<div class="am-u-sm-3">
						<a href="sort.html"><img src="/Public/images/navsmall.jpg" />
							<div class="title">商品分类</div>
						</a>
					</div>
					<div class="am-u-sm-3">
						<a href="#"><img src="/Public/images/huismall.jpg" />
							<div class="title">大聚惠</div>
						</a>
					</div>
					<div class="am-u-sm-3">
						<a href="#"><img src="/Public/images/mansmall.jpg" />
							<div class="title">个人中心</div>
						</a>
					</div>
					<div class="am-u-sm-3">
						<a href="#"><img src="/Public/images/moneysmall.jpg" />
							<div class="title">投资理财</div>
						</a>
					</div>
				</div>

				<!--走马灯 -->

				
			</div>
			<script type="text/javascript">
				if ($(window).width() < 640) {
					function autoScroll(obj) {
						$(obj).find("ul").animate({
							marginTop: "-39px"
						}, 500, function() {
							$(this).css({
								marginTop: "0px"
							}).find("li:first").appendTo(this);
						})
					}
					$(function() {
						setInterval('autoScroll(".demo")', 3000);
					})
				}
			</script>
		</div>
		<div class="shopMainbg">
			<div class="shopMain" id="shopmain">
				<!--今日推荐 -->
				
				<!--热门活动 -->

				<!--甜点-->
				<?php if(is_array($show)): foreach($show as $key=>$show): ?><div class="am-container ">
					<div class="shopTitle ">
						<h4><?php echo ($show['types']); ?></h4>
						<h3>每一道甜品都有一个故事</h3>
						<div class="today-brands ">
							<?php if(is_array($show["more"])): foreach($show["more"] as $key=>$moretypes): ?><a href="/Home/Goods/goods?pid=<?php echo ($moretypes['fid']); ?>"><?php echo ($moretypes['types']); ?></a><?php endforeach; endif; ?>
						</div>
						<span class="more ">
							<a class="more-link " href="/Home/Goods/search?fid=<?php echo ($show['fid']); ?>">更多美味</a>
					</span>
					</div>
				</div>
				
				<div class="am-g am-g-fixed floodOne ">
					<?php if(is_array($show["goods"])): foreach($show["goods"] as $key=>$big): if($key == 0): ?><div class="am-u-sm-5 am-u-md-3 am-u-lg-4 text-one ">
						<a href="/Home/Goods/introduce?goodspid=<?php echo ($big['id']); ?>">
							<div class="outer-con ">
								<div class="title ">
									零食大礼包开抢啦
								</div>					
								<div class="sub-title ">
									<?php echo ($big['name']); ?>
								</div>
							</div>
							  <img src="<?php echo ($big['cover']); ?> " />								
						</a>
					</div><?php endif; endforeach; endif; ?>
					<div class="am-u-sm-7 am-u-md-5 am-u-lg-4">
						<?php if(is_array($show["goods"])): foreach($show["goods"] as $key=>$middle): if(($key == 1) or ($key == 2) ): ?><div class="text-two">
							<div class="outer-con ">
								<div class="title ">
									<?php echo ($middle['name']); ?>
								</div>									
								<div class="sub-title">
									售价:<?php echo ($middle['price']); ?>
								</div>
								
							</div>
							<a href="/Home/Goods/introduce?goodspid=<?php echo ($middle['id']); ?> "><img src="<?php echo ($middle['cover']); ?>" /></a>
						</div><?php endif; endforeach; endif; ?>
					</div>
				 <div class="am-u-sm-12 am-u-md-4 ">
					 <?php if(is_array($show["goods"])): foreach($show["goods"] as $key=>$small): if($key > 2 ): ?><div class="am-u-sm-3 am-u-md-6 text-three">
						<div class="outer-con ">
							<div class="title ">
								<?php echo ($small['name']); ?>
							</div>
							
							<div class="sub-title ">
								尝鲜价：¥<?php echo ($small['price']); ?>
							</div>
						</div>
						<a href="/Home/Goods/introduce?goodspid=<?php echo ($small['id']); ?>"><img src="<?php echo ($small['cover']); ?> " /></a>
					</div><?php endif; endforeach; endif; ?>
				</div>
			</div><?php endforeach; endif; ?>
			 <div class="clear "></div>
			<div class="footer ">
					<div class="footer-hd ">
						<p>
							<a href="# ">恒望科技</a>
							<b>|</b>
							<a href="# ">商城首页</a>
							<b>|</b>
							<a href="# ">支付宝</a>
							<b>|</b>
							<a href="# ">物流</a>
						</p>
					</div>
					<div class="footer-bd ">
						<p>
							<a href="# ">关于恒望</a>
							<a href="# ">合作伙伴</a>
							<a href="# ">联系我们</a>
							<a href="# ">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>
	<!--底端引导 -->
		<div class="navCir">
			<li><a href="/Home/Index/index"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="/Home/User/index"><i class="am-icon-user"></i>我的</a></li>					
</div>

	<!--菜单 -->
		<div class=tip>
		<div id="sidebar">
			<div id="wrap">
				<div id="prof" class="item ">
					<a href="#">
						<span class="setting "></span>
					</a>
					<div class="ibar_login_box status_login ">
						<div class="avatar_box ">
							<p class="avatar_imgbox ">
								<?php if($_SESSION['id']== '' ): ?></div>
								<div class="login_btnbox ">
									<a href="/Home/Login/login " class="login_order ">登录</a>
									<a href="/Home/Login/regist " class="login_favorite ">注册</a>
								</div>
								<?php else: ?>
								<?php if($_SESSION['logo']== '' ): ?><img src="/Public/images/getAvatar.do.jpg" /></p>
								<?php else: ?>
									<img src="<?php echo (session('logo')); ?> " /></p><?php endif; ?>
									<ul class="user_info ">
										<li>用户名：<?php echo (session('user')); ?></li>
										<li>级&nbsp;别：普通会员</li>
									</ul>
								</div>
								<div class="login_btnbox ">
									<a href="/Home/User/order" class="login_order ">我的订单</a>
									<a href="/Home/User/collection" class="login_favorite ">我的收藏</a>
								</div><?php endif; ?>
						<i class="icon_arrow_white "></i>
					</div>

				</div>
				<div id="shopCart " class="item ">
					<a href="/Home/User/shopcart">
						<span class="message "></span>
					</a>
					<p>
						购物车
					</p>
					<p class="cart_num ">
						<?php if($_SESSION['cartnum']== '' ): ?>0
						<?php else: ?>
							<?php echo (session('cartnum')); endif; ?>
					</p>
				</div>
				<!---<div id="asset " class="item ">
					<a href="# ">
						<span class="view "></span>
					</a>
					<div class="mp_tooltip ">
						我的资产
						<i class="icon_arrow_right_black "></i>
					</div>
				</div>--->

				<div id="foot " class="item ">
					<a href="/Home/User/foot ">
						<span class="zuji "></span>
					</a>
					<div class="mp_tooltip ">
						我的足迹
						<i class="icon_arrow_right_black "></i>
					</div>
				</div>

				<div id="brand " class="item ">
					<a href="/Home/User/collection">
						<span class="wdsc "><img src="/Public/images/wdsc.png " /></span>
					</a>
					<div class="mp_tooltip ">
						我的收藏
						<i class="icon_arrow_right_black "></i>
					</div>
				</div>

				<!----<div id="broadcast " class="item ">
					<a href="# ">
						<span class="chongzhi "><img src="/Public/images/chongzhi.png " /></span>
					</a>
					<div class="mp_tooltip ">
						我要充值
						<i class="icon_arrow_right_black "></i>
					</div>
				</div>--->

				<div class="quick_toggle ">
					<li class="qtitem ">
						<a href="# "><span class="kfzx "></span></a>
						<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
					</li>
					<!--二维码 -->
					<li class="qtitem ">
						<a href="#none "><span class="mpbtn_qrcode "></span></a>
						<div class="mp_qrcode " style="display:none; "><img src="/Public/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
					</li>
					<li class="qtitem ">
						<a href="#top " class="return_top "><span class="top "></span></a>
					</li>
				</div>

				<!--回到顶部 -->
				<div id="quick_links_pop " class="quick_links_pop hide "></div>

			</div>

		</div>
		<div id="prof-content " class="nav-content ">
			<div class="nav-con-close ">
				<i class="am-icon-angle-right am-icon-fw "></i>
			</div>
			<div>
				我
			</div>
		</div>
		<div id="shopCart-content " class="nav-content ">
			<div class="nav-con-close ">
				<i class="am-icon-angle-right am-icon-fw "></i>
			</div>
			<div>
				购物车
			</div>
		</div>
		<div id="asset-content " class="nav-content ">
			<div class="nav-con-close ">
				<i class="am-icon-angle-right am-icon-fw "></i>
			</div>
			<div>
				资产
			</div>

			<div class="ia-head-list ">
				<a href="# " target="_blank " class="pl ">
					<div class="num ">0</div>
					<div class="text ">优惠券</div>
				</a>
				<a href="# " target="_blank " class="pl ">
					<div class="num ">0</div>
					<div class="text ">红包</div>
				</a>
				<a href="# " target="_blank " class="pl money ">
					<div class="num ">￥0</div>
					<div class="text ">余额</div>
				</a>
			</div>

		</div>
		<div id="foot-content " class="nav-content ">
			<div class="nav-con-close ">
				<i class="am-icon-angle-right am-icon-fw "></i>
			</div>
			<div>
				足迹
			</div>
		</div>
		<div id="brand-content " class="nav-content ">
			<div class="nav-con-close ">
				<i class="am-icon-angle-right am-icon-fw "></i>
			</div>
			<div>
				收藏
			</div>
		</div>
		<div id="broadcast-content " class="nav-content ">
			<div class="nav-con-close ">
				<i class="am-icon-angle-right am-icon-fw "></i>
			</div>
			<div>
				充值
			</div>
		</div>
	</div>

	<script>
		window.jQuery || document.write('<script src="/Public/basic/js/jquery.min.js "><\/script>');
	</script>
	<script type="text/javascript " src="/Public/basic/js/quick_links.js "></script>
</body>

</html>