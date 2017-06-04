<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="apple-touch-icon-precomposed" href="/Public/Admin/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/app.css">
    <script src="/Public/Admin/assets/js/jquery.min.js"></script>
	<style>
		.am-selected{width:125px;}
	</style>
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
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">商品列表</div>


                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-3 am-u-lg-3">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="/Admin/Goods/goodsform" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-2">
                                    <div class="am-form-group tpl-table-list-select">
                                        <select data-am-selected="{btnSize: 'sm'}">
										  <option value="no">一级类型</option>
										  <?php if(is_array($ftype)): foreach($ftype as $key=>$ftype): ?><option value="<?php echo ($ftype['fid']); ?>"><?php echo ($ftype['types']); ?></option><?php endforeach; endif; ?>
										</select>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-2">
                                    <div class="am-form-group tpl-table-list-select">
                                        <select data-am-selected="{btnSize: 'sm'}">
										  <option value="no">二级类型</option>
										  
										</select>
                                    </div>
                                </div>
                                
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        <input type="text" class="am-form-field ">
                                        <span class="am-input-group-btn">
											<button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>
										  </span>
                                    </div>
                                </div>

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                                <th>一级类型</th>
                                                <th>二级类型</th>
                                                <th>商家</th>
                                                <th>商品名称</th>
												<th>状态</th>	
                                                <th>规格</th>
                                                <th>上下架</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php if(is_array($data)): foreach($data as $key=>$goods): ?><tr class="gradeX">
                                                <td class="am-text-middle"><?php echo ($goods['ftype']); ?></td>
                                                <td class="am-text-middle"><?php echo ($goods['stype']); ?></td>
                                                <td class="am-text-middle"><?php echo ($goods['seller']); ?></td>
                                                <td class="am-text-middle"><?php echo ($goods['name']); ?></td>
                                                <td class="am-text-middle">
													<?php if($goods["status"] == 0 ): ?>未上架
													<?php elseif($goods["status"] == 1 ): ?>
														已上架
													<?php else: ?>
														已下架<?php endif; ?>	
													
												</td>
                                                 <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a id="<?php echo ($goods['id']); ?>"  title="<?php echo ($goods['name']); ?>" class="view">
                                                            <i class="am-icon-eye"></i> 查看
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
														<?php if($goods["status"] == 1): ?><a  href="javascript:void(0);" id="<?php echo ($goods['id']); ?>" onclick="offshelf(this)" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-arrow-down"></i> 下架
                                                        </a>
                                                        <?php else: ?>
                                                         <a href="javascript:void(0);" id="<?php echo ($goods['id']); ?>" onclick="onshelf(this)">
                                                            <i class="am-icon-arrow-up"></i> 上架
                                                        </a><?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr><?php endforeach; endif; ?>
                                            
                                            
                                            <!-- more data -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">
                                           <!--- <li class="am-disabled"><a href="#">«</a></li>
                                            <li class="am-active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">»</a></li>--->
                                            <?php echo ($links); ?>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="/Public/Admin/assets/js/amazeui.min.js"></script>
    <script src="/Public/Admin/assets/js/app.js"></script>
    <script src="/Public/js/layer/layer.js"></script>
    <script src="/Public/Admin/js/goods.js"></script>
<script>
	
</script>
</body>

</html>