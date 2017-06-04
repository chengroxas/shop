$(function(){
	
	$('.onshelf').on('click',function(){
		var fid = $(this).attr('id');
		$.post(
			"/Api/Types/onshelf",
			{"fid":fid},
			function(ret){
				if(ret.status==false){
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time: 2000,
						scrollbar: false
					});
				}else{
					layer.open({
						title: '信息',
						content: '成功上架',
						time: 2000,
						scrollbar: false,
						success:function(){
							setTimeout(function(){
								window.location.reload();
							},1000)
						}
					});
				}
			}
		)
	});
	
	$('.offshelf').on('click',function(){
		var fid = $(this).attr('id');
		$.post(
			"/Api/Types/offshelf",
			{"fid":fid},
			function(ret){
				if(ret.status==false){
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time: 2000,
						scrollbar: false
					});
				}else{
					layer.open({
						title: '信息',
						content: '成功下架',
						time: 2000,
						scrollbar: false,
						success:function(){
							setTimeout(function(){
								window.location.reload();
							},1000)
						}
					});
				}
			}
		)
	});
	
	
	$('.view').on('click',function(){
		var fid = $(this).attr('id');
		var name = $(this).attr('title');	
		layer.open({
			  type: 2,
			  title: name+'的二级分类',
			  maxmin: true,
			  shadeClose: true, //点击遮罩关闭层
			  area : ['800px' , '520px'],
			  content: '/Admin/Goods/stypes?pid='+fid
		});
	});
	
});



