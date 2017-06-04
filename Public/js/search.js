$(function(){
	key = getQueryString('key');
	pid = getQueryString('pid');
	sort = getQueryString('sort');
	if(sort!=null){
		$('.sort li').each(function(){
			if($(this).find('a').attr('title')==sort){
				$(this).addClass('first');
				$(this).siblings().removeClass('first');
				
			}
		})
	}
	if(pid!=null && pid!='all'){
		$('.brand dd').each(function(){
			if($(this).find('a').attr('id')==pid){
				$(this).addClass('selected');
				$(this).siblings().removeClass('selected');
				types = $(this).text();
			}
		})
		var html = '<dd class="selected" id="selectB"><a href="javascript:void(0);">'+types+'</a></dd>';
		$('.select-result').css('display','list-item');
		$('.select-result dl').append(html);
		$('.select-result dl p').css('display','block');
		
	}
	$('#select2').find('dd').click(function(){
		var pid = $(this).find('a').attr('id');
		if(sort!=null){
			window.location.href="/Home/Goods/search?key="+key+"&pid="+pid+"&sort="+sort;
		}else{
			window.location.href="/Home/Goods/search?key="+key+"&pid="+pid;
		}
	})
	$('.sort li').click(function(){
		var sort = $(this).find('a').attr('title');
		if(pid!=null){
			window.location.href="/Home/Goods/search?key="+key+"&pid="+pid+"&sort="+sort;
		}else{
			window.location.href="/Home/Goods/search?key="+key+"&sort="+sort;
		}
	})
})
/*$('#select2').find('dd').click(function(){
		var pid = $(this).find('a').attr('id');
		$.post(
			"/Api/Search/brand",
			{"pid":pid},
			function(ret){
				if(ret.status==true){
					var html = template('select-box',ret);
					$('#brand').html(html);
					brandclick();
				}else{
					$('#brand').html('');
				}
			});
	})*/
function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);

	if (r != null) 
	return decodeURI(r[2]); 

	return null;
} 
