$(function(){
	$('input').focus(function(){
		$(this).next().find('span').text('').removeClass();
	});
	$('#user').blur(function(){
		user = $('#user').val();
		if(user == ''){
			$('#user').next().find('span').text('不能为空');
		}else{
		$.post(
			"/Api/Login/userUnique",
			{"user":user},
			function(ret){
				if(ret.status == true){
					$('#user').next().find('span').addClass('am-icon-check');
				}else{
					$('#user').next().find('span').text('已被注册');
				}
			});
		}
	});
	
	$('#email').blur(function(){
		var reg =/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
		email = $('#email').val();
		if(email == ''){
			$('#email').next().find('span').text('不能为空');
		}else{
			if(!reg.test(email)){
				$('#email').next().find('span').text('格式不正确');
				return;
			}
			$.post(
			"/Api/Login/emailUnique",
			{"email":email},
			function(ret){
				if(ret.status == true){
					$('#email').next().find('span').addClass('am-icon-check');
				}else{
					$('#email').next().find('span').text('已被注册');
				}
			});
		}
	});

	$('#phone').blur(function(){
		var reg=/^\d{11}$/;
		phone = $.trim($('#phone').val());
		if(!reg.test(phone)){
			$('#phone').next().find('span').text('请输入11位手机号码');
		}else{
			$('#phone').next().find('span').addClass('am-icon-check');
		}
	});
	
	$('#pass').blur(function(){
		pass = $('#pass').val();
		if(pass.length < 6){
			$('#pass').next().find('span').text('请输入6位以上密码');
		}else{
			$('#pass').next().find('span').addClass('am-icon-check');
		}
	});
	
	$('#repass').blur(function(){
		
		repass = $('#repass').val();
		if( repass.length < 6){
			$('#repass').next().find('span').text('请确认密码');
		}else{
			if(repass != pass ){
				$('#repass').next().find('span').text('两次输入密码不同');
			}else{
				$('#repass').next().find('span').addClass('am-icon-check');
			}
		}
		
	});
	
	$('#register').click(function(){
		if( check() == true ){
			$.post(
				"/Api/Login/regist",
				{"user":user,"email":email,"phone":phone,"pwd":pass,"repwd":repass},
				function(ret){
					if( ret.status == true ){
						layer.open({
							title: '注册成功',
							content: '正在跳转',
							time:2000,
							scrollbar: false,
							success:function(){
								layer.load();
								setTimeout(function(){
									layer.closeAll('loading');
									window.location.href="/Home/User/index";
								}, 2000);
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
		}
	});
	
	function check(){
		if( $('#user-regist input').val()=='' || $('.info span').text() != '' ){
			layer.open({
				title: '错误信息',
				content: '请正确填写完整的用户信息',
				scrollbar: false
			});
		}else if( $('#reader-me').is(':checked')==false){
			layer.open({
				title: '错误信息',
				content: '请阅读服务协议',
				scrollbar: false
			});
		}else{
			return true;
		}
	}
	
})
