<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model{
	//网站当前位置信息显示;
	public function getParent($cateid){
		$res=array();
		while($cateid){
			$cates=$this->where("cate_id=$cateid")->find();
			$res[]=array(
				'cate_id'=>$cates['cate_id'],
				'cate_name'=>$cates['cate_name'],
				);
			$cateid=$cates['parentid'];
		}
		return array_reverse($res);
	}
}




