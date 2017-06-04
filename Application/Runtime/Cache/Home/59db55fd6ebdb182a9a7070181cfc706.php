<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/Public/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/Public/css/optstyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/Public/js/template-native.js" ></script>
		<script type="text/javascript" src="/Public/js/jquery.js"></script>
		
		<script type="text/javascript" src="/Public/js/shopcart.js"></script>
		<script type="text/javascript" src="/Public/js/layer/layer.js"></script>
		
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


			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<?php if(is_array($data)): foreach($data as $key=>$row): ?><tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="bundle-hd">
								<div class="bd-promos">
									<div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;</div>
									<div class="act-promo">
										<a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div>
							<div class="clear"></div>
							<div class="bundle-main">
								<?php if(is_array($row["goods"])): foreach($row["goods"] as $key=>$goods): ?><ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" id="J_CheckBox_<?php echo ($goods['id']); ?>" name="items[]" value="<?php echo ($goods['id']); ?>" type="checkbox">
											<label for="J_CheckBox_<?php echo ($goods['id']); ?>"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="/Home/Goods/introduce?goodspid=<?php echo ($goods['pid']); ?>"  data-title="<?php echo ($goods['itemname']); ?>" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="<?php echo ($row['cover']); ?>" style="width:80px;" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="/Home/Goods/introduce?goodspid=<?php echo ($goods['pid']); ?>"  title="<?php echo ($goods['itemname']); ?>" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo ($goods['itemname']); ?></a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">口味：<?php echo ($goods['flavor']); ?></span>
							
											<span tabindex="<?php echo ($goods['pid']); ?>" class="btn-edit-sku theme-login">修改</span>
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<!---<div class="price-line">
													<em class="price-original">78.00</em>
												</div>--->
												<div class="price-line">
													￥
													<em class="J_Price price-now" tabindex="<?php echo ($key); ?>"><?php echo ($goods['price']); ?></em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input id="min" class="am-btn am-btn-default" onclick="reduceNum(this)" name="" type="button" value="-" />
													<input id="text_box" name="" type="text" value="<?php echo ($goods['nums']); ?>" style="width:30px;" />
													<input id="add" class="am-btn am-btn-default" onclick="addNum(this)" name="" type="button" value="+" />
													<!----<input class="min am-btn" name="" onclick="reduceNum(this)" type="button" value="-" />
													<input class="text_box" name="" type="text" value="<?php echo ($goods['nums']); ?>" style="width:30px;" />
													<input class="add am-btn" name="" onclick="addNum(this)" type="button" value="+" />---->
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											￥
											<em tabindex="<?php echo ($key); ?>" class="J_ItemSum number am-text-sm"><?php echo ($goods['price']*$goods['nums']); ?></em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a title="移入收藏夹" class="btn-fav" href="#">
												移入收藏夹</a>
											<a href="javascript:;" id="<?php echo ($goods['id']); ?>" onclick="delItem(this)" data-point-url="#" class="delete">
												删除</a>
										</div>
									</li>
								</ul><?php endforeach; endif; ?>
							</div>
						</div>
					</tr>
					<div class="clear"></div><?php endforeach; endif; ?>
					

					
				

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="operations">
						<a href="#" hidefocus="true" class="deleteAll">删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="totalnum">0</em><span class="txt" >件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="total" class="am-text-lg" >0.00</em></strong>
						</div>
						<div id="paycart" class="btn-area">
							<a href="javascript:void(0);"  class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
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

			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			<div class="theme-popover">
				<div class="theme-span"></div>
				<div class="theme-poptit h-title">
					<a href="javascript:;" title="关闭" class="close">×</a>
				</div>
				<div class="theme-popbod dform">
					<form class="theme-signin" name="loginform" action="" method="post">

						<div class="theme-signin-left">

							<li class="theme-options">
								<div class="cart-title">口味：</div>
								<ul class="format-list">
									
								</ul>
							</li>
							<div class="theme-options">
								<div class="cart-title number">数量</div>
								<dd>
									<input class="min am-btn am-btn-default" name="" type="button" value="-" />
									<input class="text_box" name="" type="text" value="1" style="width:30px;" />
									<input class="add am-btn am-btn-default" name="" type="button" value="+" />
									<span  class="tb-hidden">库存<span class="stock"></span>件</span>
								</dd>

							</div>
							<div class="clear"></div>
							<div class="btn-op">
								<div class="btn sure am-btn am-btn-warning">确认</div>
								<div class="btn close am-btn am-btn-warning">取消</div>
							</div>

						</div>
						<div class="theme-signin-right">
							<div class="img-info">
								<img src="" />
							</div>
							<div class="text-info">
								<span class="price-now">¥</span>
								<span class="formatprice price-now">39</span>
							</div>
						</div>

					</form>
				</div>
			</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="/Home/Index/index"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="/Home/User/index"><i class="am-icon-user"></i>我的</a></li>					
</div>

		
		
		
		
			
				
			
	</body>

</html>