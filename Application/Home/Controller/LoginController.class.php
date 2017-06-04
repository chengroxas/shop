<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function regist(){
		$this->display();
	}
	
	public function login(){
		if( !empty($_SESSION['id'])){
			echo "<script>window.location.href='/Home/User/index';</script>";
			exit();
		}
		$backurl=$_SERVER['HTTP_REFERER'];
		$this->assign("backurl",$backurl);
		$this->display();
	}
	
	public function safeout(){
		$_SESSION['id']=null;
		$_SESSION['user']=null;
		$_SESSION['logo']=null;
		$_SESSION['cartnum']=null;
		setcookie(session_name,'',time()-1,'/');
		session_destroy;
		$this->success('成功注销','/Home/Index/index');
	}
}
