$(function(){
	
	sort = getQueryString('sort');
	brand = getQueryString('brand');
	pid = getQueryString('pid');
	if(sort!=null){
		$('.sort li').each(function(){
			if($(this).find('a').attr('title')==sort){
				$(this).addClass('first');
				$(this).siblings().removeClass('first');
				
			}
		})
	}
	if(brand!=null && brand!='all'){
		var html = '<dd class="selected" id="selectA"><a href="javascript:void(0);">'+brand+'</a></dd>';
		$('.select-result').css('display','list-item');
		$('.select-result dl').append(html);
		$('.select-result dl p').css('display','block');
		$('.brand dd').each(function(){
			if($(this).find('a').text()==brand){
				$(this).addClass('selected');
				$(this).siblings().removeClass('selected');
			}
		})
	}
	
	$('.sort li').click(function(){
		var sort = $(this).find('a').attr('title');
		if(brand!=null){
			window.location.href="/Home/Goods/goods?pid="+pid+"&brand="+brand+"&sort="+sort;
		}else{
			window.location.href="/Home/Goods/goods?pid="+pid+"&sort="+sort;
		}	
	})
	
	$('.brand dd').click(function(){
		var brand = $(this).find('a').attr('title');
		if(sort!=null){
			window.location.href="/Home/Goods/goods?pid="+pid+"&brand="+brand+"&sort="+sort;
		}else{
			window.location.href="/Home/Goods/goods?pid="+pid+"&brand="+brand;
		}
	})
	
	$('#selectA').click(function(){
		if(sort!=null&&sort!='all'){
			window.location.href="/Home/Goods/goods?pid="+pid+"&sort="+sort;
		}else{
			window.location.href="/Home/Goods/goods?pid="+pid;
		}
	})
	
	
	$('.am-icon-refresh').click(function(){
		hotsales();
	});
	
	hotsales();
})

function hotsales(){
	var fid = $('.am-icon-refresh').attr('id');
	$.post(
		"/Api/Goods/hot",
		{"fid":fid},
		function(ret){
			var html=template('hot',ret);
			$('#hot-list').html(html);
		}
	)
}

function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);

	if (r != null) 
	return decodeURI(r[2]); 

	return null;
} 
