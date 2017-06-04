<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>编辑商品</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />

<link rel="apple-touch-icon-precomposed" href="/Public/Admin/assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<script src="/Public/Admin/assets/js/echarts.min.js"></script>
<link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.min.css" />
<link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.datatables.min.css" />
<link rel="stylesheet" href="/Public/Admin/assets/css/app.css">
<link rel="stylesheet" href="/Public/Tools/php_img_upload/control/css/zyUpload.css" type="text/css">
<script src="/Public/Admin/assets/js/jquery.min.js"></script>
<script src="/Public/Tools/ueditor/ueditor.config.js"></script>
<script src="/Public/Tools/ueditor/ueditor.all.min.js"></script>
<script src="/Public/Tools/ueditor/lang/zh-cn/zh-cn.js"></script>
<style>
	input{font-size:18px;}
</style>
<script>
	option={
		initialFrameHeight:500,
		autoFloatEnabled:false,
		autoHeightEnabled:false,
		disabledTableInTable:true,
		allowDivTransToP:false,
		imageScaleEnabled:false,
		fontsize:36
	};
	var ue=new baidu.editor.ui.Editor(option);
	ue.render("editor");
</script>
</head>

<body data-type="widgets">
<script src="/Public/Admin/assets/js/theme.js"></script>
<div class="am-g tpl-g">
	<!-- 头部 -->
	<header>
            <!-- logo -->
            <div class="am-fl tpl-header-logo">
                <a href="javascript:;"><img src="/Public/images/logobig.png" alt=""></a>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">
                <!-- 侧边切换 -->
                <div class="am-fl tpl-header-switch-button am-icon-list">
                    <span>

                </span>
                </div>
                <!-- 搜索 -->
                <div class="am-fl tpl-header-search">
                    <form class="tpl-header-search-form" action="javascript:;">
                        <button class="tpl-header-search-btn am-icon-search"></button>
                        <input class="tpl-header-search-box" type="text" placeholder="搜索内容...">
                    </form>
                </div>
                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <a href="javascript:;">欢迎你, <span>Amaze UI</span> </a>
                        </li>

                        <!-- 新邮件 -->
                        <li class="am-dropdown tpl-dropdown" data-am-dropdown>
                            <a href="javascript:;" class="am-dropdown-toggle tpl-dropdown-toggle" data-am-dropdown-toggle>
                                <i class="am-icon-envelope"></i>
                                <span class="am-badge am-badge-success am-round item-feed-badge">4</span>
                            </a>
                            <!-- 弹出列表 -->
                            <ul class="am-dropdown-content tpl-dropdown-content">
                                <li class="tpl-dropdown-menu-messages">
                                    <a href="javascript:;" class="tpl-dropdown-menu-messages-item am-cf">
                                        <div class="menu-messages-ico">
                                            <img src="/Public/Admin/assets/img/user04.png" alt="">
                                        </div>
                                        <div class="menu-messages-time">
                                            3小时前
                                        </div>
                                        <div class="menu-messages-content">
                                            <div class="menu-messages-content-title">
                                                <i class="am-icon-circle-o am-text-success"></i>
                                                <span>夕风色</span>
                                            </div>
                                            <div class="am-text-truncate"> Amaze UI 的诞生，依托于 GitHub 及其他技术社区上一些优秀的资源；Amaze UI 的成长，则离不开用户的支持。 </div>
                                            <div class="menu-messages-content-time">2016-09-21 下午 16:40</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="tpl-dropdown-menu-messages">
                                    <a href="javascript:;" class="tpl-dropdown-menu-messages-item am-cf">
                                        <div class="menu-messages-ico">
                                            <img src="/Public/Admin/assets/img/user02.png" alt="">
                                        </div>
                                        <div class="menu-messages-time">
                                            5天前
                                        </div>
                                        <div class="menu-messages-content">
                                            <div class="menu-messages-content-title">
                                                <i class="am-icon-circle-o am-text-warning"></i>
                                                <span>禁言小张</span>
                                            </div>
                                            <div class="am-text-truncate"> 为了能最准确的传达所描述的问题， 建议你在反馈时附上演示，方便我们理解。 </div>
                                            <div class="menu-messages-content-time">2016-09-16 上午 09:23</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="tpl-dropdown-menu-messages">
                                    <a href="javascript:;" class="tpl-dropdown-menu-messages-item am-cf">
                                        <i class="am-icon-circle-o"></i> 进入列表…
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- 新提示 -->
                        <li class="am-dropdown" data-am-dropdown>
                            <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle>
                                <i class="am-icon-bell"></i>
                                <span class="am-badge am-badge-warning am-round item-feed-badge">5</span>
                            </a>

                            <!-- 弹出列表 -->
                            <ul class="am-dropdown-content tpl-dropdown-content">
                                <li class="tpl-dropdown-menu-notifications">
                                    <a href="javascript:;" class="tpl-dropdown-menu-notifications-item am-cf">
                                        <div class="tpl-dropdown-menu-notifications-title">
                                            <i class="am-icon-line-chart"></i>
                                            <span> 有6笔新的销售订单</span>
                                        </div>
                                        <div class="tpl-dropdown-menu-notifications-time">
                                            12分钟前
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="tpl-dropdown-menu-notifications">
                                    <a href="javascript:;" class="tpl-dropdown-menu-notifications-item am-cf">
                                        <i class="am-icon-bell"></i> 进入列表…
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="/Admin/Login/signOut">
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </header>

	<!-- 风格切换 -->
	<div class="tpl-skiner">
		<div class="tpl-skiner-toggle am-icon-cog">
		</div>
		<div class="tpl-skiner-content">
			<div class="tpl-skiner-content-title">
				选择主题
			</div>
			<div class="tpl-skiner-content-bar">
				<span class="skiner-color skiner-white" data-color="theme-white"></span>
				<span class="skiner-color skiner-black" data-color="theme-black"></span>
			</div>
		</div>
	</div>
	<!-- 侧边导航栏 -->
	 <div class="left-sidebar">
