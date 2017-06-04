$(function(){
	
	/*$('input').focus(function(){
		$(this).next().find('span').text('').removeClass();
	});
	
	$('#user').blur(function(){
		user = $('#user').val();
		if( user == '' ){
			$('#user').next().find('span').text('不能为空');
		}else{
			$('#user').next().find('span').addClass('am-icon-check');
		}
	});
	
	$('#pass').blur(function(){
		pass = $('#pass').val();
		if( pass.length < 6 ){
			$('#pass').next().find('span').text('请输入6位以上密码');
		}else{
			$('#pass').next().find('span').addClass('am-icon-check');
		}
	});*/
	

	$('#login').click(function(){
		pass = $('#pass').val();
		user = $('#user').val();
		var backurl = $('#backurl').val();
		if( check() == true ){
			if( $('#remember-me').is(':checked') == true ){
				var t = 1;
			}else{
				var t = 0;
			}

			$.post(
				'/Api/Login/login',
				{"user":user,"pwd":pass,"t":t},
				function(ret){
					if( ret.status == true ){
						layer.load();
						setTimeout(function(){
							layer.closeAll('loading');
							window.location.href=backurl;
						}, 2000);
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
	})
	
	function check(){
		if( $('#user-login input').val()=='' ){
			layer.open({
				title: '错误信息',
				content: '请正确填写完整的用户信息',
				time:2000,
				scrollbar: false
			});
		}else{
			return true;
		}
	}
})
