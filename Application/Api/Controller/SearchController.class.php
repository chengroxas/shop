<?php
namespace Api\Controller;
use Think\Controller;
class SearchController extends CommonController {
    
    public function types(){
		$fid=I('post.fid');
		$Goods=M('Goods');
		$goods=$Goods->where(" pid={$fid} and status=1")->select();
		$this->output(null,null,$goods);
	}
	/**
	 * 获得品牌
	 **/
	public function brand(){
		$pid=I('post.pid');
		$Goods=M('Goods');
		$goods=$Goods->where(" pid='{$pid}' ")->group('brand')->select();
		if(!empty($goods)){
			$status=true;
			$this->output($status,null,$goods);
		}
	}
}
