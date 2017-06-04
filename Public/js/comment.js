$(function(){
	$('#comment').click(function(){
		var level = $('.active').attr('title');
		var content = $('#content').val();
		var ordernum = getQueryString('ordernum');
		$.post(
			"/Api/Order/comment",
			{"ordernum":ordernum,"level":level,"content":content},
			function(ret){
				if(ret.status == true){
					layer.open({
						title: '信息',
						content: '评论成功',
						time: 2000,
						success:function(){
							setTimeout(function(){
								window.location.href="/Home/User/order";
							},1000)
						}
					});
				}
			});
	});
	
});

function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);

	if (r != null) 
	return decodeURI(r[2]); 

	return null;
} 
