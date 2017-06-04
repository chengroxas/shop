$(function(){
	$('.view').on('click', function(){
		  var pid = $(this).attr('id');
		  var name = $(this).attr('title');	
		  layer.open({
			  type: 2,
			  title: name+'的规格',
			  maxmin: true,
			  shadeClose: true, //点击遮罩关闭层
			  area : ['800px' , '520px'],
			  content: '/Admin/Goods/detail?pid='+pid
		});
	});
	
})
function onshelf(obj){
	var id = $(obj).attr('id');
	$.post(
		"/Api/Goods/onshelf",
		{"id":id},
		function(ret){
			if( ret.status == false ){
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
		});
	
}

function offshelf(obj){
	var id = $(obj).attr('id');
	$.post(
		"/Api/Goods/offshelf",
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
