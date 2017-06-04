<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
		$this->display();
    }
    public function regist(){
		$this->display();
	}
	
	/**
	 * 注销管理员
	 **/
	public function signOut(){
		$_SESSION['mangerid']=null;
		$_SESSION['manger']=null;
		$_SESSION['level']=null;
		$this->success('成功注销','/Admin/Login/login',2);
	}
}
