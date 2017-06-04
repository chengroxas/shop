<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function checklogin(){
		header("content-type:text/html;charset=utf8");
		if(empty($_SESSION['manger'])){
			$html.="<script type='text/javascript' src='/Public/basic/js/jquery-1.7.min.js'></script>";
			$html.="<script type='text/javascript' src='/Public/js/layer/layer.js'></script>";
			$html.="<script>
					layer.open({
						title: '未登录',
						content: '请先登录',
						time: 2000,
						scrollbar: false,
						success:function(){
							setTimeout(function(){
								window.location.href='/Admin/Login/login';
							},2000);
						}
					});
				</script>";
			echo $html;
			exit();
		}
	}
	
	public static function level(){
		$Manger=M('Manger');
		$manger=$Manger->where(" id={$_SESSION['mangerid']} ")->find();
		return $manger['level'];
	}
}
