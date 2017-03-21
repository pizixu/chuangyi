<?php
	//二级导航调用子栏目的获取
	 function getChildrenids($pid){
		$cate=D('category');
		$where['parentid']=$pid;
		$cates=$cate->where($where)->select();
		return $cates;
	}
?>