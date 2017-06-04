<?php
namespace Admin\Controller;
use Think\Controller;
class MangerController extends CommonController {
    public function index(){
		$this->checklogin();
		$Manger=M('Manger');
		$manger=$Manger->select();
		$this->assign('manger',$manger);
		$this->display();
    }

}
