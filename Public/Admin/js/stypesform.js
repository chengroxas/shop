$(function(){
	$('#addtype').click(function(){
		var addform = $(this).parents('#addform');
		var pid = getQueryString('fid');
		var types = addform.find('.ftype').val();
		var num = addform.find('.no').val();
		$.post(
			"/Api/Types/addStype",
			{"pid":pid,"types":types,"num":num},
			function(ret){
				if( ret.status==true ){
					layer.open({
						title: '信息',
						content: '添加成功',
						time:2000,
						scrollbar: false,
						success:function(){
							setTimeout(function(){
								window.location.reload();
							},1000);
						}
					});
				}else{
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time:2000,
						scrollbar: false
					});
				}
			});
	})
	
})

function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);

	if (r != null) 
	return decodeURI(r[2]); 

	return null;
} 