<!-- 用户信息 -->
<div class="tpl-sidebar-user-panel">
	<div class="tpl-user-panel-slide-toggleable">
		<div class="tpl-user-panel-profile-picture">
			<img src="/Public/Admin/assets/img/user04.png" alt="">
		</div>
		<span class="user-panel-logged-in-text">
		  <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
		  <?php echo (session('manger')); ?>
		</span>
		<a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
	</div>
</div>

<!-- 菜单 -->
 <ul class="sidebar-nav">
			<li class="sidebar-nav-heading">Components<span class="sidebar-nav-heading-info"> 附加组件</span></li>
			<li class="sidebar-nav-link">
				<a href="/Admin/Index/index" >
					<i class="am-icon-home sidebar-nav-link-logo"></i> 首页
				</a>
			</li>
			<li class="sidebar-nav-link">
				<a href="javascript:;"  class="sidebar-nav-sub-title">
					<i class="am-icon-wpforms sidebar-nav-link-logo"></i> 类型管理
					<span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
				<ul class="sidebar-nav sidebar-nav-sub">
					<li class="sidebar-nav-link">
						<a href="/Admin/Goods/types">
							<span class="am-icon-angle-right sidebar-nav-link-logo"></span> 类型列表
						</a>
					</li>
					<li class="sidebar-nav-link">
						<a href="/Admin/Goods/typesform">
							<span class="am-icon-angle-right sidebar-nav-link-logo"></span> 新增一级类型
						</a>
					</li>
				</ul>
			</li>
			<li class="sidebar-nav-link">
				<a href="/Admin/Goods/goods">
					<i class="am-icon-wpforms sidebar-nav-link-logo"></i> 商品管理
				</a>
			</li>
			<li class="sidebar-nav-link">
				<a href="/Admin/Order/index">
					<i class="am-icon-wpforms sidebar-nav-link-logo"></i> 订单管理
				</a>
			</li>
			<?php if($_SESSION['level']== 1): ?><li class="sidebar-nav-link">
				<a href="/Admin/Manger/index">
					<i class="am-icon-wpforms sidebar-nav-link-logo"></i> 管理员管理
				</a>
			</li>
			<li class="sidebar-nav-link">
				<a href="/Admin/Login/regist">
					<i class="am-icon-clone sidebar-nav-link-logo"></i> 注册新管理员
					<span class="am-badge am-badge-secondary sidebar-nav-link-logo-ico am-round am-fr am-margin-right-sm"></span>
				</a>
			</li>
			<li class="sidebar-nav-link">
				<a href="/Admin/Login/login">
					<i class="am-icon-key sidebar-nav-link-logo"></i> 登录
				</a>
			</li><?php endif; ?>
			<!---<li class="sidebar-nav-link">
				<a href="javascript:;" class="sidebar-nav-sub-title">
					<i class="am-icon-table sidebar-nav-link-logo"></i> 消息列表
					<span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
				<ul class="sidebar-nav sidebar-nav-sub">
					<li class="sidebar-nav-link">
						<a href="table-list.html">
							<span class="am-icon-angle-right sidebar-nav-link-logo"></span> 订单列表
						</a>
					</li>

					<li class="sidebar-nav-link">
						<a href="table-list-img.html">
							<span class="am-icon-angle-right sidebar-nav-link-logo"></span> 留言列表
						</a>
					</li>
				</ul>
			</li>---->
			
			
			<li class="sidebar-nav-link">
				<a href="404.html">
					<i class="am-icon-tv sidebar-nav-link-logo"></i> 404错误
				</a>
			</li>

		</ul>
		</div>


	<!-- 内容区域 -->
	<div class="tpl-content-wrapper">

		<div class="container-fluid am-cf">
			<div class="row">
				<div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
					<div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 编辑商品 <small>Orange lala</small></div>
					<p class="page-header-description">请按要求填写商品信息</p>
				</div>
				<div class="am-u-lg-3 tpl-index-settings-button">
					<button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置</button>
				</div>
			</div>

		</div>

		<div class="row-content am-cf">

			<div class="row">

				<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
					<div class="widget am-cf">
						<div class="widget-head am-cf">
							<div class="widget-title am-fl">商品普通信息</div>
						</div>
						<div class="widget-body am-fr">

							<form class="am-form tpl-form-border-form tpl-form-border-br">
								
								<div class="am-form-group">
									<label for="goods-type" class="am-u-sm-3 am-form-label">商品一级类型<span class="tpl-form-line-small-title">*必选</span></label>
									<div class="am-u-sm-9">
										<select data-am-selected="{btnSize: 'sm'}" id="ftype" style="display: none;">
										  <option value="no">请选择一级类型</option>
										  <?php if(is_array($data)): foreach($data as $key=>$ftype): ?><option value="<?php echo ($ftype['fid']); ?>"><?php echo ($ftype['types']); ?></option><?php endforeach; endif; ?>
										</select>
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="goods-type" class="am-u-sm-3 am-form-label">商品二级类型<span class="tpl-form-line-small-title">*必选</span></label>
									<div class="am-u-sm-3">
										<select data-am-selected="{btnSize: 'sm'}" id="stype" style="display: none;">
										  <option value="no">请选择二级类型</option>
										  
										</select>
									</div>
									<div class="am-u-sm-6">
										<label for="goods-type" class="am-u-sm-3 am-form-label">没有想要的?</label>
										<a class="am-btn am-btn-secondary" href="/Admin/Goods/typesform">添加</a>
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="goods-name" class="am-u-sm-3 am-form-label">商品品牌 <span class="tpl-form-line-small-title">*必填</span></label>
									<div class="am-u-sm-9">
										<input type="text" class="tpl-form-input" id="brand" placeholder="请输入商品品牌">
										<small></small>
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="goods-name" class="am-u-sm-3 am-form-label">商品名称 <span class="tpl-form-line-small-title">*必填</span></label>
									<div class="am-u-sm-9">
										<input type="text" class="tpl-form-input" id="name" placeholder="请输入商品名称">
										<small></small>
									</div>
								</div>
								
								<div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">搜索关键字 <span class="tpl-form-line-small-title">*必填</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" id="keyword" placeholder="输入搜索关键字">
                                            <small>关键字将会影响客户对产品的搜索</small>
                                        </div>
                                </div>
								
								<div class="am-form-group">
									<label for="goods-name" class="am-u-sm-3 am-form-label">商品默认价格 <span class="tpl-form-line-small-title">*必填</span></label>
									<div class="am-u-sm-9">
										<input type="text" class="tpl-form-input" id="demo-price" placeholder="请输入商品价格">
										<small></small>
									</div>
								</div>
								
								<div class="am-form-group" >
									<label for="goods-price" class="am-u-sm-3 am-form-label">商品规格 <span class="tpl-form-line-small-title">*必填</span></label>
									<div class="am-u-sm-3">
										<input type="text" class="tpl-form-input"  name="format" id="flavor" placeholder="请输入口味,没有默认原味">
									</div>
									<div class="am-u-sm-3">
										<input type="text" class="tpl-form-input" name="format" id="price" placeholder="请输入商品价格*必填">
									</div>
									<div class="am-u-sm-3">
										<input type="text" class="tpl-form-input" name="format" id="stock" placeholder="请输入商品库存*必填">
									</div>
								</div>
								
								
								<div class="am-form-group"  id="format">
									<label for="goods-price" class="am-u-sm-3 am-form-label">更多规格 <span class="tpl-form-line-small-title">选填</span></label>
									<div class="am-u-sm-9">
										<button type="button" id="more" class="am-btn am-btn-secondary">更多</button>
									</div>
								</div>

								<div class="am-form-group">
									<label for="goods-cover" class="am-u-sm-3 am-form-label">商品封面图 <span class="tpl-form-line-small-title">必选</span></label>
									<div class="am-u-sm-9">
										<div class="am-form-group am-form-file">
											
											<button type="button" class="am-btn am-btn-danger am-btn-sm">
												<i class="am-icon-cloud-upload"></i> 添加封面图片</button>
											<input id="doc-form-file" type="file" multiple="">
											<div class="tpl-form-file-img" id="goods-cover">
												<img  src="" alt="">
												<input type="hidden" id="cover" >
											</div>
										</div>
									</div>
								</div>
								
								
							<div class="am-form-group ">
								<label for="introduce"  class="am-u-sm-3 am-form-label">图片展示	</label>
								<div class="am-u-sm-9">
									<button type="button"  class="am-btn am-btn-danger am-btn-sm"  data-am-modal="{target: '#doc-modal-1', closeViaDimmer: false, width: 400, height: 225}">
										<i class="am-icon-cloud-upload"></i> 选择要上传的文件
									</button>
								</div>
							</div>
							
							<div class="am-form-group ">
								<label for="introduce"  class="am-u-sm-3 am-form-label">图片预览</label>
								<div class="am-u-sm-9" id="img-box">
									
								</div>
							</div>
							
			
						<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
							  <div id="demo" class="am-modal-dialog">
									<div class="am-modal-hd">
										文件上传
									  <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
									</div>
									<div class="am-modal-bd" >
									</div>
							  </div>
							</div>
								
								
								 <div class="widget-head am-cf" style="margin-bottom:20px;">
									<div class="widget-title am-fl">商品详细介绍	</div>
								</div>
								
								<div class="am-form-group">
									<label for="user-intro" class="am-u-sm-2 am-form-label">商品参数</label>
									<div class="am-u-sm-10">
										<textarea class=""  rows="10" id="param" placeholder="请输入参数如  产地:东莞  参数间用逗号隔开"></textarea>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-intro" class="am-u-sm-1 am-form-label">内容</label>
									<div class="am-u-sm-11">
										<textarea class="content"  rows="10" id="editor" placeholder="请输入文章内容"></textarea>
									</div>
								</div>

								<div class="am-form-group">
									<div class="am-u-sm-9 am-u-sm-push-3">
										<button type="button" id="add" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
