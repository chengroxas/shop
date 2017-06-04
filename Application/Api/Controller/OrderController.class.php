<?php
namespace Api\Controller;
use Think\Controller;
class OrderController extends CommonController {
	/**
	 * 生成唯一的订单号 简单
	 **/
	public static function unique(){
		$ordernum = time().substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		return $ordernum;
	}
	 
	/**
	 * 立即购买下单
	 **/
    public function placeOrder(){
		$status=false;
		$num=I('post.num');
		$goodsid=I('post.goodsid');
		$Goods=M('Goods_detail');
		$goods=$Goods->where(" goodsid={$goodsid} ")->find();
		if( $num > $goods['stock'] ){
			$data['error']='库存不足';
			$this->output($status,null,$data);
		}
		$Order=M('Order');
		$order['num']=$num;
		$order['pid']=$goods['pid'];
		$order['userid']=$_SESSION['id'];
		$order['adrid']=I('post.adrid');
		$order['goodsid']=$goodsid;
		$order['ordernum']=$this->unique();
		$order['shopid']=$goods['shopid'];
		$order['time']=time();
		$ret=$Order->add($order);
		if( $ret==false ){
			$data['error']='下单失败,请重新下单';
			$this->output($status,null,$data);
		}else{
			$status=true;
			$data['orderid']=$ret;
			$update['stock']=$goods['stock']-$num;
			$Goods->where(" goodsid={$goodsid} ")->save($update);
			$Sales=M('Goods');
			$sales=$Sales->where(" id={$goods['pid']} ")->find();
			$upsales['sales']=$sales['sales']+$num;
			$Sales->where(" id={$goods['pid']} ")->save($upsales);
			$this->output($status,null,$data);
		}
    }
    /**
     * 购物车下单
     **/
	public function cartorder(){
		$status=false;
		$cartid=I('post.cartid');
		$cartid=explode(',',$cartid);
		$Cart=M('Shopcart');
		$Order=M('Order');
		$Goods=M('Goods_detail');
		$order=array();
		$order['userid']=$_SESSION['id'];
		$order['adrid']=I('post.adrid');
		foreach($cartid as $row){
			$cart=$Cart->where(" id={$row} ")->find();
			$goods=$Goods->where(" goodsid={$cart['goodsid']} ")->find();
			if($cart['nums']>$goods['stock']){
				$data['error']=$goods['flavor'].'的'.$goods['itemname'].'库存不够';
				$this->output($status,null,$data);
			}
		}
		foreach($cartid as $val){
			$cart=$Cart->where(" id={$val} ")->find();
			$goods=$Goods->where(" goodsid={$cart['goodsid']} ")->find();
			$order['pid']=$cart['pid'];
			$order['goodsid']=$cart['goodsid'];
			$order['num']=$cart['nums'];
			$order['ordernum']=$this->unique();
			$order['time']=time();
			$order['shopid']=$cart['shopid'];
			$ret=$Order->add($order);
			if($ret==false){
				$data['error']='下单失败,请重新下单';
				$this->output($status,null,$data);
			}else{
				$Detail=M('Goods_detail');
				$detail=$Detail->where(" goodsid={$cart['goodsid']} ")->find();
				$updata['stock']=$detail['stock']-$cart['nums'];
				$Detail->where(" goodsid={$cart['goodsid']} ")->save($updata);//该商品的库存减去卖掉的数量
				$Goods=M('Goods');
				$goods=$Goods->where(" id={$cart['pid']} ")->find();
				$sales['sales']=$cart['nums']+$goods['sales'];
				$Goods->where(" id={$cart['pid']} ")->save($sales);//加商品销量
				$Cart->where(" id={$val}")->delete();//删除购物车的商品
				$_SESSION['cartnum']=$_SESSION['cartnum']-1;//购物车数量减1
				$status=true;
				$this->output($status,null,null);
			}
			
		}//		
	}
	/**
	 * 确认收货
	 **/
	public function sureorder(){
		$ordernum=I('post.ordernum');
		$Order=M('Order');
		$order['status']=3;
		$order['signtime']=time();
		$ret=$Order->where(" ordernum={$ordernum} and userid={$_SESSION['id']} ")->save($order);
		if($ret!=false){
			$status=true;
			$this->output($status,null,null);
		}else{
			$status=false;
			$data['error']='请稍后再重试';
			$this->output($status,null,$data);
		}
	}
	/**
	 * 订单评论
	 **/
	public function comment(){
		$ordernum=I('post.ordernum');
		$Order=M('Order');
		$order=$Order->where(" ordernum={$ordernum} and userid={$_SESSION['id']}")->find();
		$Goods=M('Goods_detail');
		$goods=$Goods->where(" goodsid={$order['goodsid']} ")->find();
		$data['goodspid']=$goods['pid'];
		$data['goodsid']=$goods['goodsid'];
		$data['userid']=$_SESSION['id'];
		$data['content']=I('post.content');
		$data['level']=I('post.level');
		$data['time']=time();
		$data['ordernum']=$ordernum;
		$Comment=M('Comment');
		$ret=$Comment->add($data);
		if($ret!=false){
			$Num=M('Goods');
			$num=$Num->where(" id={$goods['pid']} ")->find();
			$update['comnum']=$num['comnum']+1;
			$Num->where(" id={$goods['pid']} ")->save($update);
			$update['status']=2;//评价后,交易成功
			$Order->where(" ordernum={$ordernum} and userid={$_SESSION['id']}")->save($update);
			$status=true;
			$this->output($status,null,null);
		}
	}
	/**
	 * 商家回复
	 **/
	public function reply(){
		$status=false;
		$data['pid']=I('post.pid');
		$data['content']=I('post.content');	
		$data['userid']=$_SESSION['mangerid'];
		$data['time']=time();
		$Comment=M('Comment');
		$exist=$Comment->where(" pid={$data['pid']} ")->find();
		if(!empty($exist)){
			$error['error']='只能回复评论一次';
			$this->output($status,null,$error);
		}else{
			if(empty($data['content'])){
				$error['error']='评论内容不能为空';
				$this->output($status,null,$error);
			}
			$ret=$Comment->add($data);
			if($ret==false){
				$error['error']='请稍后再重试';
				$this->output($status,null,$error);
			}else{
				$status=true;
				$this->output($status,null,null);
			}
		}
	}
	/**
	 * 后台发货
	 **/
	public function send(){
		$status=false;
		$ordernum=I('post.ordernum');
		$Order=M('Order');
		$update['status']=1;
		$update['sendtime']=time();
		$ret=$Order->where(" ordernum={$ordernum} ")->save($update);
		if( $ret!==false ){
			$status=true;
			$this->output($status,null,null);
		}else{
			$data['error']='请稍后再重试';
			$this->output($status,null,$data);
		}
	}
}
