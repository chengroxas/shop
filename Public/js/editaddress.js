$(function(){
	
	getProvince();
	$('#province').change(function(){
		 var regionid = $('#province').val();
		 if( regionid != 'no'){
		    $('#town option').first().siblings().remove();
		    $('#area option').first().siblings().remove();
			$.post(
				"/Api/Address/getTown",
				{"regionid":regionid},
				function(ret){
					var town = template('town-list',ret);
					$('#town').append(town);
				}
			)
		 }
	});
	
	$('#town').change(function(){
		var regionid=$('#town').val();
		if( regionid != 'no' ){
			$('#area option').first().siblings().remove();
			$.post(
				"/Api/Address/getArea",
				{"regionid":regionid},
				function(ret){
					var town = template('area-list',ret);
					$('#area').append(town);
				}
			)
		}
	});
	
	$('#save').click(function(){
		var recevier = $('#recevier').val();
		var phone = $('#phone').val();
		var province = $('#province option:selected').text();
		var town = $('#town option:selected').text();
		var area = $('#area option:selected').text();
		var detail = $('#detail').val();
		$.post(
			"/Api/Address/saveAddress",
			{"recevier":recevier,"phone":phone,"province":province,"town":town,"area":area,"address":detail},
			function(ret){
				if(ret.status==false){
					layer.open({
							title: '错误信息',
							content: ret.data,
							time:2000,
							scrollbar: false
						});
				}else if(ret.status==true){
					layer.open({
							title: '信息',
							content: '添加成功',
							time:2000,
							scrollbar: false,
							success:function(){
								setTimeout(function(){
									window.location.reload();
								}, 2000);
							}
						});
				}
			}
		)
	});
	
	$('.new-option-r').click(function(){
		var id = $(this).next().val();
		$.post(
			"/Api/Address/setDefault",
			{"id":id},
			function(ret){
				if(ret.status==null){
					return;
				}
			}
		)
		$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
	})
	
	function getProvince(){
		$.post(
			"/Api/Address/getProvice",
			null,
			function(ret){
				var province = template('province-list',ret);
				$('#province').append(province);
			});
	}
})
function deladdress(obj){
	var id = $(obj).attr('id');
	layer.confirm('确定删除该地址？', 
				{btn: ['确定','否']},
				function(){
				  $.post(
					"/Api/Address/delAddress",
					{"id":id},
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
