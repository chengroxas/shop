<?php
namespace Api\Controller;
use Think\Controller;
class LoginController extends CommonController {
	/**
	 * 检验用户名是否唯一
	 **/
    public function userUnique(){
		$status=false;
		$user=I('post.user');
		$User=M('User');
		$row=$User->where(array('user'=>$user))->find();
		if(empty($row)){
			$status=true;
		}
		$this->output($status,$count,$data);
	}
	/**
	 * 检验邮箱是否唯一
	 **/
	public function emailUnique(){
		$status=false;
		$email=I('post.email');
		$User=M('User');
		$row=$User->where(array('email'=>$email))->find();
		if(empty($row)){
			$status=true;
		}
		$this->output($status,$count,$data);
	}
	/**
	 * 后台再次判断输入的信息
	 **/
	public function regist(){
		$status=false;
		$data=array();
		$user=I('post.user');
		$email=I('post.email');
		$phone=I('post.phone');
		$pwd=I('post.pwd');
		$repwd=I('post.repwd');
		$User=M('User');	
		if(empty($user)){
			$data['error']='用户信息不能为空';
			$this->output($status,null,$data);
		}else{
			$row=$User->where(array('user'=>$user))->find();
			if(!empty($row)){
				$data['error']='用户已经存在';
				$this->output($status,null,$data);	
			}
		}
		
		if(empty($email)){
			$data['error']='邮箱不能为空';
			$this->output($status,null,$data);
		}else if(preg_match('/^\w+@\w{2,3}(\.[a-z]{2,3}){1,2}/i',$email) == false){
			$data['error']='错误的邮箱格式';
			$this->output($status,null,$data);
		}else{
			$row=$User->where(array('email'=>$email))->find();
			if(!empty($row)){
				$data['error']='邮箱已被注册';
				$this->output($status,null,$data);
			}
		} 
		
		if(strlen($phone)!=11){
			$data['error']='请输入11位电话号码';
			$this->output($status,null,$data);
		}else{
			/*$row=$User->where(array('phone'=>$phone))->find();
			if(!empty($row)){
				$data['error']='手机号已被注册';
				$this->output($status,null,$data);
			}*/
		}
		
		if(strlen($pwd)<6){
			$data['error']='请输入6位以上密码';
			if($pwd!=$repwd){
				$data['error']='两次密码不一致';
			}
			$this->output($status,null,$data);
		}
		
		$row=$User->where("user='{$user}' or email='{$email}' ")->select();
		if(empty($row)){
			$data['user']=$user;
			$data['email']=$email;
			$data['phone']=$phone;
			$data['pwd']=$pwd;
			$data['rgtime']=time();
			$ret=$User->add($data);
			if($ret!=false){
				$status=true;
				$count=$ret;
				$_SESSION['id']=$ret;
				$_SESSION['user']=$user;
			}
		}
		$this->output($status,$count,null);	
	}
	/**
	 * 登录
	 **/
	public function login(){
		$status=false;
		$user=I('post.user');
		$pwd=I('post.pwd');
		$User=M('User');
		$row=$User->where(" user='{$user}' or email='{$user}' or phone='{$user}' ")->find();
		if(empty($row)){
			$data['error']='不存在该用户';
			$this->output($status,null,$data);
		}else{
			if( $pwd != $row['pwd'] ){
				$data['error']='密码错误';
				$this->output($status,null,$data);
			}else{
				$status=true;
				$_SESSION['id']=$row['id'];//用户id
				$_SESSION['user']=$row['user'];//用户名
				$Logo=M('User_info');
				$logo=$Logo->field('logo')->where(" userid={$row['id']} ")->find();
				$_SESSION['logo']=$logo['logo'];
				$Cart=M('Shopcart');
				$_SESSION['cartnum']=$Cart->where(" userid={$row['id']} ")->count();//购物车数
				if(I('post.t')==1){
					setcookie(session_name(),session_id(),time()+3600*24*7,'/');
				}else{
					setcookie(session_name(),session_id(),'','/');
				}
				$this->output($status,null,$data);
			}
		}
	}
	/**
	 * 微博的登录与注册
	 **/
	public function Sina(){
		$code=I('get.code');
		$appid="361124507";
		$secret="ba2d28b26bf1951a5ff2133267ca05a4";
		$redirt_url="http://wx.faquwen.com/?backurl=http://www.shop.org/Api/Login/Sina?";
		$url="https://api.weibo.com/oauth2/access_token?client_id={$appid}&client_secret={$secret}&grant_type=authorization_code&redirect_uri=".urlencode($redirt_url)."YOUR_REGISTERED_REDIRECT_URI&code={$code}";
		$token = post($url,array());
		$token =json_decode($token,true);
		
		$access_token=$token['access_token'];
		$uid=$token['uid'];//用户Uid
		
		$info_url="https://api.weibo.com/2/users/show.json?access_token={$access_token}&uid={$uid}";
		$info=get($info_url);
		if($info==false){
			die('用户信息获取失败');//获取用户信息失败
		}	
		$info=json_decode($info,true);
		$User=M('User');
		$Detail=M('User_info');
		$user=$User->where(" uid={$uid} ")->find();
		if(empty($user)){
			$data['user']=$info['screen_name'];//注册新用户
			$data['uid']=$uid;
			$ret=$User->add($data);
			if($ret!==false){
				$detail['userid']=$ret;
				$detail['logo']=$info['profile_image_url'];
				$Detail->add($detail);
			}
			$_SESSION['id']=$ret;
			$_SESSION['user']=$info['screen_name'];
			$_SESSION['logo']=$info['profile_image_url'];
			$_SESSION['cartnum']=0;
			$this->success('注册成功','/Home/User/index');
		}else{
			$_SESSION['id']=$user['id'];
			$_SESSION['user']=$user['user'];
			$detail=$Detail->where(" userid={$user['id']} ")->find();
			$_SESSION['logo']=$detail['logo'];
			$Cart=M('Shopcart');
			$_SESSION['cartnum']=$Cart->where(" userid={$user['id']} ")->count();//购物车数
			$this->success('登录成功','/Home/User/index');
		}
	}
	
	
	
		
}
