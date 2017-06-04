$(function(){
	
	$('#login').click(function(){
		var manger = $('#manger').val();
		var pwd = $('#pwd').val();
		if( $('#remember-me').is(':checked') ){
			var time = 7;
		}
		$.post(
			"/Api/Manger/login",
			{"manger":manger,"pwd":pwd,"time":time},
			function(ret){
				if(ret.status==false){
					layer.open({
							title: '错误信息',
							content: ret.data.error,
							time:2000,
							scrollbar: false
						});
				}else if(ret.status==true){
					layer.load();
					setTimeout(function(){
						layer.closeAll('loading');
						window.location.href="/Admin/Index/index";
					}, 1000);
				}
			}	
		)
	});
	
});
