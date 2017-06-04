<?php
/**
 * 分页类
 **/
namespace Org\Util;
class Page{
	private $_total=0;//总记录数
	private $_pagesize=0;//显示的记录数
	private $_pageno=0;//当前页数
	public function __construct($total,$pagesize){
		$this->_total=$total;
		$this->_pagesize=$pagesize;
	}
	/**
	 * 显示分页条
	 * @param $_left  字符串 当前页前显示的页数
	 * @param $_right 字符串	当前页后显示的页数
	 * @return 分页条  html
	 **/
	public function show($_left=1,$_right=1){
		//总页数
		$maxPage=ceil($this->_total/$this->_pagesize);
		$tmp_url=$_SERVER['REQUEST_URI'];
		$tmp_arr=explode('?',$tmp_url);
		//切割保留参数
		if(!isset($tmp_arr[1])){
			$link='';
		}else{
			$arr=explode('&',$tmp_arr[1]);
			$data='';
			foreach($arr as $val){
				$arr=explode('=',$val);
				if($arr[0]!='pageno'){
					$data.=$val.'&';
				}
			}
			$link=$data;
		}
		$link.="pageno=";
		
		if(empty($_GET['pageno'])){
			$this->_pageno=1;
		}else{
			$this->_pageno=$_GET['pageno'];
		}
		
		if($this->_pageno<1){
			$this->_pageno=1;
		}
		
		if($this->_pageno>$maxPage){
			$this->_pageno=$maxPage;
		}
		
		$html='';	
		$left=$_left;
		$right=$_right;
		$start=$this->_pageno-$left;
		
		if($start<1){
			$start=1;
		}

		if($this->_pageno>1){
			$html.='<li><a href="?'.$link.'1" >首页</a></li>';
			$html.='<li><a href="?'.$link.($this->_pageno-1).'">上一页</a></li>';
		}else{
			$html.='<li class="am-disabled"><a>首页</a></li>';
			$html.='<li class="am-disabled"><a >上一页</a></li>';
		}
		
		for($i=$start;$i<$this->_pageno;$i++){
			$html.='<li><a href="?'.$link.$i.'" >'.$i.'</a></li>';
		}
		$html.='<li  class="am-active"><a href="#">'.$this->_pageno.'</a></li>';
		$end=$this->_pageno+$right;
		
		if($end>$maxPage){
			$end=$maxPage;
		}
		
		for($i=$this->_pageno+1;$i<=$end;$i++){
			$html.='<li><a  href="?'.$link.$i.'">'.$i.'</a></li>';
		}
		
		if($this->_pageno<$maxPage){
			$html.='<li><a href="?'.$link.$maxPage.'" >尾页</a></li>';
			$html.='<li><a href="?'.$link.($this->_pageno+1).'" >下一页</a></li>';
		}else{
			$html.='<li class="am-disabled"><a>尾页</a></li>';
			$html.='<li class="am-disabled"><a>下一页</a></li>';
		}
		
		//$html.='</div>';
		return $html;
	}
	/**
	 * 获取当前页记录起始索引
	 * @return 字符串
	 **/
	public function getOffset(){
		$start=($this->_pageno-1)*$this->_pagesize;
		return $start;
	}
}

?>



