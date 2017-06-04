<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController {
	
	
    public function index(){
		$this->checklogin();
		$Order=M('Order');
		$User=M('User');
		$Manger=M('Manger');
		$order=array();
		if($this->level()==1){
			$count=$Order->count();
			$page=new \Think\Page($count,10);
			$temp=$Order->limit($page->firstRow,$page->listRows)->select();
		}else{
			$count=$Order->where(" shopid={$_SESSION['mangerid']} ")->count();
			$page=new \Think\Page($count,10);
			$temp=$Order->where(" shopid={$_SESSION['mangerid']} ")->limit($page->firstRow,$page->listRows)->select();
		}
		$links=$page->show();
		foreach($temp as $val){
			$user=$User->where(" id={$val['userid']} ")->find();
			$seller=$Manger->where(" id={$val['shopid']} ")->find();
			$val['seller']=$seller['manger'];
			$val['user']=$user['user'];
			$order[]=$val;
		}
		/*dump($order);
		exit();*/
		$this->assign('links',$links);
		$this->assign('order',$order);
		$this->display('order');
    }
    /**
     * 订单详情
     **/
    public function detail(){
		$ordernum=$_GET['ordernum'];
		$Order=M('Order');
		$Goods=M('Goods_detail');
		$Address=M('Address');
		$order=$Order->where(" ordernum={$ordernum} ")->find();
		$goods=$Goods->where(" goodsid={$order['goodsid']} ")->find();
		$address=$Address->where(" id={$order['adrid']} ")->find();
		$order['goods']=$goods;
		$order['address']=$address;
		$this->assign('order',$order);
		$this->display();
	}
	
	public function comment(){
		$ordernum=$_GET['ordernum'];
		$Comment=M('Comment');
		$comment=$Comment->where(" ordernum={$ordernum} ")->find();
		$reply=$Comment->where(" pid={$comment['id']} ")->find();
		$comment['reply']=$reply;
		$Goods=M('Goods_detail');
		$goods=$Goods->where("goodsid={$comment['goodsid']} ")->find();
		$comment['goods']=$goods;
		$User=M('User_info');
		$user=$User->where(" userid={$comment['userid']} ")->find();
		$comment['user']=$user;
		/*dump($comment);
		exit();*/
		$this->assign('comment',$comment);
		$this->display();
	}
}
