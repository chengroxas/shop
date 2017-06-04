<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Orange后台登录</title>
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

</head>

<body class="theme-white" data-type="login">
    <script src="/Public/Admin/assets/js/theme.js"></script>
    <div class="am-g tpl-g">
       
        <div class="tpl-login">
            <div class="tpl-login-content">
                <div class="tpl-login-logo">

                </div>
                <form class="am-form tpl-form-line-form">
                    <div class="am-form-group">
                        <input type="text" class="tpl-form-input" id="manger" placeholder="请输入账号">

                    </div>

                    <div class="am-form-group">
                        <input type="password" class="tpl-form-input" id="pwd" placeholder="请输入密码">

                    </div>
                    <div class="am-form-group tpl-login-remember-me">
                        <input id="remember-me" type="checkbox">
                        <label for="remember-me">
       
                        记住密码
                         </label>

                    </div>
                    <div class="am-form-group">

                        <button type="button" id="login" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/Public/Admin/assets/js/amazeui.min.js"></script>
    <script src="/Public/Admin/assets/js/app.js"></script>
	<script src="/Public/Admin/js/login.js"></script>
	<script src="/Public/js/layer/layer.js"></script>
</body>

</html>