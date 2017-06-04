$(function(){
	$('#ftype').change(function(){
		$('#stype option').first().siblings().remove();
		var fid = $(this).val();
		$.post(
			"/Api/Types/getStype",
			{"fid":fid},
			function(ret){
				var stype = template('stype-list',ret);
				$('#stype').append(stype);
			}
		)
	})
	
	$('#more').click(function(){
		var html = template('more-list');
		$('#format').before(html);
	})
	
	$('#add').click(function(){
		check();
		$.post(
			"/Api/Goods/saveGoods",
			{
				"fid":ftype,
				"pid":stype,
				"price":price,
				"name":name,
				"keyword":key,
				"cover":cover,
				"brand":brand,
				"imgs":imgs,
				"format":format,
				"param":param,
				"detail":detail
			},
			function(ret){
				if(ret.status == false){
					layer.open({
						title: '错误信息',
						content: ret.data.error,
						time:2000,
						scrollbar: false
					});
				}else if(ret.status == true){
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
				}
			}
		)
		
	})
	
	
	
	
	/**
	 * 商品详情页展示的图片
	 **/
	var width = $(window).width();
	if ( width >= 650 )	 width = '750px';
	else 	width = "100%";

	$("#demo").zyUpload({
		width            :   width,                 // 宽度
		height           :   "auto",                 // 宽度
		itemWidth        :   "140px",                 // 文件项的宽度
		itemHeight       :   "100px",                 // 文件项的高度
		url              :   "/Api/Up/upShowPic",     // 上传文件的路径
		inputName		 : 	'_img[]',
		id 				 :	 1,
		multiple         :   true,                    // 是否可以多个文件上传
		dragDrop         :   false,                    // 是否可以拖动上传文件
		del              :   true,                    // 是否可以删除文件
		finishDel        :   true,  				  // 是否在上传文件完成后删除预览
		/* 外部获得的回调接口 */
		onSelect: function(selectFiles, allFiles){    // 选择文件的回调方法  selectFile:当前选中的文件  allFiles:还没上传的全部文件

		},
		onSuccess: function(file, response){          // 文件上传成功的回调方法
			if(response==0){
				alert('目录不存在');
				$('#uploadFailure_'+ file.index).show();
				$("#uploadImage_" + file.index).css("opacity", 0.2);
				$('#uploadSuccess_'+ file.index).remove();
			}else{
				var html = '<div style="position: relative;margin-right: 20px;margin-bottom: 15px;width: 132px;display: inline-block;border: 1px solid #CCC;background:#EEE;">'
								+'<span style="display: block;width: 120px;height:120px;border: 1px solid #F2F1F0;margin: 5px;overflow: hidden;">'
									+'<img src="'+response+'" style="width: 100%;" />'
								+'</span>'
								+'<input type="hidden" name="imgs" value="'+response+'" />'
								+'<a onclick="delImg(this);" style="z-index: 10;display: block;top: -8px;cursor:pointer;right: -8px;position:absolute;width: 20px;height: 20px;background: #CCC;border-radius:100%;text-align:center;line-height: 20px;border: 1px solid #C1C1C1;color: #555;">X</a>'
							+'</div>';
				$('#img-box').append(html);
			}
			
		},
		onComplete: function(response){           	  // 上传完成的回调方法
			console.info("文件上传完成");
			console.info(response);
		}
	});
	
	/**
	 * 商品封面图
	 **/
	$('#doc-form-file').change(function(){
		previewImg(this);
	})	
	
	
})


function check(){
		//一级类型
		ftype=$("#ftype").val();
		if(ftype == 'no'){
			layer.open({
				title: '错误信息',
				content: '请选择一级类型',
				time:2000,
				scrollbar: false
			});
			return;
		}
		//二级类型
		stype=$("#stype").val();
		if(stype == 'no'){
			layer.open({
				title: '错误信息',
				content: '请选择二级类型',
				time:2000,
				scrollbar: false
			});
			return;
		}
		brand = $('#brand').val();
		if( brand=='' ){
			layer.open({
				title: '错误信息',
				content: '请填写商品品牌',
				time:2000,
				scrollbar: false
			});
			return;
		}
		//商品名称不能为空
		name = $('#name').val();
		if( name == '' ){
			layer.open({
				title: '错误信息',
				content: '请填写商品名称',
				time:2000,
				scrollbar: false
			});
			return;
		}
		//关键字不能为空
		key = $('#keyword').val();
		if( key =='' ){
			layer.open({
				title: '错误信息',
				content: '请填写商品关键字',
				time:2000,
				scrollbar: false
			});
			return;
		}
		//价格不能为空
		price = $('#demo-price').val();
		if( price == '' ){
			layer.open({
				title: '错误信息',
				content: '请填写商品价格',
				time:2000,
				scrollbar: false
			});
			return;
		}else if( isNaN(price) ){
			layer.open({
				title: '错误信息',
				content: '商品价格请填写数字',
				time:2000,
				scrollbar: false
			});
			return;
		}
		//规格不能为空
		obj=$("input[name='format']");
		format='' ;
		obj.each(function(index){
			if(index%3==2){
				format += $(this).attr('id')+':'+$(this).val()+'/';
			}else{
				format += $(this).attr('id')+':'+$(this).val()+',';
			}
		})
		//产品参数
		var temp = $('#param').val().split(',');
		if(temp.length < 1){
			layer.open({
				title: '错误信息',
				content: '商品参数不能为空',
				time:2000,
				scrollbar: false
			});
			return;
		}
		param ='';
		for( var i in temp ){
			if( temp[i]!='' ){
				param += '<li>'+temp[i]+'</li>';
			}
		}
		//商品详细信息
		detail = ue.getContent();
		if( detail ==''){
			layer.open({
				title: '错误信息',
				content: '商品详细信息不能为空',
				time:2000,
				scrollbar: false
			});
			return;
		}
		//封面不能为空
		cover = $('#cover').val();
		if( cover=='' ){
			layer.open({
				title: '错误信息',
				content: '请选择封面图',
				time:2000,
				scrollbar: false
			});
			return;
		}
		
		//展示图不能为空
		img=$("input[name='imgs']");
		imgs='';
		img.each(function(index){
			if(imgs==''){
				imgs += $(this).val();
			}else{
				imgs += ','+$(this).val();
			}
		})
		if( imgs == '' ){
			layer.open({
				title: '错误信息',
				content: '请选择商品展示图',
				time:2000,
				scrollbar: false
			});
			return;
		}
		
		obj.each(function(index){
			if( $(this).val()== '' ){
				error = '请填写第'+(parseInt(index/3)+1)+'个规格的'+$(this).attr('id');
				layer.open({
					title: '错误信息',
					content: error,
					time:2000,
					scrollbar: false
				});
				return;
			}
			if( $(this).attr('id') =='price' || $(this).attr('id') =='stock'){
				if(isNaN($(this).val())){
					layer.open({
						title: '错误信息',
						content: '价格或库存请填写数字',
						time:2000,
						scrollbar: false
					});
				}
				return;
			}
		})
		
	}

function previewImg(input) {
		if (input.files && input.files[0]) {
			if(input.files[0].size<2097152) {
				var reader = new FileReader();            
				reader.onload = function (e) {
					var data = {};
					data.img_src = e.target.result;
					$.post('/Api/Up/upCover',data, function(ret){
						if(ret!=0){
							$('#goods-cover img').attr('src',e.target.result);
							$('#cover').val(ret);
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

function delformat(obj){
	$(obj).parents().find('#new-format').remove();
}

function delImg(obj){
		$(obj).parent().remove();
}
