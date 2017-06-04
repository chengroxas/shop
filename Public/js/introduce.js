$(function(){
	
	$('#collect').click(function(){
		var goodspid = getQueryString('goodspid');
		$.post(
			"/Api/User/collect",
			{"goodspid":goodspid},
			function(ret){
				if( ret.status==true ){
					layer.open({
						title: '信息',
						content: '成功加入收藏',
						time: 2000,
						scrollbar: false
					});
				}else if(ret.status==false){
					layer.open({
						title: '信息',
						content: ret.data.error,
						time: 2000,
						scrollbar: false
					});
				}else{
					layer.open({
						title: '错误信息',
						content: '请先登录',
						time: 2000,
						scrollbar: false,
						success:function(ret){
							setTimeout(function(){
								window.location.href="/Home/Login/login";
							},1000);
						}
					});
				}
			}
		)
	});
	
	$('#LikBuy').click(function(){
		var id = $('.selected').attr('id');
		var num = parseInt($('#text_box').val());
		var stock = parseInt($('#stock').text());
		if( num > stock ){
			layer.open({
				title: '错误信息',
				content: '库存不够',
				time: 2000,
				scrollbar: false
			});
			return;
		}
		if( isNaN(id) ){
			layer.open({
				title: '错误信息',
				content: '请选择口味',
				time: 2000,
				scrollbar: false
			});
			return;
		}
		window.location.href="/Home/Goods/pay?goodsid="+id+"&num="+num;
	});
	  
	$('#LikBasket').click(function(event){
		var goodsid = $('.selected').attr('id');
		var pid = parseInt(getQueryString('goodspid'));
		var id = $('.selected').attr('id');
		var num = parseInt($('#text_box').val());
		var stock = parseInt($('#stock').text());
		if( num > stock ){
			layer.open({
				title: '错误信息',
				content: '库存不够',
				time: 2000,
				scrollbar: false
			});
			return;
		}
		var width=$(window).width();
		var addcar = $(this); 
		var img = $(this).parents('li').find('img').attr('src');
		var flyer = $('<img class="u-flyer" style="width:50px;" src="'+img+'">');
		$.post(
			"/Api/Cart/addbasket",
			{"goodsid":goodsid,"nums":num,"pid":pid},
			function(ret){
				if( ret.status == true ){
					if( width > 1007 ){
						flyer.fly({ 
							start: { 
								left: event.pageX, //开始位置（必填）#fly元素会被设置成position: fixed 
								top:  event.pageY - $(window).scrollTop() //开始位置（必填） 
							}, 
							end: { 
								left:width, //结束位置（必填） 
								top: 200, //结束位置（必填） 
								width: 0, //结束时宽度 
								height: 0 //结束时高度 
							}, 
							onEnd: function(){ //结束回调 
								if( ret.data.code==1 ){
									$('.cart_num').text(parseInt($('.cart_num').text())+1);
									$('#CartNum').text(parseInt($('#CartNum').text())+1);
								}
							} 
						}); 
					}else{
						layer.open({
							title: '信息',
							content: '成功加入购物车',
							time:2000,
							scrollbar: false
						});
						if( ret.data.code==1 ){
							$('.cart_num').text(parseInt($('.cart_num').text())+1);
							$('#CartNum').text(parseInt($('#CartNum').text())+1);
						}
					}
				}else if(ret.status == false){
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time:2000,
						scrollbar: false
					});
				}else{
					layer.open({
						title: '错误信息',
						content: '请先登录',
						time:2000,
						scrollbar: false,
						success:function(){
							setTimeout(function(){
								window.location.href="/Home/Login/login";
							},1000);
						}	
					});
				}
			});
	});
})

function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);

	if (r != null) 
	return decodeURI(r[2]); 

	return null;
} 

function selformat(obj){
	var goodsid = $(obj).attr('id');
	$.post(
		"/Api/Goods/selformat",
		{"goodsid":goodsid},
		function(ret){
			if(ret.status==true){
				$('#stock').text(ret.data.stock);
				$('#price').text(ret.data.price);
			}
		});
}
