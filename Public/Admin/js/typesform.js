$(function(){
	$('#addtype').click(function(){
		var addform = $(this).parents('#addform');
		var types = addform.find('.ftype').val();
		var icon = addform.find('.icon').val();
		var num = addform.find('.no').val();
		var preg =/^[1-9][0-9]*$/;
		if( !preg.test(num) ){
			layer.open({
				title: '错误信息',
				content: '排序数字请填数字',
				time:2000,
				scrollbar: false
			});
			return;
		}
		$.post(
			"/Api/Types/addFtype",
			{"types":types,"icon":icon,"num":num},
			function(ret){
				if( ret.status == true ){
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
			}
		)
	});
	
	$('#select-box').change(function(){
		var fid = $(this).val();
		$.post(
			"/Api/Types/getIcon",
			{"fid":fid},
			function(ret){
				$('#select-box').parents('#editform').find('img').attr('src',ret.data.icon);
				$('#select-box').parents('#editform').find('.no').val(ret.data.num);
				$('#select-box').parents('#editform').find('.icon').val(ret.data.icon);
			}
		)
	});
	
	
	
	$('#edit').click(function(){
		var editform = $(this).parents('#editform');
		var fid = $('#select-box').val()
		var icon = editform.find('.icon').val();
		var num = editform.find('.no').val();
		$.post(
			"/Api/Types/editFtype",
			{"fid":fid,"icon":icon,"num":num},
			function(ret){
				if(ret.status==true){
					layer.open({
						title: '信息',
						content: '修改成功',
						time:2000,
						scrollbar: false,
						success:function(){
							setTimeout(function(){
								window.location.reload();
							},2000);
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
			}
		)
	});
	
	
	$('#add-form-file').change(function(){
		previewImg(this);
	});
	
	$('#edit-form-file').change(function(){
		previewImg(this);
	});
	
});

function previewImg(input) {
		if (input.files && input.files[0]) {
			if(input.files[0].size<2097152) {
				var reader = new FileReader();            
				reader.onload = function (e) {
					var data = {};
					data.img_src = e.target.result;
					$.post('/Api/Up/uptypeLogo',data, function(ret){
						if(ret!=0){
							$(input).parent().find('img').attr('src',e.target.result);
							$(input).parent().find('.icon').val(ret);
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
