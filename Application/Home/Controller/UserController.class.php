<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
	public function _initialize(){
		$this->checklogin();
	}
	
    public function index(){
		$Order=M('Order');
		$temp=$Order->where(" userid={$_SESSION['id']} ")->limit(0,2)->select();
		$Detail=M('Goods_detail');
		$Goods=M('Goods');
		$order=array();
		foreach($temp as $val){
			$detail=$Detail->field('pid')->where("goodsid={$val['goodsid']} ")->find();
			$goods=$Goods->field('price,cover')->where("id={$detail['pid']}")->find();
			$val['goods']=$goods;
			$order[]=$val;
		}
		
		$foot=$this->indexfoot();
		$collect=$this->indexcollect();
		$this->assign('collect',$collect);
		$this->assign('foot',$foot);
		$this->assign('order',$order);
		$this->display();
	}
	/**
	 * 首页显示用户足迹
	 **/
	public static function indexfoot(){
		$Foot=M('Cfoot');
		$temp=$Foot->field("goodspid")->where(" userid={$_SESSION['id']} and pid=1")->select();
		$foot=array();
		$Goods=M('Goods');
		foreach($temp as $val){
			$goods=$Goods->where(" id={$val['goodspid']} ")->find();
			$val['goods']=$goods;
			$foot[]=$val;
		}
		return $foot;
	}
	/**
	 * 首页显示收藏
	 **/
	public static function indexcollect(){
		$Collect=M('Cfoot');
		$temp=$Collect->field('goodspid')->where(" userid={$_SESSION['id']} and pid=0 ")->select();
		$collect=array();
		$Goods=M('Goods');
		foreach($temp as $val){
			$goods=$Goods->where(" id={$val['goodspid']} ")->find();
			$val['goods']=$goods;
			$collect[]=$val;
		}
		return $collect;
	}
	public function information(){
		$User=M('User_info');
		$Userbase=M('User');
		$Address=M('Address');
		$user=$User->where(" userid={$_SESSION['id']} ")->find();
		$userbase=$Userbase->where(" id={$_SESSION['id']} ")->find();
		$user['phone']=$userbase['phone'];
		$user['email']=$userbase['email'];
		$address=$Address->where(" userid={$_SESSION['id']} and status=1 ")->find();
		
		/*dump($user);
		exit();*/
		$this->assign('address',$address);
		$this->assign('user',$user);
		$this->display();
	}
	
	public function address(){
		$Address=M('Address');
		$address=$Address->where(" userid = {$_SESSION['id']} ")->select();
		$this->assign('data',$address);
		$this->display();
	}
	
	public function order(){
		$Order=M('Order');
		$order=$Order->where(" userid={$_SESSION['id']}")->select();
		$Goods=M('Goods_detail');
		$Pic=M('Goods');
		$data=array();
		foreach($order as $val){
			$goods=$Goods->where(" goodsid={$val['goodsid']} ")->find();
			$pic=$Pic->where(" id={$goods['pid']} ")->find();
			$val['goods']=$goods;
			$val['cover']=$pic['cover'];
			$data[]=$val;
		}
		$this->assign('data',$data);
		$this->display();
	}
	
	public function shopcart(){
		$Cart=M('Shopcart');
		$cart=$Cart->where(" userid = {$_SESSION['id']} ")->group("pid")->select();
		$Goods=M('Goods_detail');
		$Pic=M('Goods');
		$data=array();
		$aa=array();
		$i=0;
		foreach($cart as $val){
			$temp=$Cart->where(" pid={$val['pid']} ")->select();
			$pic=$Pic->where(" id={$val['pid']} ")->find();
			foreach($temp as $row){
				$goods=$Goods->where(" goodsid={$row['goodsid']} ")->find();
				foreach( $goods as $key=>$b ){
					$row[$key]=$b;
				}
				$aa[]=$row;
			}
			$data[$i]['cover']=$pic['cover'];
			$data[$i]['pid']=$val['pid'];
			$data[$i]['goods']=$aa;
			unset($aa);
			$i++;
		}
		$this->assign('data',$data);
		$this->display();
	}
	
	public function comment(){
		$ordernum=$_GET['ordernum'];
		$Order=M('Order');
		$order=$Order->where("  ordernum={$ordernum} ")->find();
		$Goods=M('Goods_detail');
		$goods=$Goods->where(" goodsid={$order['goodsid']} ")->find();
		$Pic=M('Goods');
		$pic=$Pic->where(" id={$goods['pid']} ")->find();
		$order['goods']=$goods;
		$order['cover']=$pic['cover'];
		$this->assign('order',$order);
		$this->display();
	}
	
	public function foot(){
		$Foot=M('Cfoot');
		$Goods=M('Goods');
		$data=array();
		$temp=$Foot->field('time')->where(" userid={$_SESSION['id']} and pid=1 ")->group('time')->order('time desc')->limit(0,3)->select();
		foreach($temp as $val){
			$foot=$Foot->where(" time={$val['time']} ")->select();
			$a=array();
			foreach($foot as $row){
				$goods=$Goods->where(" id={$row['goodspid']} ")->find();
				$row['detail']=$goods;
				$a[]=$row;
			}
			$val['goods']=$a;
			$data[]=$val;
		}
		/*dump($data);
		exit();*/
		$this->assign('foot',$data);
		$this->display();
	}
	
	public function collection(){
		$Goods=M('Goods');
		$Collect=M('Cfoot');
		$temp=$Collect->where(" userid={$_SESSION['id']} and pid=0 ")->select();
		$collect=array();
		foreach($temp as $val){
			$goods=$Goods->where("id={$val['goodspid']}")->find();
			$val['goods']=$goods;
			$collect[]=$val;
		} 
		/*dump($collect);
		exit();*/
		$this->assign('collect',$collect);
		$this->display();
	}
}
