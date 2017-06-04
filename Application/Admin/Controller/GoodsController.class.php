<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController {
   
    public function goods(){
		$this->checklogin();
		$Ftype=M('Types');
		$btype=$Ftype->where(" pid=0 ")->order("types desc")->select();	
		$Goods=M('Goods');
		if($this->level()==1){
			$count=$Goods->count();
			$page=new \Think\Page($count,10);
			$goods=$Goods->limit($page->firstRow,$page->listRows)->select();
		}else{
			$count=$Goods->where(" shopid={$_SESSION['mangerid']} ")->count();
			$page=new \Think\Page($count,10);
			$goods=$Goods->where(" shopid={$_SESSION['mangerid']} ")->limit($page->firstRow,$page->listRows)->select();
		}
		$links=$page->show();
		$this->assign('links',$links);
		$Manger=M('Manger');
		$data=array();
		foreach($goods as $val){
			$manger=$Manger->where(" id={$val['shopid']} ")->find();
			$ftype=$Ftype->where(" fid = {$val['fid']} and pid=0")->find();
			$stype=$Ftype->where(" fid={$val['pid']} ")->find();
			$val['ftype']=$ftype['types'];
			$val['stype']=$stype['types'];
			$val['seller']=$manger['manger'];
			$data[]=$val;
		}
		$this->assign('data',$data);
		$this->assign('ftype',$btype);
		$this->display();
	}
	
	public function detail(){
		$this->checklogin();
		$pid=I('get.pid');
		$Detail=M('Goods_detail');
		if($this->level()==1){
			$detail=$Detail->where(" pid={$pid}")->select();
		}else{
			$detail=$Detail->where(" pid={$pid} and shopid={$_SESSION['mangerid']}")->select();
		}
		$this->assign('name',$detail[0]['itemname']);
		$this->assign('goods',$detail);
		$this->display('goods-detail');
	}
    
    public function goodsform(){
		$this->checklogin();
		$Type=M('Types');
		$ftype=$Type->where(" pid=0 ")->order("types desc")->select();
		$this->assign('data',$ftype);
		$this->display();
	}
	
	public function typesform(){
		$this->checklogin();
		$Type=M('Types');
		$ftype=$Type->where(" pid=0 ")->order("types desc")->select();
		$this->assign('data',$ftype);
		$this->display();
	}
	
	/**
	 * 一级分类列表
	 **/
	public function types(){
		$this->checklogin();	
		$Types=M('Types');
		$count=$Types->where(" pid=0 ")->count();
		$page=new \Think\Page($count,4);
		$types=$Types->where(" pid=0 ")->limit($page->firstRow,$page->listRows)->order("num")->select();
		$links=$page->show();
		$this->assign("links",$links);
		$this->assign("types",$types);
		$this->display();
	}
	/**
	 * 二级分类列表
	 **/
	public function stypes(){
		$this->checklogin();
		$pid=$_GET['pid'];
		$Types=M('Types');
		$types=$Types->where(" pid={$pid}")->select();
		$this->assign('types',$types);
		$this->display();
	} 
	/**
	 * 编辑二级分类
	 **/
	public function stypesform(){
		$this->checklogin();
		$Types=M('Types');
		$fid=$_GET['fid'];
		$types=$Types->where(" pid={$fid} ")->select();
		$this->assign('types',$types);
		$this->display();
	}
}
