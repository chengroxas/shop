$(function(){
	$('.view').on('click',function(){
		var ordernum = $(this).attr('id');
		layer.open({
			type: 2,
			title: '订单详情',
			maxmin: true,
			shadeClose: true, //点击遮罩关闭层
			area : ['800px' , '520px'],
			content: '/Admin/Order/detail?ordernum='+ordernum
		});
	});
	$('.comment').on('click',function(){
		var ordernum = $(this).attr('id');
		layer.open({
			type: 2,
			title: '查看评论',
			maxmin: true,
			shadeClose: true, //点击遮罩关闭层
			area : ['800px' , '600px'],
			content: '/Admin/Order/comment?ordernum='+ordernum
		});
	});
	$('.send').on('click',function(){
		var ordernum = $(this).attr('id');
		$.post(
			"/Api/Order/send",
			{"ordernum":ordernum},
			function(ret){
				if( ret.status == true ){
					layer.open({
						title: '信息',
						content: '已经发货',
						time: 1000,
						success:function(){
							setTimeout(function(){
								location.reload();
							},1000);
						}
					});
				}else{
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time:1000
					});
				}
			});
	});
})
