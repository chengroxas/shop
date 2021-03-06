<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>搜索页面</title>

	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

	<link href="/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />

	<link href="/Public/css/seastyle.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="/Public/basic/js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="/Public/js/script.js"></script>
	<script type="text/javascript" src="/Public/js/search.js"></script>
	<script type="text/javascript" src="/Public/js/template-native.js"></script>
	<style>
		.am-pagination-right{text-align:center;}
	</style>
</head>

<body>

	<!--顶部导航条 -->
	
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

		<b class="line"></b>
	   <div class="search">
		<div class="search-list">
		<div class="nav-table">
	   <div class="long-title"><span class="all-goods">全部分类</span></div>
	   <div class="nav-cont">
			<ul>
				<li class="index"><a href="/Home/Index/index">首页</a></li>
				<!---<li class="qc"><a href="#">闪购</a></li>
				<li class="qc"><a href="#">限时抢</a></li>
				<li class="qc"><a href="#">团购</a></li>
				<li class="qc last"><a href="#">大包装</a></li>--->
			</ul>
			<div class="nav-extra">
				<!--<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
				<i class="am-icon-angle-right" style="padding-left: 10px;"></i>--->
			</div>
		</div>
</div>


				<div class="am-g am-g-fixed">
					<div class="am-u-sm-12 am-u-md-12">
					<div class="theme-popover">														
						<div class="searchAbout">
							
						</div>
						<ul class="select">
							<p class="title font-normal">
								<span class="fl"><?php echo ($keyword); ?></span>
								<span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span>
							</p>
							<div class="clear"></div>
							<li class="select-result">
								<dl>
									<dt>已选</dt>
									<dd class="select-no"></dd>
									<p class="eliminateCriteria">清除</p>
								</dl>
							</li>
							<div class="clear"></div>
							<li class="select-list">
								<dl id="select2">
									<dt class="am-badge am-round">种类</dt>
									<div class="dd-conent brand">
										<dd class="select-all selected"><a id="all" href="#">全部</a></dd>
										<?php if(is_array($types)): foreach($types as $key=>$types): ?><dd><a id="<?php echo ($types['fid']); ?>" class="types" href="javascript:void(0);"><?php echo ($types['types']); ?></a></dd><?php endforeach; endif; ?>
									</div>
								</dl>
							</li>
							<div id="brand">
							</div>
						</ul>
						<div class="clear"></div>
					</div>
						<div class="search-content">
							<div class="sort">
								<li class="first"><a title="all"  href="javascript:void(0);">综合排序</a></li>
								<li><a title="sales" href="javascript:void(0);">销量排序</a></li>
								<li><a title="price" href="javascript:void(0);">价格优先</a></li>
								<li class="big"><a title="comnum"  href="javascript:void(0);">评价为主</a></li>
							</div>
							<div class="clear"></div>
							<?php if($goods == null ): ?><p class="am-text-center am-text-default">对不起,没有相关搜索</p><?php endif; ?>
							<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
								<?php if(is_array($goods)): foreach($goods as $key=>$sgoods): ?><li>
								<a href="/Home/Goods/introduce?pid=<?php echo ($sgoods['pid']); ?>&goodspid=<?php echo ($sgoods['id']); ?>">
									<div class="i-pic limit">
										
										<img src="<?php echo ($sgoods['cover']); ?>" />
										<p class="title fl"><?php echo ($sgoods['name']); ?></p>
										<p class="price fl">
											<b>¥</b>
											<strong><?php echo ($sgoods['price']); ?></strong>
										</p>
										<p class="number fl">
											销量<span><?php echo ($sgoods['sales']); ?></span>
										</p>
									</div>
									</a>
								</li><?php endforeach; endif; ?>
								
							</ul>
						</div>
						<div class="search-side">

							<!---<div class="side-title">
								经典搭配
							</div>

							
							
							<li>
								<div class="i-pic check">
									<img src="/Public/images/cp.jpg" />
									<p class="check-title">萨拉米 1+1小鸡腿</p>
									<p class="price fl">
										<b>¥</b>
										<strong>29.90</strong>
									</p>
									<p class="number fl">
										销量<span>1110</span>
									</p>
								</div>
							</li>--->

						</div>
						<div class="clear"></div>
						<!--分页 -->
						<ul class="am-pagination am-pagination-right">
							<?php echo ($links); ?>
						</ul>

					</div>
				</div>
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

	<!--引导 -->
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
		window.jQuery || document.write('<script src="basic/js/jquery-1.9.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="/Public/basic/js/quick_links.js"></script>
	<script type="text/javascript" src="/Public/basic/js/template-native.js"></script>

<div class="theme-popover-mask"></div>

	<script type="text/html" id="select-box">
		
			<li class="select-list">
				<dl id="select3">
					<dt class="am-badge am-round">品牌</dt>
					<div class="dd-conent">
						<dd class="select-all selected"><a href="#">全部</a></dd>
						<%for(var i=0;i<data.length;i++){%>
							<dd><a href="#"><%=data[i].brand%></a></dd>
						<%}%>
					</div>
				</dl>
			</li>
			
	</script>
</body>

</html>