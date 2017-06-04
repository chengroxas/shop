$(function(){
	
	$('#manger').change(function(){
		manger = $('#manger').val();
		$.post(
			'/Api/Manger/mangerCheck',
			{"manger":manger},
			function(ret){
				if(ret.status==false){
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time:2000,
						scrollbar: false
					});
				}
			});
	});
	
	$('#email').change(function(){
		email = $("#email").val();
		$.post(
			'/Api/Manger/emailCheck',
			{"email":email},
			function(ret){
				if(ret.status == false){
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time:2000,
						scrollbar: false
					});
				}
			});
	});
	
	$('#pwd').change(function(){
		pwd = $("#pwd").val();
		if( pwd.length < 6 ){
			layer.open({
				title: '错误信息',
				content: '请输入6位以上密码',
				time:2000,
				scrollbar: false
			});
		}
	});
	
	$('#repwd').change(function(){
		repwd = $("#repwd").val();
		if( repwd.length < 6 || repwd!=pwd ){
			layer.open({
				title: '错误信息',
				content: '两次密码不同',
				time:2000,
				scrollbar: false
			});
		}
	});
	
	$('#regist').click(function(){
		var manger = $('#manger').val();
		var email = $("#email").val();
		var pwd = $("#pwd").val();
		var repwd = $("#repwd").val();
		if( !$('#remember-me').is(':checked') ){
			layer.open({
				title: '错误信息',
				content: '请勾选阅读协议',
				time:2000,
				scrollbar: false
			});
		}else{
			$.post(
				"/Api/Manger/regist",
				{"manger":manger,"email":email,"pwd":pwd,"repwd":repwd},
				function(ret){
					if(ret.status==true){
						layer.open({
							title: '信息',
							content: '注册成功',
							time:1000,
							scrollbar: false,
							success:function(){
								layer.load();
								setTimeout(function(){
									layer.closeAll('loading');
									window.location.href="/Admin/Index/index";
								}, 1000);
							}
						});
					}else if(ret.status==false){
						layer.open({
							title: '错误信息',
							content: ret.data.error,
							time:1000,
							scrollbar: false
						});
					}
				});
		}
		
	})
	
});
