<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
	
    public function index(){
		$Type=M('Types');
		$ftype=$Type->where(" pid=0 and status=1")->select();
		$data=array();
		$Goods=M('Goods');
		$Shop=M('Manger');
		foreach( $ftype as $val ){
			$st=$Goods->where(" fid={$val['fid']} ")->group("shopid")->select();
			$a=array();
			foreach($st as $row){
				$shop=$Shop->field('id,manger')->where(" id={$row['shopid']} ")->find();
				$a[]=$shop;
			}
			$val['shop']=$a;
			unset($a);
			$stype=$Type->where(" pid={$val['fid']} and status=1")->select();
			$val['stype']=$stype;
			$data[]=$val;
		}
		$temp=$Type->where(" pid=0 and status=1")->limit(0,3)->select();
		$show=array();
		foreach($temp as $val){
			$goods=$Goods->where(" fid={$val['fid']} ")->limit(0,7)->select();
			$more=$Type->where(" pid={$val['fid']} ")->limit(0,4)->select();
			$val['goods']=$goods;
			$val['more']=$more;
			$show[]=$val;
		}
		$this->assign('show',$show);
		$this->assign('data',$data);
		$this->display();
    }

    
}
