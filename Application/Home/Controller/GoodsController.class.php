<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends CommonController {
	
	public function goods(){
		$pid=$_GET['pid'];
		$sort=$_GET['sort'];
		$brand=$_GET['brand'];
		$Goods=M('Goods');
		$Types=M('Types');
		$types=$Types->where(" fid={$pid} and status=1")->find();
		$sql="pid=$pid and status=1 ";
		if( !empty($brand)&&$brand!='all' ){
			$sql.=" and brand='{$brand}' ";
		}
		$order='';
		if(!empty($sort)){
			switch($sort){
				case 'price':$order=" {$sort} ";break;
				case 'sales':
				case 'comnum':
				$order=" {$sort} desc";break;
			}
		}
		$count=$Goods->where($sql)->count();
		if($count<0){
			$this->error('暂无该商品!');
		}
		$pagesize=12;
		$page=new \Org\Util\Page($count,$pagesize);
		$links=$page->show(1,2);
		$off=$page->getOffset();
		
		$goods=$Goods->where($sql)->order($order)->limit($off,$pagesize)->select();
		$brand=$Goods->field("brand,id,pid")->where(" pid={$pid} and status=1")->group("brand")->select();
		$this->assign('count',$count);
		$this->assign('brand',$brand);
		$this->assign('links',$links);
		$this->assign('goods',$goods);
		$this->assign('types',$types);
		$this->display();
	}

	public function introduce(){
		$pid=I('get.goodspid');
		//添加到用户足迹
		if($pid==''){
			$this->error('请走正常流程!');
		}
		$Foot=M('Cfoot');
		$Goods=M('Goods');
		if(!empty($_SESSION['id'])){
			$ret=$Foot->where(" userid={$_SESSION['id']} and goodspid={$pid} and pid=1")->find();
			$shop=$Goods->where(" id={$pid} ")->find();
			if(empty($ret)){
				$foot['shopid']=$shop['shopid'];
				$foot['userid']=$_SESSION['id'];
				$foot['goodspid']=$pid;
				$foot['pid']=1;
				$foot['time']=date('n.d',time());
				$Foot->add($foot);
			}
		}
		$goods=$Goods->where(" id={$pid} and status=1 ")->find();
		$Detail=M('Goods_detail');
		$detail=$Detail->where(" pid = {$pid} and status=1 and stock>=1 ")->select();
		$goods['format']=$detail;
		$goods['imgs']=explode(',',json_decode($goods['imgs']));
		$Comment=M('Comment');
		$count['all']=0;
		$count['good']=0;
		$count['middle']=0;
		$count['bad']=0;
		$num=$Comment->where(" goodspid={$pid} ")->select();
		foreach($num as $row){
			$count['all']+=1;
			if($row['level']==1){
				$count['good']+=1;
			}else if($row['level']==2){
				$count['middle']+=1;
			}else{
				$count['bad']+=1;
			}
		}
		$page=new \Think\Page($count['all'],10);
		$temp=$Comment->where(" goodspid={$pid} ")->limit($page->firstRow,$page->listRows)->select();
		$comment=array();
		$User=M('User_info');
		foreach($temp as $val){
			$format=$Detail->where(" goodsid={$val['goodsid']} ")->find();
			$reply=$Comment->where(" pid={$val['id']} ")->find();
			$val['flavor']=$format['flavor'];
			$user=$User->where(" userid ={$val['userid']} ")->find();
			$val['nickname']=$user['nickname'];
			$val['userlogo']=$user['logo'];
			$val['reply']=$reply;
			$comment[]=$val;
		}
		$links=$page->show();
		$other=$this->look();
		$this->assign('other',$other);
		$this->assign('count',$count);
		$this->assign('links',$links);
		$this->assign('comment',$comment);
		$this->assign('goods',$goods);
		$this->display('introduction');
	}
	/**
	 * 商家其它产品
	 **/
	public function look(){
		$pid=I('get.goodspid');
		$Goods=M('Goods');
		$shop=$Goods->where(" id={$pid} ")->find();
		$other=$Goods->where(" shopid={$shop['shopid']} ")->limit(0,7)->select();
		return $other;
	}
	/**
	 * 立即购买
	 **/
	public function pay(){
		$this->checklogin();
		//获取用户地址
		$num=$_GET['num'];
		if(empty($num)|| !preg_match('/^[1-9][0-9]*$/',$num )){
			$this->error('请走正常流程!!!');
		}
		$Address=M('Address');
		$address=$Address->where(" userid = {$_SESSION['id']} ")->select();
		$goodsid=$_GET['goodsid'];
		$Goods=M('Goods_detail');
		$goods=$Goods->where(" goodsid={$goodsid} ")->find();
		$Cover=M('Goods');
		$cover=$Cover->where(" id={$goods['pid']} ")->find();
		$goods['cover']=$cover['cover'];
		$this->assign('goods',$goods);
		$this->assign('address',$address);
		$this->display();
	}
	
	public function paysuccess(){
		$this->checklogin();
		$orderid=intval($_GET['orderid']);
		$Order=M('Order');
		$order=$Order->where(" orderid={$orderid} and userid={$_SESSION['id']} ")->find();
		$Address=M('Address');
		$address=$Address->where(" id={$order['adrid']} ")->find();
		$Goods=M('Goods_detail');
		$goods=$Goods->where(" goodsid={$order['goodsid']} ")->find();
		$goods['num']=$order['num'];
		$data['address']=$address;
		$data['goods']=$goods;
		$this->assign('data',$data);
		$this->display('success');
	}
	
	public function paycart(){
		$shopcartid=$_GET['shopcartid'];
		$shopcartid=explode(',',$shopcartid);
		$Cart=M('Shopcart');
		$Pic=M('Goods');
		$Goods=M('Goods_detail');
		$temp=array();
		foreach( $shopcartid as $cartid ){
			$cart=$Cart->where(" userid = {$_SESSION['id']} and id={$cartid}")->find();
			$pic=$Pic->where(" id={$cart['pid']} ")->find();
			$cart['cover']=$pic['cover'];
			$goods=$Goods->where(" goodsid={$cart['goodsid']} ")->find();
			$cart['goods']=$goods;
			$temp[]	=$cart;
			unset($cart);
		}
		$Address=M('Address');
		$address=$Address->where(" userid = {$_SESSION['id']} ")->select();
		$this->assign('data',$temp);
		$this->assign('address',$address);
		$this->display();
	}
	/**
	 * 搜索
	 **/
	public function search(){
		$Goods=M('Goods');
		$key=$_GET['key'];	
		$pid=$_GET['pid'];
		$sort=$_GET['sort'];
		$Type=M('Types');
		$sql=" position('$key' in keyword)  ";
		if(!empty($pid)&&$pid!='all'){
			$sql.=" and pid=$pid ";
		}
		$order='';
		if(!empty($sort)){
			switch($sort){
				case 'price':$order=" {$sort} ";break;
				case 'sales':
				case 'comnum':
				$order=" {$sort} desc";break;
			}
		}
		$count=$Goods->where($sql)->count();
		if($count<1){
			$this->error('该类型暂无产品');
		}
		$pagesize=12;
		$page=new \Org\Util\Page($count,$pagesize);
		$html=$page->show(1,2);
		$off=$page->getOffset();
		$goods=$Goods->where($sql)->order($order)->limit($off,$pagesize)->select();
		foreach($goods as $val){
			$types=$Type->where(" pid ={$val['fid']}")->select();
		}
		$this->assign('keyword',$key);
		$this->assign('links',$html);
		$this->assign('types',$types);
		$this->assign('goods',$goods);
		$this->display();	
	}
}
