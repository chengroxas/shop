<?php
namespace Api\Controller;
use Think\Controller;
class CartController extends CommonController {
   /**
	 * 加入购物车
	 **/
	public function addbasket(){
		parent::checkLogin();
		$status=false;
		$data['goodsid']=I('post.goodsid');
		$data['nums']=I('post.nums');
		$data['userid']=$_SESSION['id'];
		$data['pid']=I('post.pid');
		$Goods=M('Goods_detail');
		$goods=$Goods->where(" goodsid={$data['goodsid']} ")->find();
		$data['shopid']=$goods['shopid'];
		$Cart=M('Shopcart');
		$cart=$Cart->where(" userid={$data['userid']} and goodsid={$data['goodsid']} ")->find();
		if( !empty($cart) ){//已经存在该产品,还加入购物车,只加数量
			$data['nums']=$cart['nums']+$data['nums'];
			$ret=$Cart->where(" userid={$data['userid']} and goodsid={$data['goodsid']} ")->save($data);
			if($ret!==false){
				$status=true;
				$error['code']=0;//显示零购物车不加一
				$this->output($status,null,$error);
			}else{
				$error['error']='加入购物车失败';
				$this->output($status,null,$error);
			}
		}else{
			$ret=$Cart->add($data);
			if($ret!=false){
				$_SESSION['cartnum']=$_SESSION['cartnum']+1;
				$status=true;
				$error['code']=1;
				$this->output($status,null,$error);
			}else{
				$error['error']='加入购物车失败';
				$this->output($status,null,$error);
			}
		}
	}
	/**
	 * 删除购物车
	 **/
	public function delItem(){
		$status=false;
		$id=I('post.id');
		$Cart=M('Shopcart');
		$ret=$Cart->where(" userid={$_SESSION['id']} and id={$id} ")->delete();
		if($ret==false){
			$data['error']='删除失败,请重试';
			$this->output($status,null,$data);
		}else{
			$_SESSION['cartnum']=$_SESSION['cartnum']-1;
			$status=true;
			$this->output($status,null,null);
		}
	}
	/**
	 * 购物车项目加1
	 **/
	public function addNum(){
		$status=false;
		$cartid=I('post.cartid');
		$Cart=M('Shopcart');
		$cart=$Cart->where(" userid={$_SESSION['id']} and id={$cartid} ")->find();
		$Goods=M('Goods_detail');
		$goods=$Goods->where("goodsid={$cart['goodsid']} ")->find();
		
		if( $cart['nums'] >= $goods['stock'] ){
			$data['error']='该商品库存不足';
			$this->output($status,null,$data);
		}else{
			$update['nums']=$cart['nums']+1;
			$ret=$Cart->where(" userid={$_SESSION['id']} and id={$cartid} ")->save($update);
			if($ret!==false){
				$status=true;
				$this->output($status,null,null);
			}else{
				$data['error']='请重试';
				$this->output($status,null,$data);
			}
		}
	}
	
	/**
	 * 购物车项目减1
	 **/
	 public function reduceNum(){
		 $status=false;
		 $cartid=I('post.cartid');
		 $Cart=M('Shopcart');
		 $cart=$Cart->where(" userid={$_SESSION['id']} and id={$cartid} ")->order("pid	")->find();
		 $update['nums']=$cart['nums']-1;
		 $ret=$Cart->where(" userid={$_SESSION['id']} and id={$cartid} ")->save($update);
		 if($ret!==false){
				$status=true;
				$this->output($status,null,null);
			}else{
				$data['error']='请重试';
				$this->output($status,null,$data);
			}
	}
	/**
	 * 购物车改规格
	 **/
	public function changeformat(){
		$goodsid=I('post.goodsid');
		$num=I('post.num');
		$Cart=M('Shopcart');
		$cart=$Cart->where(" userid={$_SESSION['id']} and goodsid={$goodsid} ")->find();
		$Goods=M('Goods_detail');
		$goods=$Goods->where("goodsid={$goodsid}")->find();
		if( !empty($cart) ){
			$update['nums']=$cart['nums']+$num;
			if($update['nums'] >$goods['stock'] ){
				$status=false;
				$data['error']='库存不足';
				$this->output($status,null,$data);
			}
			$ret=$Cart->where(" userid={$_SESSION['id']} and goodsid={$goodsid} ")->save($update);
		}else{
			$Pid=M('Goods');
			$pid=$Pid->where(" id={$goods['pid']} ")->find();
			$add['pid']=$pid['id'];
			$add['userid']=$_SESSION['id'];
			$add['goodsid']=$goodsid;
			$add['nums']=$num;
			$Cart->add($add);
			$status=true;
			$this->output($status,null,null);
		}
		
	}
	
}
