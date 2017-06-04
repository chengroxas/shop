$(function(){
	var sel = $('.check');
	sel.each(function(index){
		$(this).click(function(){
			if($(this).is(':checked')){
				$('.check-all').removeAttr('checked');
				//alert($(this).val());//选中	
				var temp = $(this).parents('.item-content').find('.td-sum').find('.number');
				var sum = parseInt(temp.text());//取得单个商品的总价,加到总价格上
				$('#totalnum').text(parseInt($('#totalnum').text())+1);
				$('#total').text(parseInt($('#total').text())+sum);
			}else{
				$('.check-all').removeAttr('checked');
				var temp = $(this).parents('.item-content').find('.td-sum').find('.number');
				var sum = parseInt(temp.text());
				$('#totalnum').text(parseInt($('#totalnum').text())-1);
				$('#total').text(parseInt($('#total').text())-sum);					
			}
		})
	})
	
	$('.check-all').click(function(){
		var sel = $('.check');
		sum=0;
		num=0;
		sel.each(function(){
			if( $('.check-all').is(':checked') ){
				$(this).attr('checked','checked');
				var temp = parseInt($(this).parents('.item-content').find('.td-sum').find('.number').text());
				sum+=temp;
				num+=1;
				$('#totalnum').text(num);
				$('#total').text(sum);		
			}else{
				$('#totalnum').text(0);
				$('#total').text(0);
				$(this).removeAttr('checked');
			}
			
		})
	})
	
	$('#paycart').click(function(){
		
		var sel = $('.check');
		var shopcartid = '';
		sel.each(function(){
			if($(this).is(':checked')){
				if( shopcartid == '' ){
					shopcartid += $(this).val();
				}else{
					shopcartid += ','+$(this).val();
				}
			}
		})
		if( shopcartid=='' ){
			layer.tips('请勾选需要结算的宝贝', '#paycart', {
				tips: [1, '#3595CC'],
				time: 1000
			});
		}else{
			window.location.href="/Home/Goods/paycart?shopcartid="+shopcartid;
		}
	})
	
	$('.sure').click(function(){
		    var goodsid = $('.format-list').find('.selected').attr('id');
		    var num = $(this).parents('.theme-signin').find('.text_box').val();
		    if( goodsid == undefined ){
				layer.open({
					title: '错误信息',
					content: '请选择规格',
					time:1000,
					scrollbar: false
				});
				return;
			}else{
				$.post(
					"/Api/Cart/changeformat",
					{"goodsid":goodsid,"num":num},
					function(ret){
						if(ret.status==false){
							layer.open({
								title: '错误信息',
								content: ret.data.error,
								time:1000,
								scrollbar: false
							});
							return;
						}else{
							layer.open({
								title: '信息',
								content: '修改成功',
								time:1000,
								scrollbar: false,
								success:function(){
									$(document.body).css("position","static");
									//滚动条复位
									$('.theme-signin-left').scrollTop(0);					
									$('.theme-login').removeClass("selected");
									$('.item-props-can').removeClass("selected");					
									$('.theme-span').hide();
									$('.theme-popover-mask').hide();
									$('.theme-popover').slideUp(200);
									setTimeout(function(){
										window.location.reload();
									},1000);
								}
							});
						}
					});
			}
			
	});
	
})

function reduceNum(obj){	
	var cartid = $(obj).parents('.item-content').find('.td-chk').find('.check').val();
	var num = parseInt($(obj).parent().find('#text_box').val());
	if( num <= 1){
		return;
	}
	$.post(
		"/Api/Cart/reduceNum",
		{"cartid":cartid},
		function(ret){
			if(ret.status==false){
				layer.open({
					title: "错误信息",
					content: ret.data.error,
					time: 2000,
					scrollbar: false
				});
			}else{
				num = num - 1;
				$(obj).parent().find('#text_box').val(num);
				var price = parseInt($(obj).parents('.item-content').find('.td-price').find('.price-now').text());
				var temp = $(obj).parents('.item-content').find('.td-sum').find('.number');
				temp.text(price*num);
				var sel = $(obj).parents('.item-content').find('.check');
				if( sel.is(':checked') ){
					$('#total').text(parseInt($('#total').text())-price);
				}
			}
		});
	
}

function addNum(obj){	
	var cartid = $(obj).parents('.item-content').find('.td-chk').find('.check').val();
	var num = parseInt($(obj).parent().find('#text_box').val());
	$.post(
		"/Api/Cart/addNum",
		{"cartid":cartid},
		function(ret){
			if(ret.status==false){
				layer.open({
					title: "错误信息",
					content: ret.data.error,
					time: 2000,
					scrollbar: false
				});
			}else{
				num=num+1;
				$(obj).parent().find('#text_box').val(num);
				var price = parseInt($(obj).parents('.item-content').find('.td-price').find('.price-now').text());
				var temp = $(obj).parents('.item-content').find('.td-sum').find('.number');
				temp.text(num*price);
				var sel = $(obj).parents('.item-content').find('.check');
				if( sel.is(':checked') ){
					$('#total').text(parseInt($('#total').text())+price);
				}
			}
		});
	
}

function delItem(obj){
	var cartid = $(obj).attr('id');
	$.post(
		"/Api/Cart/delItem",
		{'id':cartid},
		function(ret){
			if( ret.status == false){
				layer.open({
					title: "错误信息",
					content: ret.data.error,
					time: 2000,
					scrollbar: false
				});
			}else{
				layer.open({
					title: '信息',
					content: '删除成功',
					time:2000,
					scrollbar: false,
					success:function(){
						setTimeout(function(){
							window.location.reload();
						}, 2000);
					}
				});
			}
		});

}

