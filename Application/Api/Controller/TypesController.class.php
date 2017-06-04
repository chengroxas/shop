<?php
namespace Api\Controller;
use Think\Controller;
class TypesController extends CommonController {
	
	/**
	 * 获取二级分类
	 **/
	public function getStype(){
		$pid=I('post.fid');
		$Type=M('Types');
		$stype=$Type->where(" pid={$pid} ")->select();
		$this->output(null,null,$stype);
	}
	
	/**
	 * 添加一级类型
	 **/
	public function addFtype(){
		$status=false;
		$post=I('post.');
		$Types=M('Types');
		if( empty($post['num']) ){
			$error['error']='排序数字不能为空';
			$this->output($status,null,$error);
		}else{
			$ret=$Types->where(" pid=0 and num={$post['num']} ")->find();
			if( !empty($ret) ){
				$no=$Types->where("pid=0 ")->select();
				$error['error']="排序数字";
				foreach($no as $val){
					$error['error'].=$val['num'].",";
				}
				$error['error'].='已经存在';
				$this->output($status,null,$error);
			}
		}
		
		if($post['types']==''){
			$error['error']='一级类型不能为空';
			$this->output($status,null,$error);
		}else{
			$ret=$Types->where(" pid=0 and types='{$post['types']}' ")->find();
			if( !empty($ret) ){
				$error['error']='已存在该一级类型';
				$this->output($status,null,$error);
			}
		}
		if($post['icon']==''){
			$error['error']='未选择一级类型图标';
			$this->output($status,null,$error);
		}
		$post['time']=time();
		$ret=$Types->add($post);
		if( $ret!=false ){
			$status=true;
			$this->output($status,null,null);
		}else{
			$error['error']='请稍后再重试';
			$this->output($status,null,$error);
		}
	}
	/**
	 * 编辑一级类型
	 **/
	public function editFtype(){
		$status=false;
		$post=I('post.');
		$Types=M('Types');
		if( empty($post['icon']) ){
			$error['error']='图标不能为空';
			$this->output($status,null,$error);
		}
		$type=$Types->where(" fid={$post['fid']} and num={$post['num']} ")->find();
		if( !empty($type) ){
			$ret=$Types->where(" fid={$post['fid']} ")->save($post);
			if( $ret !== false ){
				$status=true;
				$this->output($status,null,null);
			}
		}else{
			$exist=$Types->where(" pid=0 and num={$post['num']} ")->find();
			if( empty($exist) ){
				$ret=$Types->where(" fid={$post['fid']} ")->save($post);
				if( $ret !==false ){
					$status=true;
					$data['dfa']='fasd';
					$this->output($status,null,$data);
				}
			}else{
				$exist=$Types->where(" pid=0 ")->select();
				$error['error']="排序数字";
				foreach($exist as $val){
					$error['error'].=$val['num'].",";
				}
				$error['error'].='已经存在';
				$this->output($status,null,$error);
			}
		}
	}
	/**
	 * 添加二级类型
	 **/
	public function addStype(){
		$status=false;
		$post=I('post.');
		$Types=M('Types');
		$ret=$Types->where(" pid={$post['pid']} and num={$post['num']}")->find();
		if( !empty($ret) ){
			$no=$Types->where(" pid={$post['pid']} ")->select();
			$error['error']='排序数字';
			foreach($no as $val ){
				$error['error'].=$val['num'].",";
			}
			$error['error'].='已经存在';
			$this->output($status,null,$error);
		}
		
		if( empty($post['types']) ){
			$error['error']='二级类型不能为空';
			$this->output($status,null,$error);
		}else{
			$exist=$Types->where(" pid={$post['pid']} and types='{$post['types']}' ")->find();
			if( !empty($exist) ){
				$error['error']='同类型已经存在';
				$this->output($status,null,$error);
			}
		}
		$post['time']=time();
		$ret=$Types->add($post);
		if( $ret!=false ){
			$status=true;
			$this->output($status,null,null);
		}
	}
	/**
	 * 类型上架
	 **/
	public function onshelf(){
		$status=false;
		$fid=I('post.fid');
		$Types=M('Types');
		$Goods=M('Goods');
		$update['status']=1;
		$ret=$Types->where(" fid={$fid} ")->save($update);
		if($ret === false){
			$data['error']='该稍后再重试';
			$this->output($status,null,$data);
		}else{
			$status=true;
			$Types->where(" pid={$fid} ")->save($update);
			$Goods->where(" fid={$fid} ")->save($update);
			$this->output($status,null,null);
		}
	}
	/**
	 * 类型下架
	 **/
	public function offshelf(){
		$status=false;
		$fid=I('post.fid');
		$Types=M('Types');
		$Goods=M('Goods');
		$update['status']=2;
		$ret=$Types->where(" fid={$fid} ")->save($update);
		if($ret === false){
			$data['error']='该稍后再重试';
			$this->output($status,null,$data);
		}else{
			$Types->where(" pid={$fid} ")->save($update);
			$Goods->where(" fid={$fid} ")->save($update);
			$status=true;
			$this->output($status,null,null);
		}
	} 
	public function getIcon(){
		$fid=I('post.fid');
		$Ftype=M('Types');
		$ret=$Ftype->where( "fid ='{$fid}'" )->find();
		$data['icon']=$ret['icon'];
		$data['num']=$ret['num'];
		$this->output(null,null,$data);
	}
}
