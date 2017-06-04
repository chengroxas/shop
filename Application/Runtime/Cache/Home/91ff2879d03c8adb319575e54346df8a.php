<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

	<title>地址管理</title>

	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

	<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/addstyle.css" rel="stylesheet" type="text/css">
	<script src="/Public/js/template-native.js"></script>
	<script src="/Public/Tools/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="/Public/Tools/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

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

	<b class="line"></b>

	<div class="center">
		<div class="col-main">
			<div class="main-wrap">

				<div class="user-address">
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
					</div>
					<hr/>
					<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails" id="address-list">
						<?php if(is_array($data)): foreach($data as $key=>$address): if($address["status"] == 1): ?><li class="user-addresslist defaultAddr">
							<?php else: ?>
							<li class="user-addresslist"><?php endif; ?>
							<span class="new-option-r" ><i class="am-icon-check-circle" ></i>设为默认</span>
							
							<input type="hidden" value="<?php echo ($address['id']); ?>">
							<p class="new-tit new-p-re">
								<span class="new-txt"><?php echo ($address['recevier']); ?></span>
								<span class="new-txt-rd2"><?php echo ($address['phone']); ?></span>
							</p>
							<div class="new-mu_l2a new-p-re">
								<p class="new-mu_l2cw">
									<span class="title">地址：</span>
									<span class="province"><?php echo ($address['province']); ?></span>
									<span class="city"><?php echo ($address['town']); ?></span>
									<span class="dist"><?php echo ($address['area']); ?></span>
									<span class="street"><?php echo ($address['address']); ?></span></p>
							</div>
							<div class="new-addr-btn">
								<a href="#"><i class="am-icon-edit"></i>编辑</a>
								<span class="new-addr-bar">|</span>
								<a href="javascript:void(0);" id="<?php echo ($address['id']); ?>" onclick="deladdress(this);"><i class="am-icon-trash"></i>删除</a>
							</div>
						</li><?php endforeach; endif; ?>
					</ul>
					<div class="clear"></div>
					<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
					<!--例子-->
					<div class="am-modal am-modal-no-btn" id="doc-modal-1">

						<div class="add-dress">

							<!--标题 -->
							<div class="am-cf am-padding">
								<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
							</div>
							<hr/>

							<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
								<form class="am-form am-form-horizontal">

									<div class="am-form-group">
										<label for="user-name" class="am-form-label">收货人</label>
										<div class="am-form-content">
											<input type="text" id="recevier" placeholder="收货人">
										</div>
									</div>

									<div class="am-form-group">
										<label for="user-phone" class="am-form-label">手机号码</label>
										<div class="am-form-content">
											<input id="phone" placeholder="手机号必填" type="text">
										</div>
									</div>
									<div class="am-form-group">
										<label for="user-address" class="am-form-label">所在地</label>
										<div class="am-form-content address">
											<select  id="province" data-am-selected="{maxHeight: 200}">
												<option value="no" >请选择省份</option>
												
											</select>
											<select id="town" data-am-selected=	"{maxHeight: 200}">
												<option value="no" >请选择市</option>
												
											</select>
											<select id="area" data-am-selected=	"{maxHeight: 200}">
												<option value="no" >请选择区</option>
												
											</select>
										</div>
									</div>

									<div class="am-form-group">
										<label for="user-intro" class="am-form-label">详细地址</label>
										<div class="am-form-content">
											<textarea class="" rows="3" id="detail" placeholder="输入详细地址"></textarea>
											<small>100字以内写出你的详细地址...</small>
										</div>
									</div>

									<div class="am-form-group">
										<div class="am-u-sm-9 am-u-sm-push-3">
											<a class="am-btn am-btn-danger" id="save">保存</a>
											<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
										</div>
									</div>
								</form>
							</div>

						</div>

					</div>

				</div>

				<script type="text/javascript">
					$(document).ready(function() {							
						$(".new-option-r").click(function() {
							$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
						});
						
						var $ww = $(window).width();
						if($ww>640) {
							$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
						}
						
					})
				</script>

				<div class="clear"></div>

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
<script type="text/html" id="province-list">
	<%for(i=0;i<data.length;i++){%>
		<option value="<%=data[i].region_id%>"><%=data[i].name%></option>
	<%}%>
</script>
<script type="text/html" id="town-list">
	<%for(i=0;i<data.length;i++){%>
		<option value="<%=data[i].region_id%>"><%=data[i].name%></option>
	<%}%>
</script>
<script type="text/html" id="area-list">
	<%for(i=0;i<data.length;i++){%>
		<option value="<%=data[i].region_id%>"><%=data[i].name%></option>
	<%}%>
</script>
	<script src="/Public/js/editaddress.js"></script>	
	<script src="/Public/js/layer/layer.js"></script>
</body>

</html>