<script type="text/html" id="stype-list">
	<%for(i = 0;i<data.length;i++){%>
		<option value="<%=data[i].fid%>"><%=data[i].types%></option>
	<%}%>
</script>
<script type="text/html" id="more-list">
	<div class="am-form-group" id="new-format">
		<label for="goods-price" class="am-u-sm-3 am-form-label">规格 <span class="tpl-form-line-small-title" onclick="delformat(this)"><i class="am-icon-close"></i></span></label>
		<div class="am-u-sm-3">
			<input type="text" class="tpl-form-input"  name="format" id="flavor" placeholder="请输入口味,没有默认原味">
		</div>
		<div class="am-u-sm-3">
			<input type="text" class="tpl-form-input" name="format" id="price" placeholder="请输入商品价格*必填">
		</div>
		<div class="am-u-sm-3">
			<input type="text" class="tpl-form-input" name="format" id="stock" placeholder="请输入商品库存*必填">
		</div>
	</div>
</script>   
<script>
	 
	$('').click(function(){
		var obj=$("input[name='format']");
		var a='' ;
		obj.each(function(index){
			if(index%3==2){
				a += $(this).attr('id')+':'+$(this).val()+'/';
			}else{
				a += $(this).attr('id')+':'+$(this).val()+',';
			}
		})
		$.post(
			"/Api/Goods/guige",
			{"format":a},
			function(ret){
			}
		)
	})
</script>
<script src="/Public/js/template-native.js"></script>
<script src="/Public/Admin/assets/js/amazeui.min.js"></script>
<script src="/Public/Admin/assets/js/amazeui.datatables.min.js"></script>
<script src="/Public/Admin/assets/js/dataTables.responsive.min.js"></script>
<script src="/Public/Admin/assets/js/app.js"></script>
<script src="/Public/Admin/js/goodsform.js"></script>
<script src="/Public/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Tools/php_img_upload/core/zyFile.js"></script>
<script type="text/javascript" src="/Public/Tools/php_img_upload/control/js/zyUpload.js"></script>


</body>

</html>