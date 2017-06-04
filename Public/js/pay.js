$(function(){
	num = parseInt(getQueryString('num'));
	goodsid = parseInt(getQueryString('goodsid'));
	$('.text_box').val(num);
	var price = parseInt($('#price').text());
	//单个商品总价
	var persum = parseInt(num*price);
	$('#persum').text(persum);
	//实付款
	var sendprice = parseInt($('#sendprice').text());
	var sum = persum+sendprice;
	$('.pay-sum').text(sum);
	
	$('.text_box').blur(function(){
		var reg = /^[1-9][0-9]*$/;
		if( !reg.test($(this).val()) ){
			$(this).val(num);
		}
		var price = parseInt($('#price').text());
		var pernum = $(this).val();
		$('#persum').text(price*pernum);
		var sendprice = parseInt($('#sendprice').text());
		$('.pay-sum').text(price*pernum+sendprice);
	})
	
	$('#submit').click(function(){
		var seladdress = $('.defaultAddr');
		if( seladdress.html() == null ){
			layer.open({
					title: '错误信息',
					content: '请选择地址',
					time:2000,
					scrollbar: false
				});
		}else{
			var goodnum = $('.text_box').val();
		    var adrid = seladdress.find('.edit').attr('id');
		    $.post(
				"/Api/Order/placeOrder",
				{"num":goodnum,"adrid":adrid,"goodsid":goodsid},
				function(ret){
					if(ret.status == false){
						layer.open({
							title: '错误信息',
							content: ret.data.error,
							time:2000,
							scrollbar: false
						});
						return;
					}else{
						layer.open({
							title: '信息',
							content: '成功下单',
							time:2000,
							scrollbar: false,
							success:function(){
								setTimeout(function(){
									window.location.href="/Home/Goods/paysuccess?orderid="+ret.data.orderid;
								}, 1000);
							}
						});
					}
				});
		}
	})
})

function add(obj){
	var price = parseInt($('#price').text());
	var num = parseInt($('.text_box').val())+1;
	$('#persum').text(price*num);
	var sendprice = parseInt($('#sendprice').text());
	$('.pay-sum').text(price*num+sendprice);
}

function reduce(obj){
	if( $('.text_box').val()>1 ){
		var price = parseInt($('#price').text());
		var num = parseInt($('.text_box').val())-1;
		$('#persum').text(price*num);
		var sendprice = parseInt($('#sendprice').text());
		$('.pay-sum').text(price*num+sendprice);
	}
}



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

function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);

	if (r != null) 
	return decodeURI(r[2]); 

	return null;
}
