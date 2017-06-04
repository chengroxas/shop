<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑新闻</title>
<script src="/Public/Admin/assets/js/jquery.min.js"></script>
<script src="/Public/Tools/ueditor/ueditor.config.js"></script>
<script src="/Public/Tools/ueditor/ueditor.all.min.js"></script>
<script src="/Public/Tools/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
	var ue=UE.getEditor('editor');
</script>
</head>

<body>

<textarea id="editor" name="cnt"></textarea>

</body>
</html>