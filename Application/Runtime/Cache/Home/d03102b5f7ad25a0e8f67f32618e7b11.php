<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

	<title>我的足迹</title>

	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

	<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/footstyle.css" rel="stylesheet" type="text/css">

</head>

<body>
	<!--头 -->
	<!--头 -->
	<header>
		<article>
			<div class="mt-logo">
				<!--顶部导航条 -->
				<div class="am-container header">
					<ul class="message-l">
						<div class="topMessage">
							<div class="menu-hd">
								<a href="/Home/User/index" target="_top" class="h"><?php echo (session('user')); ?>,欢迎登录orange</a>
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
							<div class="menu-hd"><a id="mc-menu-hd" href="/Home/User/shopcart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"><?php echo (session('cartnum')); ?></strong></a></div>
						</div>
						<div class="topMessage favorite">
							<div class="menu-hd"><a href="/Home/User/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
					</ul>
					</div>

					<!--悬浮搜索框-->

					<div class="nav white">
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
				</div>
			</div>
		</article>
	</header>
		<div class="nav-table">
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
		</div>

		<b class="line"></b>
	<div class="center">
		<div class="col-main">
			<div class="main-wrap">

				<div class="user-foot">
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
					</div>
					<hr/>

					<!--足迹列表 -->
					<?php if(is_array($foot)): foreach($foot as $key=>$foot): if(is_array($foot["goods"])): foreach($foot["goods"] as $key=>$goods): ?><div class="goods">
								<div class="goods-date" data-date="<?php echo ($foot['time']); ?>">
									<?php if($key == 0 ): ?><span><i class="month-lite"><?php echo ($foot['time']); ?></i><i class="date-desc"></i></span>
									<del class="am-icon-trash"></del>
									<s class="line"></s>
									<?php else: ?>
									<s class="line"></s><?php endif; ?>
								</div>

								<div class="goods-box first-box">
									<div class="goods-pic">
										<div class="goods-pic-box">
											<a class="goods-pic-link"  href="/Home/Goods/introduce?goodspid=<?php echo ($goods['goodspid']); ?>" title="<?php echo ($goods['detail']['name']); ?>">
											<img src="<?php echo ($goods['detail']['cover']); ?>" class="goods-img"></a>
										</div>
										<a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
										<!---<?php if($goods["status"] != 1): ?><div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div><?php endif; ?>--->
									</div>

									<div class="goods-attr">
										<div class="good-title">
											<a class="title" href="#" target="_blank"><?php echo ($goods['detail']['name']); ?></a>
										</div>
										<div class="goods-price">
											<span class="g_price">                                    
											<span>¥</span><strong><?php echo ($goods['detail']['price']); ?></strong>
											</span>
											<!---<span class="g_price g_price-original">                                    
											<span>¥</span><strong>142</strong>
											</span>--->
										</div>
										<div class="clear"></div>
										<div class="goods-num">
											<div class="match-recom">
												<a href="#" class="match-recom-item">找相似</a>
												<a href="#" class="match-recom-item">找搭配</a>
												<i><em></em><span></span></i>
											</div>
										</div>
									</div>
								</div>
							</div><?php endforeach; endif; ?>
							<div class="clear"></div><?php endforeach; endif; ?>
					

					

					
					

			
						

						

							
					
					<!----足迹列表--->
				</div>
			</div>

			<!--底部-->
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

		<aside class="menu">
			<ul>
				<li class="person active">
					<a href="index.html"><i class="am-icon-user"></i>个人中心</a>
				</li>
				<li class="person">
					<p><i class="am-icon-newspaper-o"></i>个人资料</p>
					<ul>
						<li> <a href="/Home/User/information">个人信息</a></li>
					<!--<li> <a href="safety.html">安全设置</a></li>--->
						<li> <a href="/Home/User/address">地址管理</a></li>
					<!--<li> <a href="cardlist.html">快捷支付</a></li>--->
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-balance-scale"></i>我的交易</p>
					<ul>
						<li><a href="/Home/User/order">订单管理</a></li>
						<li> <a href="change.html">退款售后</a></li>
						<li> <a href="comment.html">评价商品</a></li>
					</ul>
				</li>
				<!--<li class="person">
					<p><i class="am-icon-dollar"></i>我的资产</p>
					<ul>
						<li> <a href="points.html">我的积分</a></li>
						<li> <a href="coupon.html">优惠券 </a></li>
						<li> <a href="bonus.html">红包</a></li>
						<li> <a href="walletlist.html">账户余额</a></li>
						<li> <a href="bill.html">账单明细</a></li>
					</ul>
				</li>--->

				<li class="person">
					<p><i class="am-icon-tags"></i>我的收藏</p>
					<ul>
						<li> <a href="/Home/User/collection">收藏</a></li>
						<li> <a href="/Home/User/foot">足迹</a></li>														
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-sign-out"></i>注销账号</p>
					<ul>
						<li><a  href="/Home/Login/safeout">安全退出</a></li>										
					</ul>
				</li>
				<!---<li class="person">
					<p><i class="am-icon-qq"></i>在线客服</p>
					<ul>
						<li> <a href="consultation.html">商品咨询</a></li>
						<li> <a href="suggest.html">意见反馈</a></li>							
						
						<li> <a href="news.html">我的消息</a></li>
					</ul>
				</li>--->
			</ul>

</aside>

	</div>

</body>

</html>