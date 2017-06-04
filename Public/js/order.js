$(function(){
	allnum = 0;
	waitnum = 0;
	surenum = 0;
	comnum = 0;
	$('.order-status').each(function(){
		allnum += 1;
	});
	$('.order-status2').each(function(){
		waitnum += 1;
	});
	$('.order-status1').each(function(){
		surenum += 1;
	});
	$('.order-status3').each(function(){
		comnum += 1;
	});
	$('.allnum').text(allnum);//全部订单个数
	$('.waitnum').text(waitnum);//待发货订单个数
	$('.surenum').text(surenum);//已发货订单个数
	$('.comnum').text(comnum);//待评价订单个数
})


function sure(obj){
	var ordernum = $(obj).attr('id');
	layer.confirm('确定已经收到宝贝?',
			{btn: ['确定','否']},
			function(){
				$.post(
					"/Api/Order/sureorder",
					{"ordernum":ordernum},
					function(ret){
						if( ret.status == true ){
							layer.open({
								title: '信息',
								content: '确认成功,请及时给宝贝评价',
								time:2000,
								success:function(){
									setTimeout(function(){
										location.reload();
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
	)
}
