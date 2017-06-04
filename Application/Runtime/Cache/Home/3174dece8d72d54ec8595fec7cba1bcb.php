<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>商品页面</title>

		<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/Public/Tools/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link type="text/css" href="/Public/css/optstyle.css" rel="stylesheet" />
		<link type="text/css" href="/Public/css/style.css" rel="stylesheet" />

		<script type="text/javascript" src="/Public/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/Public/basic/js/quick_links.js"></script>

		<script type="text/javascript" src="/Public/Tools/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.imagezoom.min.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.flexslider.js"></script>
		
		<script type="text/javascript" src="/Public/js/introduce.js"></script>
		<script type="text/javascript" src="/Public/js/list.js"></script>
		<script type="text/javascript" src="/Public/js/layer/layer.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.fly.min.js"></script>
		<style>
			.twlistNews p{text-align:left;font-size:18px;}
			
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
			<div class="listMain">

				<!--分类-->
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

				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="#">首页</a></li>
					<li><a href="#">分类</a></li>
					<li class="am-active">内容</li>
				</ol>
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<?php if(is_array($goods['imgs'])): foreach($goods['imgs'] as $key=>$imgs): ?><li>
									<img src="<?php echo ($imgs); ?>" title="pic" />
								</li><?php endforeach; endif; ?>

							</ul>
						</div>
					</section>
				</div>

				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").mouseover(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>

							<div class="tb-booth tb-pic tb-s310">
								<a href="<?php echo ($goods['imgs'][0]); ?>"><img src="<?php echo ($goods['imgs'][0]); ?>" alt="细节展示放大镜特效" rel="<?php echo ($goods['imgs'][0]); ?>" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
								<?php if(is_array($goods['imgs'])): foreach($goods['imgs'] as $key=>$imgs): ?><li>
									<div class="tb-pic tb-s40">
										<a href="#"><img src="<?php echo ($imgs); ?>" mid="<?php echo ($imgs); ?>" big="<?php echo ($imgs); ?>"></a>
									</div>
								</li><?php endforeach; endif; ?>
							</ul>
						</div>
						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						
						<!--名称-->
						<div class="tb-detail-hd">
							  <h1>	
								 <?php echo ($goods["name"]); ?>
							  </h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								
								<li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_price" id="price"><?php echo ($goods['format'][0]['price']); ?></b></dd>									
								</li>
								<div class="clear"></div>
							</div>

							<!--地址-->
							<dl class="iteminfo_parameter freight">
								<dt>配送至</dt>
								<div class="iteminfo_freprice">
									<div class="am-form-content address">
										<select data-am-selected>
											<option value="a">浙江省</option>
											<option value="b">湖北省</option>
										</select>
										<select data-am-selected>
											<option value="a">温州市</option>
											<option value="b">武汉市</option>
										</select>
										<select data-am-selected>
											<option value="a">瑞安区</option>
											<option value="b">洪山区</option>
										</select>
									</div>
									<div class="pay-logis">
										快递<b class="sys_item_freprice">10</b>元
									</div>
								</div>
							</dl>
							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">
								<li class="tm-ind-item tm-ind-sellCount canClick">
									<div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">1015</span></div>
								</li>
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count"><?php echo ($goods['sales']); ?></span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count"><?php echo ($count['all']); ?></span></div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="" method="post">

												<div class="theme-signin-left">

													<div class="theme-options">
														<div class="cart-title">口味</div>
														<ul id="cate">
															<?php if(is_array($goods['format'])): foreach($goods['format'] as $key=>$format): if($key == 0): ?><li class="sku-line selected" onclick="selformat(this)" id="<?php echo ($format['goodsid']); ?>" ><?php echo ($format['flavor']); ?><i></i></li>
																<?php else: ?>
																	<li class="sku-line" onclick="selformat(this)" id="<?php echo ($format['goodsid']); ?>" ><?php echo ($format['flavor']); ?><i></i></li><?php endif; endforeach; endif; ?>
															
														</ul>
													</div>
													
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_box" name="" type="text" value="1" style="width:30px;" />
															<input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stock" class="tb-hidden">库存<span class="stock" id="stock"><?php echo ($goods['format'][0]['stock']); ?></span>件</span>
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
														<img src="/Public/images/songzi.jpg" />
													</div>
													<div class="text-info">
														<span class="J_Price price-now">¥39.00</span>
														<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
													</div>
												</div>

											</form>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">店铺优惠</dt>
									<div class="gold-list">
										<p>购物满2件打8折，满3件7折<span>点击领券<i class="am-icon-sort-down"></i></span></p>
									</div>
								</div>
								<div class="clear"></div>
								<div class="coupon">
									<dt class="tb-metatit">优惠券</dt>
									<div class="gold-list">
										<ul>
											<li>125减5</li>
											<li>198减10</li>
											<li>298减20</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="pay">
							
							<li>
								<div class="clearfix tb-btn  theme-login" >
								<a id="collect" class="am-icon-heart am-icon" style="background-color:yellow;border-color:none;">收藏</a>
								</div>
							</li>
							<li>
								
								<div class="clearfix tb-btn  theme-login" >
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="javascript:void(0);">立即购买</a>
								</div>
							</li>
							
							<li>
								<img src="/Public/images/cart.jpg " style="width:50px;display:none" />
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket" title="加入购物车" href="javascript:void(0);"><i></i>加入购物车</a>
								</div>
							</li>
						</div>

					</div>

					<div class="clear"></div>

				</div>

				<!--优惠套装-->
				<div class="match">
					<div class="match-title">优惠套装</div>
					<div class="match-comment">
						<ul class="like_list">
							<li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="/Public/images/cp.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">萨拉米 1+1小鸡腿</a>
								<div class="info-box"> <span class="info-box-price">¥ 29.90</span> <span class="info-original-price">￥ 199.00</span> </div>
							</li>
							<li class="plus_icon"><i>+</i></li>
							<li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="/Public/images/cp2.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">ZEK 原味海苔</a>
								<div class="info-box"> <span class="info-box-price">¥ 8.90</span> <span class="info-original-price">￥ 299.00</span> </div>
							</li>
							<li class="plus_icon"><i>=</i></li>
							<li class="total_price">
								<p class="combo_price"><span class="c-title">套餐价:</span><span>￥35.00</span> </p>
								<p class="save_all">共省:<span>￥463.00</span></p> <a href="#" class="buy_now">立即购买</a> </li>
							<li class="plus_icon"><i class="am-icon-angle-right"></i></li>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
				
							
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     <ul>					    
						     	<div class="mt">            
						            <h2>该商家的其它产品</h2>        
					            </div>
					            <?php if(is_array($other)): foreach($other as $key=>$others): ?><li>
							      	<div class="p-img">                    
							      		<a  href="/Home/Goods/introduce?pid=<?php echo ($others['pid']); ?>&goodspid=<?php echo ($others['id']); ?>"> <img class="" src="<?php echo ($others['cover']); ?>"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		<?php echo ($others['name']); ?>
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥<?php echo ($others['price']); ?></strong></div>
							      </li><?php endforeach; endif; ?>
						     </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active">
									<a href="#">
									<span class="index-needs-dt-txt">宝贝详情</span></a>
								</li>
								<li>
									<a href="#">
									<span class="index-needs-dt-txt">全部评价</span></a>
								</li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active">
									<div class="J_Brand">
										<div class="attr-list-hd tm-clear">
											<h4>产品参数：</h4></div>
										<div class="clear"></div>
										<ul id="J_AttrUL">
											<?php echo htmlspecialchars_decode($goods['param']);?>
										</ul>
										<div class="clear"></div>
									</div>
									
									<div class="details">
										<div class="attr-list-hd after-market-hd">
											<h4>商品细节</h4>
										</div>
										<div class="twlistNews">
											<?php echo ($goods['detail']); ?>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="am-tab-panel am-fade">
									
                                   <!---- <div class="actor-new">
                                    	<div class="rate">                
                                    		<strong>100<span>%</span></strong><br> <span>好评度</span>            
                                    	</div>
                                        <dl>                    
                                            <dt>买家印象</dt>                    
                                            <dd class="p-bfc">
                                            			<q class="comm-tags"><span>味道不错</span><em>(2177)</em></q>
                                            			<q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q>
                                            			<q class="comm-tags"><span>口感好</span><em>(1823)</em></q>
                                            			<q class="comm-tags"><span>商品不错</span><em>(1689)</em></q>
                                            			<q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q>
                                            			<q class="comm-tags"><span>个个开口</span><em>(1392)</em></q>
                                            			<q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q>
                                            			<q class="comm-tags"><span>特价买的</span><em>(865)</em></q>
                                            			<q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
                                            </dd>                                           
                                         </dl> 
                                    </div>	----->
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>全部评价</span>
													<span class="tb-tbcr-num">(<?php echo ($count['all']); ?>)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-1">
												<div class="comment-info">
													<span>好评</span>
													<span class="tb-tbcr-num">(<?php echo ($count['good']); ?>)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-0">
												<div class="comment-info">
													<span>中评</span>
													<span class="tb-tbcr-num">(<?php echo ($count['middle']); ?>)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li--1">
												<div class="comment-info">
													<span>差评</span>
													<span class="tb-tbcr-num">(<?php echo ($count['bad']); ?>)</span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<ul class="am-comments-list am-comments-list-flip">
										<?php if($comment == null): ?><p>此商品暂无评论</p><?php endif; ?>
										<?php if(is_array($comment)): foreach($comment as $key=>$comment): ?><li class="am-comment">
											<!-- 评论容器 -->
											<a href="#">
												<img class="am-comment-avatar" src="<?php echo ($comment['userlogo']); ?>" />
												<!-- 评论者头像 -->
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#" class="am-comment-author"><?php echo ($comment['nickname']); ?></a>
														<!-- 评论者 -->
														评论于
														<time datetime=""><?php echo (date("Y-m-d H:i:s",$comment['time'])); ?></time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															<?php echo ($comment['content']); ?>
														</div>
														<div class="tb-r-act-bar">
															口味:<?php echo ($comment['flavor']); ?>
														</div>
													</div>
													<?php if($comment["reply"] == '' ): else: ?>
													<div class="am-comment-bd">
													  <blockquote>商家回复:<?php echo ($comment['reply']['content']); ?></blockquote>
													</div><?php endif; ?>
													
												</div>
												<!-- 评论内容 -->
											</div>
										</li><?php endforeach; endif; ?>
										
										
									</ul>

									<div class="clear"></div>

									<!--分页 -->
									<ul id="page" class="am-pagination am-pagination-right">
										<?php echo ($links); ?>
									</ul>
									
									<div class="clear"></div>

									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div>

								</div>


							</div>
							
						</div>

						<div class="clear"></div>
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


	</body>

</html>