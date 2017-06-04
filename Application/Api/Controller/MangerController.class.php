<?php
namespace Api\Controller;
use Think\Controller;
class MangerController extends CommonController {
	
	public function mangerCheck(){
		$status=false;
		$manger=I('post.manger');
		if(empty($manger)){
			$data['error']='管理员不能为空';
			$this->output($status,null,$data);
		}
		$Manger=M('Manger');
		$ret=$Manger->where("manger = '{$manger}'")->find();
		if(!empty($ret)){
			$data['error']='已存在该管理员';
			$this->output($status,null,$data);
		}
	}
	/**
	 * 检验邮箱
	 **/
	public function emailCheck(){
		$status=false;
		$email=I('post.email');
		$preg="/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		if(empty($email)){
			$data['error']='邮箱不能为空';
			$this->output($status,null,$data);
		}else if(!preg_match($preg,$email)){
			$data['error']='邮箱格式不正确';
			$this->output($status,null,$data);
		}

		$Manger=M('Manger');
		$ret=$Manger->where(" email = '{$email}' ")->find();
		if(!empty($ret)){
			$data['error']='该邮箱已被注册';
			$this->output($status,null,$data);
		}
	}
	/**
	 * 注册
	 **/
	public function regist(){
		$status=false;
		$manger=I('post.manger');
		$email=I('post.email');
		$this->emailCheck();
		$this->mangerCheck();
		$pwd=I('post.pwd');
		$repwd=I('post.repwd');
		if( strlen($pwd) < 6){
			$data['error']='请输入6位以上密码';	
			$this->output($status,null,$data);	
		}else if( $pwd != $repwd ){
			$data['error']='两次输入密码不同';
			$this->output($status,null,$data);
		}
		$data['manger']=$manger;
		$data['email']=$email;
		$data['pwd']=$pwd;
		$data['regtime']=time();
		$data['logtime']=time();
		$data['level']=1;
		$Manger=M('Manger');
		$ret=$Manger->add($data);
		if($ret){
			$_SESSION['mangerid']=$ret['id'];
			$_SESSION['manger']=$manger;
			$_SESSION['level']=$data['level'];
			$status=true;
			$this->output($status,null,null);
		}
		
	}
	/**
	 * 登录
	 **/
	public function login(){
		$status=false;
		$manger=I('post.manger');
		$pwd=I('post.pwd');
		$Manger=M('Manger');
		$ret=$Manger->where(" manger = '{$manger}' ")->find();
		if(empty($ret)){
			$data['error']='不存在该用户';
			$this->output($status,null,$data);
		}else{
			if($ret['pwd']!=$pwd){
				$data['error']='密码错误';
				$this->output($status,null,$data);
			}else{
				$_SESSION['mangerid']=$ret['id'];
				$_SESSION['manger']=$ret['manger'];
				$_SESSION['level']=$ret['level'];
				$time=I('post.time');
				$update['logtime']=time();
				//$update['status']=1;
				$Manger->where(" id={$ret['id']} ")->save($update);
				if( !empty($time) ){
					setcookie(session_name(),session_id(),time()+3600*$time,'/');
				}
				$status=true;
				$this->output($status,null,null);
			}
		}
	}
	
}
