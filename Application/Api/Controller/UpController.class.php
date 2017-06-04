<?php
namespace Api\Controller;
use Think\Controller;
class UpController extends CommonController {
	
	public function uptypeLogo(){
		$img_src=I('post.img_src');
		$imgname=time();
		if ( preg_match('/^(data:\s*image\/(\w+);base64,)/', $img_src, $preg_ret) )
        {
            $type = $preg_ret[2]; 
            $root = realpath(__ROOT__);
            $localFile  = "{$root}/Public/Uploads/Typelogo/{$imgname}.{$type}"; 
            $ret = file_put_contents( $localFile, base64_decode(str_replace($preg_ret[1], '', $img_src)) );
			$imgSrc="/Public/Uploads/Typelogo/{$imgname}.{$type}";
			echo $imgSrc;
        }else{
			echo "0";
		}
	}
	
	public function upCover(){
		$img_src=I('post.img_src');
		$imgname=time();
		if ( preg_match('/^(data:\s*image\/(\w+);base64,)/', $img_src, $preg_ret) )
        {
            $type = $preg_ret[2]; 
            $root = realpath(__ROOT__);
            $localFile  = "{$root}/Public/images/Goods/Show/{$imgname}.{$type}"; 
            $ret = file_put_contents( $localFile, base64_decode(str_replace($preg_ret[1], '', $img_src)) );
			$imgSrc="/Public/images/Goods/Show/{$imgname}.{$type}";
			echo $imgSrc;
        }else{
			echo "0";
		}
	}
	
	public function upShowPic(){
		$status=false;
		if($_FILES['_img']['name']!=''){
			$upload= new \Think\Upload();
			$upload->maxSize = 2*1024*1024;
			$upload->exts	=array('jpg','png','jpeg');
			$path=realpath(__ROOT__);
			$upload->rootPath=$path.'/Public/images/Goods/';
			$upload->savePath='Show/';
			$info=$upload->upload();
			if($info){//上传成功
				$img_src="/Public/images/Goods/{$info[0]['savepath']}{$info[0]['savename']}";
				echo $img_src;
			}else{//上传失败
				//0上传失败
				echo 0;
			}
		}else{//没有图片
			//1没有图片
			echo 1;
			
		}
	}

}
