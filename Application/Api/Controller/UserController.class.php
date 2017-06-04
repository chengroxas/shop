<?php
namespace Api\Controller;
use Think\Controller;
class UserController extends CommonController {
    
	/**
	 * 修改用户信息
	 **/
	public function modify(){
		$status=false;
		$nickname=I('get.nickname');
		$sex=I('get.sex');
		$phone=I('get.phone');
		$email=I('get.email');
		$logo=I('get.logo');
		$birth=I('get.birth');
		if(empty($email)){
			$data['error']='邮箱不能为空';
			$this->output($status,null,$data);
		}else if(preg_match('/^\w+@\w{2,3}(\.[a-z]{2,3}){1,2}/i',$email) == false){
			$data['error']='错误的邮箱格式';
			$this->output($status,null,$data);
		}else{
			$User=M('User');
			$row=$User->where(array('email'=>$email))->find();
			if( $row['email']!=$email && !empty($row) ){
				$data['error']='邮箱已被注册';
				$this->output($status,null,$data['error']);
			}
		} 
		
		if(strlen($phone)!=11){
			$data['error']='请输入11位电话号码';
			$this->output($status,null,$data);
		}
		
		$User=M('User');
		$data['phone']=$phone;
		$data['email']=$email;
		$ret=$User->where("id = '{$_SESSION['id']}'")->save($data);
		if( $ret===false ){
			$data['error']='修改失败';
			$this->output($status,null,$data['error']);
		}else{
			$Detail=M('User_info');
			$data['nickname']=$nickname;
			$data['sex']=$sex;
			$data['logo']=$logo;
			$data['birth']=$birth;
			$ret=$Detail->where("userid = '{$_SESSION['id']}'")->find();
			if(empty($ret)){
				$data['userid']=$_SESSION['id'];
				$_SESSION['logo']=$logo;
				$ret=$Detail->where("userid = '{$_SESSION['id']}'")->add($data);
			}else{
				$ret=$Detail->where("userid = '{$_SESSION['id']}'")->save($data);
				if($ret===false){
					$data['error']='修改失败';
					$this->output($status,null,$data['error']);
				}else{
					$_SESSION['logo']=$logo;
					$status=true;
					$this->output($status,null,null);
				}
			}
		}
	}
	
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
	/**
	 * 保存地址
	 **/
	public function saveAddress(){
		$this->checkAddress();
		$data=I('post.');
		$data['userid']=$_SESSION['id'];
		$data['address']=$data['province'].$data['town'].$data['town'].$data['detail'];
		$Address=M('Address');
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
		if( empty($data['detail'])){
			$data['error']='请填写详细地址';
			$this->output($status,null,$data['error']);	
		}
	}
	/**
	 * 保存头像信息
	 **/
	public function logoSave(){
		$img_src=I('post.img_src');
		$imgname=time();
		if ( preg_match('/^(data:\s*image\/(\w+);base64,)/', $img_src, $preg_ret) )
        {
            $type = $preg_ret[2]; 
            $root = realpath(__ROOT__);
            $localFile  = "{$root}/Public/Uploads/Userlogo/{$imgname}.{$type}"; 
            $ret = file_put_contents( $localFile, base64_decode(str_replace($preg_ret[1], '', $img_src)) );
			$imgSrc="/Public/Uploads/Userlogo/{$imgname}.{$type}";
			echo $imgSrc;
        }else{
			echo "0";
		}
	}
	/**
	 * 收藏
	 **/
	public function collect(){
		$this->checkLogin();
		$goodspid=I('post.goodspid');
		$Collect=M('Cfoot');
		$collect['userid']=$_SESSION['id'];
		$collect['pid']=0;
		$collect['goodspid']=$goodspid;
		$collect['time']=time();
		$ret=$Collect->where("userid={$_SESSION['id']} and goodspid={$goodspid} and pid=0")->find();
		if(empty($ret)){
			$res=$Collect->where(" userid={$_SESSION['id']} ")->add($collect);
			$status=true;
			$this->output($status,null,null);
		}else{
			$status=false;
			$data['error']='已经收藏该商品';
			$this->output($status,null,$data);	
		}
	}
}
