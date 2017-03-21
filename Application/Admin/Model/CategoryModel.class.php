<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    protected $_validate = array(
    	array('cate_name','require','栏目名称必须!',1,'regex',3), //默认情况下用正则进行验证

    	);
    //无限极分类递归解决;
	public function catetree(){
		$data=$this->select();
		return $this->resort($data);
	}
	public function resort($data,$parentid=0,$level=0){
		static $ret=array();
		foreach ($data as $k => $v) {
			if($v['parentid']==$parentid){
			   $v['level']=$level;
			   $ret[]=$v;
			   $this->resort($data,$v['cate_id'],$level+1);
			}
		}
		return $ret;
	}
	//找到主栏目下的所有子栏目
	public function chilrenid($cate_id){
		$data=$this->select();
		return $this->getchilrenid($data,$cate_id);
	}
	public function getchilrenid($data,$parentid){
		static $ret=array();
		foreach ($data as $k=> $v) {
			if($v['parentid']==$parentid){
				$ret[]=$v['cate_id'];
				$this->getchilrenid($data,$v['cate_id']);
			}
		}
		return $ret;
	}
	//批量删除的两种情况
	public function _before_delete($option){
 	if(is_array($option['where']['cate_id'])){
	//循环每一个要删除的分类,找出每一个分类的子分类;
	$arr=explode(',',$option['where']['cate_id'][1]);
	//var_dump($arr);
	//声明一个空数组,用来存放循环出来的子分类的信息;
	$soncates=array();
 	foreach ($arr as $k => $v){
 		//获取批量删除子栏目的id
 		$soncates2=$this->chilrenid($v);
 		$soncates=array_merge($soncates,$soncates2);
 	}
 	$soncates=array_unique($soncates);
 	$soncates=implode(',',$soncates);
 	 if($soncates){
 		$this->execute("delete from ar_category where cate_id in ($soncates)");
 		}
 	 }else{//单个删除
  	$chilrenids=$this->chilrenid($option['where']['cate_id']);//这里为什么调用childrenid?
  	$chilrenids=implode(',',$chilrenids);
 	if($chilrenids){
 		$this->execute("delete from ar_category where cate_id in ($chilrenids)");
 			}
  		}
	}
}




