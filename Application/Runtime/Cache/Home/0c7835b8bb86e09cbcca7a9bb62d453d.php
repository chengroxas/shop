<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

	<title>个人资料</title>

	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

	<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/infstyle.css" rel="stylesheet" type="text/css">
	
			
</head>

<body>
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

	<!--头 -->
<b class="line"></b>
	<div class="center">
		<div class="col-main">
			<div class="main-wrap">			
				<!---个人详细信息---->
				<div class="user-info">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
				</div>
				<hr/>

				<!--头像 -->
				<div class="user-infoPic">

					<div class="filePic">
						<input  id="logo" name="logo" type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
						<input id="logo-img" value="<?php echo (session('logo')); ?>" type="hidden">
						<?php if($_SESSION['logo']== '' ): ?><img class="am-circle am-img-thumbnail" src="/Public/images/getAvatar.do.jpg" alt="" />
						<?php else: ?>
							<img class="am-circle am-img-thumbnail" src="<?php echo (session('logo')); ?>" alt="" /><?php endif; ?>
					</div>

					<p class="am-form-help">头像</p>

					<div class="info-m">
						<div><b>用户名：<i><?php echo (session('user')); ?></i></b></div>
						<div class="vip">
							  <span></span><a href="#">会员专享</a>
						</div>
					</div>
				</div>

				<!--个人信息 -->
				<div class="info-main">
					<form class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="user-name2" class="am-form-label">昵称</label>
							<div class="am-form-content">
								<input type="text" id="nickname" value="<?php echo ($user['nickname']); ?>" placeholder="nickname">
								  <small>昵称长度不能超过40个汉字</small>
							</div>
						</div>


						<div class="am-form-group">
							<label class="am-form-label">性别</label>
							<div class="am-form-content sex">
								<label class="am-radio-inline">
									<?php if($user['sex'] == 'male' ): ?><input type="radio" name="sex" value="male" checked="checked" > 男
									<?php else: ?>
										<input type="radio" name="sex"  value="male" data-am-ucheck> 男<?php endif; ?>
								</label>
								<label class="am-radio-inline">
									<?php if($user['sex'] == 'female' ): ?><input type="radio" name="sex" value="female" checked > 女
									<?php else: ?>
										<input type="radio" name="sex" value="female" data-am-ucheck> 女<?php endif; ?>
								</label>
								<label class="am-radio-inline">
									<?php if($user['sex'] == 'secret' ): ?><input type="radio" name="sex" value="secret" checked> 保密
									<?php else: ?>
										<input type="radio" name="sex" value="secret" data-am-ucheck> 保密<?php endif; ?>
								</label>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-birth" class="am-form-label">生日</label>
							<div class="am-form-content birth">
								<div class="am-input-group am-datepicker-date" id="date" data-am-datepicker="{format: 'yyyy-mm-dd', viewMode: 'years'}">
									<span class="am-input-group-btn am-datepicker-add-on">
										<button class="am-btn am-btn-default"  type="button"><span class="am-icon-calendar"></span> </button>
									</span>
									<input type="text"  class="am-form-field" id="birth" value="<?php echo ($user['birth']); ?>" placeholder="出生日期" readonly>
								</div>
							</div>
						</div>
						
						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">电话</label>
							<div class="am-form-content">
								<input id="phone" placeholder="telephonenumber" value="<?php echo ($user['phone']); ?>" type="tel">
								<small>手机号码必填</small>
							</div>
						</div>
						
						<div class="am-form-group">
							<label for="user-email" class="am-form-label">电子邮件</label>
							<div class="am-form-content">
								<input id="email" placeholder="Email" value="<?php echo ($user['email']); ?>" type="email">
								<small>邮箱必填</small>
							</div>
						</div>
						
						<div class="am-form-group address">
							<label for="user-address" class="am-form-label">收货地址</label>
							<div class="am-form-content address">
								<a href="/Home/User/address">
									<p class="new-mu_l2cw">
										<span class="province"><?php echo ($address['province']); ?></span>
										<span class="city"><?php echo ($address['town']); ?></span>
										<span class="dist"><?php echo ($address['area']); ?></span>
										<span class="street"><?php echo ($address['address']); ?></span>
										<span class="am-icon-angle-right"></span>
									</p>
								</a>

							</div>
						</div>
						<div class="am-form-group safety">
							<label for="user-safety" class="am-form-label">账号安全</label>
							<div class="am-form-content safety">
								<a href="safety.html">
									<span class="am-icon-angle-right"></span>
								</a>

							</div>
						</div>
						<div class="info-btn">
							<div class="am-btn am-btn-danger" id="modify">保存修改</div>
						</div>
					</form>
					</div>	
				</div>	
			</div>
			<!--底部-->
			<div class="footer">
				<div class="footer-hd">
					<p>
						<a href="#">恒望科技</a>
						<b>|</b>
						<a href="#">商城首页</a>
						<b>|</b>
						<a href="#">支付宝</a>
						<b>|</b>
						<a href="#">物流</a>
					</p>
				</div>
				<div class="footer-bd">
					<p>
						<a href="#">关于恒望</a>
						<a href="#">合作伙伴</a>
						<a href="#">联系我们</a>
						<a href="#">网站地图</a>
						<em>© 2015-2025 Hengwang.com 版权所有</em>
					</p>
				</div>
			</div>

			<!--底部-->
		</div>
		<!--侧栏-->
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

		<!--侧栏-->
	</div>
</body>
	
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/common.js"></script>
<script src="/Public/js/memberinfo.js"></script>
<script src="/Public/Tools/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
<script src="/Public/Tools/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
<script src="/Public/js/layer/layer.js"></script>
</html>