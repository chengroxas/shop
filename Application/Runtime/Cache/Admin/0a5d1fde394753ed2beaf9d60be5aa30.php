<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品规格</title>
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
			
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
								
                               
								</div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                            
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                                <th>排序数字</th>
                                                <th>二级类型</th>
                                                <th>状态</th>
                                                <th>上下架</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php if(is_array($types)): foreach($types as $key=>$types): ?><tr class="gradeX">
                                                <td class="am-text-middle"><?php echo ($types['num']); ?></td>
                                                <td class="am-text-middle"><?php echo ($types['types']); ?></td>
                                                <td class="am-text-middle">
													<?php if($types["status"] == 0 ): ?>未上架
													<?php elseif($types["status"] == 1 ): ?>
														已上架
													<?php else: ?>
														已下架<?php endif; ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
														<?php if($types["status"] == 1 ): ?><a id="<?php echo ($types['fid']); ?>" href="javascript:void(0);" class="offshelf tpl-table-black-operation-del">
                                                            <i class="am-icon-arrow-down"></i> 下架
														  </a>  
														<?php else: ?>
															<a id="<?php echo ($types['fid']); ?>" href="javascript:void(0);" class="onshelf" >
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
    <script src="/Public/Admin/js/typeslist.js"></script>
    <script src="/Public/js/layer/layer.js"></script>
    

</body>

</html>