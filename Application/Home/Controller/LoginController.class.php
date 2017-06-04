<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function regist(){
		$this->display();
	}
	public static function SinaLink(){
		$appid="361124507";
		$secret="ba2d28b26bf1951a5ff2133267ca05a4";
		//$preview=$_SERVER['PATH_INFO'];
		$redirt_url="http://wx.faquwen.com/?backurl=http://www.shop.org/Api/Login/Sina?";
		$auth_url="https://api.weibo.com/oauth2/authorize?client_id={$appid}&response_type=code&redirect_uri=".urlencode($redirt_url);
		return $auth_url;
	}
	public function login(){
		if( !empty($_SESSION['id'])){
			echo "<script>window.location.href='/Home/User/index';</script>";
			exit();
		}
		$backurl=$_SERVER['HTTP_REFERER'];
		$url=$this->SinaLink();
		$this->assign("url",$url);
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
