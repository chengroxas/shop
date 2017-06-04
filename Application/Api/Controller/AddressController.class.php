<?php
namespace Api\Controller;
use Think\Controller;
class AddressController extends CommonController {
    public function getProvice(){
		$City=M('City');
		$city=$City->where(" pid=0 ")->select();
		$this->output(null,null,$city);
	}
	
	public function getTown(){
		$region_id=I('post.regionid');
		$City=M('City');
		$city=$City->where(" pid={$region_id} ")->select();
		$this->output(null,null,$city);
	}
	
	public function getArea(){
		$region_id=I('post.regionid');
		$City=M('City');
		$city=$City->where(" pid={$region_id} ")->select();
		$this->output(null,null,$city);
	}
	
	public function saveAddress(){
		$this->checkAddress();
		$data=I('post.');
		$data['userid']=$_SESSION['id'];
		$Address=M('Address');
		$count=$Address->where(" userid={$_SESSION['id']} ")->count();
		if($count==0){
			$data['status']=1;
		}
		$ret=$Address->add($data);
		if(!$ret){
			$data['error']='添加失败';
			$this->output($status,null,$data['error']);
		}else{
			$status=true;
			$this->output($status,null,null);
		}
	}
	
	public function checkAddress(){
		$status=false;
		$data=I('post.');
		if(empty($data['recevier'])){
			$data['error']='收货人不能为空';
			$this->output($status,null,$data['error']);
		}
		if(strlen($data['phone']) < 11){
			$data['error']='请输入11位手机号码';
			$this->output($status,null,$data['error']);
		}
		if($data['province']=='请选择省份'){
			$data['error']='请选择省份';
			$this->output($status,null,$data['error']);
		}
		if($data['town']=='请选择市'){
			$data['error']='请选择市';
			$this->output($status,null,$data['error']);	
		}
		if($data['town']=='请选择市'){
			$data['error']='请选择市';
			$this->output($status,null,$data['error']);	
		}
		if( empty($data['address'])){
			$data['error']='请填写详细地址';
			$this->output($status,null,$data['error']);	
		}
	}
	
	public function setDefault(){
		$id=I('post.id');
		$Address=M('Address');
		$data['status']=0;
		$ret=$Address->where(" userid= {$_SESSION['id']} ")->save($data);
		$data['status']=1;
		$ret=$Address->where(" id= $id ")->save($data);
		if($ret!==false){
			$status=true;
			$this->output($status,null,null);
		}
	}
	
	public function delAddress(){
		$status=false;
		$id=I('post.id');
		$Address=M('Address');
		$ret=$Address->where(" userid={$_SESSION['id']} and id=$id ")->delete();
		if($ret == false){
			$data['error']='删除失败,请重试';
			$this->output($status,null,$data);
		}else{
			$status=true;
			$this->output($status,null,null);
		}
	}
	
}
