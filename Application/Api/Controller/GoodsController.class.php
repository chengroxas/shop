<?php
namespace Api\Controller;
use Think\Controller;
class GoodsController extends CommonController {
	
	public function saveGoods(){
		$post=I('post.');
		$Goods=M('Goods');
		$status=false;
		$ret=$Goods->where(" name='{$post['name']}' and pid='{$post['pid']}' ")->find();
		if( !empty($ret) ){
			$data['error']=$post['name'].'该类型下的商品名称已存在';
			$this->output($status,null,$data);
		}
		//处理规格
		$fomat=I('post.format');
		$fomat=explode('/',$fomat);
		array_pop($fomat);
		$guige=array();
		$temp=array();
		foreach($fomat as $val){
			$val=explode(',',$val);
			foreach($val as $row){
				$row=explode(':',$row);
				$temp[$row[0]]=$row[1];
			}
			$guige[]=$temp;
		}
		$post['param']=htmlspecialchars_decode($post['param']);
		$post['detail']=htmlspecialchars_decode($post['detail']);
		$post['format']=$guige;
		//先存进Goods表中
		$post['shopid']=$_SESSION['mangerid'];
		$post['imgs']=json_encode($post['imgs']);
		$goods=$Goods->add($post);
		if( $goods==false ){
			$data['error']='商品基本信息添加失败';
			$this->output($status,null,$data);
		}
		//再存Goods_detail
		$detail['shopid']=$_SESSION['mangerid'];
		$detail['itemname']=$post['name'];
		$detail['pid']=$goods;
		$Detail=M('Goods_detail');
		foreach( $post['format'] as $val ){
			foreach($val as $key=>$row){
				$detail[$key]=$row;
			}
			$ret=$Detail->add($detail);
			if($ret==false){
				$data['error']='添加规格失败';
				$this->output($status,null,$data);
			}
		}
		$status=true;
		$this->output($status,null,null);
	}
	//整个商品上架
	public function onshelf(){
		$status=false;
		$id=I('post.id');
		$Goods=M('Goods');
		$goods['status']=1;
		$ret=$Goods->where(" id={$id} ")->save($goods);
		if($ret===false){
			$data['error']='上架失败';
			$this->output($status,null,$data);
		}
		$status=true;
		$this->output($status,null,null);
	}
	//整个商品下架
	public function offshelf(){
		$status=false;
		$id=I('post.id');
		$Goods=M('Goods');
		$goods['status']=2;
		$ret=$Goods->where(" id={$id} ")->save($goods);
		if($ret===false){
			$data['error']='下架失败';
			$this->output($status,null,$data);
		}
		$status=true;
		$this->output($status,null,null);
	}
	//商品规格上架
	public function onfomat(){
		$status=false;
		$id=I('post.id');
		$Detail=M('Goods_detail');
		$goods['status']=1;
		$ret=$Detail->where(" goodsid={$id} ")->save($goods);
		if($ret==0){
			$data['error']='该商品已经上架';
			$this->output($status,null,$data);
		}else if($ret===false){
			$data['error']='上架失败';
			$this->output($status,null,$data);
		}
		$status=true;
		$this->output($status,null,null);
		
	}
	//商品规格下架
	public function offomat(){
		$status=false;
		$id=I('post.id');
		$Detail=M('Goods_detail');
		$goods['status']=2;
		$ret=$Detail->where(" goodsid={$id} ")->save($goods);
		if($ret==0){
			$data['error']='该商品已经下架';
			$this->output($status,null,$data);
		}else if($ret===false){
			$data['error']='下架失败';
			$this->output($status,null,$data);
		}
		$status=true;
		$this->output($status,null,null);
	}
	/**
	 * 详情页的规格选择
	 **/
	public function selformat(){
		$goodsid=I('post.goodsid');
		$Detail=M('Goods_detail');
		$detail=$Detail->where(" goodsid={$goodsid} ")->find();
		$status=true;
		$this->output($status,null,$detail);
	}
	/**
	 * 购物车弹出的规格选择
	 **/ 
	public function showformat(){
		$Goods=M('Goods');
		$pid=I('post.pid');
		$goods=$Goods->field("id,name,cover,price")->where(" id={$pid} ")->find();
		$Format=M('Goods_detail');
		$format=$Format->where(" pid={$goods['id']} ")->select();
		$goods['format']=$format;
		$this->output($status,null,$goods);	
	}
	/**
	 * 热销商品展示
	 **/
	public function hot(){
		$fid=I('post.fid');
		$Goods=M('Goods');
		$goods=$Goods->where(" fid={$fid} and status=1")->order('sales desc')->limit(0,13)->select();
		$data=array();
		for( $i=0;$i<3;$i++ ){
			$data[]=$goods[rand(0,count($goods)-1)];
		}
		$this->output($status,null,$data);
	}
}
