<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>查看回复</title>
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
                            
                            <div class="widget-body  am-fr">
                        
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <tbody>
											<tr class="gradeX">
                                                <td class="am-text-middle">买家(昵称):</td>
                                                <td class="am-text-middle"><?php echo ($comment['user']['nickname']); ?></td>
                                            </tr>
                                            <tr class="gradeX">
                                                <td class="am-text-middle">订单号:</td>
                                                <td class="am-text-middle"><?php echo ($comment['ordernum']); ?></td>
                                            </tr>
                                            <tr class="gradeX">
                                                <td class="am-text-middle">商品货号:</td>
                                                <td class="am-text-middle"><?php echo ($comment['goods']['goodsid']); ?></td>
                                            </tr>
                                            <tr class="gradeX">
                                                <td class="am-text-middle">商品名称:</td>
                                                <td class="am-text-middle"><?php echo ($comment['goods']['itemname']); ?></td>
                                            </tr>
                                            <tr class="gradeX">
                                                <td class="am-text-middle">商品规格:</td>
                                                <td class="am-text-middle"><?php echo ($comment['goods']['flavor']); ?></td>
                                            </tr>
                                            <tr class="gradeX">
                                                <td class="am-text-middle">评论内容:</td>
                                                <td class="am-text-middle"><?php echo ($comment['content']); ?></td>
                                            </tr>
                                            <tr class="gradeX">
                                                <td class="am-text-middle">评论时间:</td>
                                                <td class="am-text-middle"><?php echo (date("n-d H:i:s",$comment['time'])); ?></td>
                                            </tr>
                                            <tr class="gradeX">
                                                <td class="am-text-middle">卖家回复:</td>
                                                <td class="am-text-middle">
													<?php if($comment["reply"] == '' ): ?>暂无回复
													<?php else: ?>
														<?php echo ($comment['reply']['content']); endif; ?>
													
												</td>
                                            </tr>
                                            <!-- more data -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="am-u-lg-12 am-cf">
									<?php if($_SESSION['level']== 0): ?><div class="am-form-group">
									  <label for="doc-ta-1">回复评论:</label>
									  <textarea  rows="3" cols="70" id="content"></textarea>
									</div>
									
                                    <div class="am-fr">
                                        <button id="reply" title="<?php echo ($comment['id']); ?>" type="button" class="am-btn am-btn-success">回复</button>
                                    </div><?php endif; ?>
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
    <script src="/Public/Admin/js/comment.js"></script>
    <script src="/Public/js/layer/layer.js"></script>
</body>

</html>