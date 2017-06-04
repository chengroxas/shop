$(function(){
	$('#reply').click(function(){
		var content = $('#content').val();
		var pid = $(this).attr('title');
		$.post(
			"/Api/Order/reply",
			{"content":content,"pid":pid},
			function(ret){
				if(ret.status==true){
					layer.open({
						title: '信息',
						content: '评论回复成功',
						time:1000
					});
				}else{
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time:1000
					});
				}
			}
		)
	});
})
