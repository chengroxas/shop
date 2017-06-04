$(function(){	
	$('#modify').click(function(){
		 nickname = $('#nickname').val();
		 sex = $("input[name='sex']:checked").val();
		 phone = $('#phone').val();
		 email = $('#email').val();
		 logo = $('#logo-img').val();
		 birth = $('#birth').val();
		 if(check()==false){
			 return;
		 }
		 $.get(
			"/Api/User/modify",
			{"nickname":nickname,"sex":sex,"phone":phone,"email":email,"logo":logo,'birth':birth},
			function(ret){
				if( ret.status == false ){
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time:2000,
						scrollbar: false
					});
				}else if( ret.status == true ){
					layer.open({
						title: '信息',
						content: '成功修改',
						time:2000,
						scrollbar: false
					});
				}
			});
	});
	
	//检查邮箱和手机号码
	function check(){
		if( phone.length!=11 || phone == '' ){
			layer.open({
				title: '错误信息',
				content: '请输入11位手机号码',
				time:2000,
				scrollbar: false
			});
			return false;
		}
		var reg =/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
		if( !reg.test(email) || email =='' ){
			layer.open({
				title: '错误信息',
				content: '请输入正确的邮箱地址',
				time:2000,
				scrollbar: false
			});
			return false;
		}
	}
	$('#logo').change(function(){
		previewImg(this);
	})
	
	function previewImg(input) {
    if (input.files && input.files[0]) {
        if(input.files[0].size<2097152) {
            var reader = new FileReader();            
            reader.onload = function (e) {
				var data = {};
				data.img_src = e.target.result;
				$.post('/Api/User/logoSave',data, function(ret){
					if(ret!=0){
						$('.filePic img').attr('src',e.target.result);
						$('#logo-img').val(ret);
					}
				});
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            input.value="";
            PromptHide('图片大小不能超出2M');
        }
    }
}
	
});
