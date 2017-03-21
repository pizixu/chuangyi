<?php
namespace Home\Controller;
use Think\Controller;
class PageController extends BaseController {
    public function index(){
    	$cate=D('category');
    	$cateid=I('cate_id');
    	$cateinfo=$cate->where("cate_id=$cateid")->find();
    	$catecontent=$cateinfo['cate_content'];
    	$catecontent=htmlspecialchars_decode($catecontent);
    	$this->assign('catecontent',$catecontent);
    	$this->display();
    }
}