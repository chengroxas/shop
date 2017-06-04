$(function(){
	var sum =0;
	$('.number').each(function(){
		sum += parseInt($(this).text()); 
	})
	$('.pay-sum').text(sum);
	var cartid='';
	$('#submit').click(function(){
		var adrid = $('.defaultAddr').find('.edit').attr('id');
		if( adrid == null){
			layer.open({
					title: '错误信息',
					content: '请选择地址',
					time:2000,
					scrollbar: false
			});
		}else{
			$('.number').each(function(){
				if( cartid==''){
					cartid += $(this).attr('tabindex');
				}else{
					cartid += ','+$(this).attr('tabindex');
				}
			});
			
			$.post(
				"/Api/Order/cartorder",
				{"adrid":adrid,"cartid":cartid},
				function(ret){
					if(ret.status==true){
						layer.open({
							title: '信息',
							content: '下单成功',
							time:2000,
							scrollbar: false,
							success:function(){
								setTimeout(function(){
									window.location.href="/Home/User/order";
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
		}
		
	})
})


function setdefalut(obj){
	var id = $(obj).attr('id');
	$.post(
		"/Api/Address/setDefault",
		{"id":id},
		function(ret){
			if(ret.status==true){
				location.reload();
			}
		}
	)
}

function changeaddress(obj){
    var buyer = $(obj).find('.buy-user').text();
    var phone = $(obj).find('.buy-phone').text();
    var province = $(obj).find('.province').text();
    var city = $(obj).find('.city').text();
    var dist = $(obj).find('.dist').text();
    var street = $(obj).find('.street').text();
    var address = $('.pay-address');
    address.find('.province').text(province);
    address.find('.city').text(city);
    address.find('.dist').text(dist);
    address.find('.street').text(street);
    address.find('.buy-user').text(buyer);
    address.find('.buy-phone').text(phone);
}
