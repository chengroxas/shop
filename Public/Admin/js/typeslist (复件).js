$(function(){
	
	
});


function deleteStype(obj){
		var id = $(obj).parent().find('input').val();
		layer.confirm('删除该二级类型？', 
			{btn: ['确定','否']},
			function(){
			  $.post(
				"/Api/Types/deleteStype",
				{"fid":id},
				function(ret){
					if(ret.status==true){
						layer.open({
							title: '信息',
							content: '成功删除',
							time:2000,
							scrollbar: false,
							success:function(){
								setTimeout(function(){
									window.location.reload();
								}, 1000);
							}
						});
					}
				});
			}
			);
		
}

function deleteFtype(obj){
	var id = $(obj).parent().find('input').val();
	layer.confirm('你将删除该一级类型及其所有二级类型？', 
			{btn: ['确定','否']},
			function(){
			  layer.msg('暂无该功能');
			}, 
			function(){
			 layer.msg('权限不足');
			});
}
