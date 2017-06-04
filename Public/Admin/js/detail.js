$(function(){
	
	
})
function onshelf(obj){
	var id = $(obj).attr('id');
	$.post(
		"/Api/Goods/onfomat",
		{"id":id},
		function(ret){
			if(ret.status==false){
				layer.open({
					title: '错误信息',
					content: ret.data.error,
					time:2000,
					scrollbar: false
				});
			}else{
				layer.open({
					title: '信息',
					content: '成功上架',
					time:2000,
					scrollbar: false,
					success:function(){
						setTimeout(function(){
							location.reload();
						}, 1000);
					}
				});
			}
		}
	)
	
}

function offshelf(obj){
	var id = $(obj).attr('id');
	$.post(
		"/Api/Goods/offomat",
		{"id":id},
		function(ret){
			if(ret.status==false){
				layer.open({
					title: '错误信息',
					content: ret.data.error,
					time:2000,
					scrollbar: false
				});
			}else{
				layer.open({
					title: '信息',
					content: '成功下架',
					time:2000,
					scrollbar: false,
					success:function(){
						setTimeout(function(){
							location.reload();
						}, 1000);
					}
				});
			}
		}
	)
	
}
