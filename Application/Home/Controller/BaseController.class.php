<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    	public function __construct(){
    	parent::__construct();
    	//二级导航的调用;
    	$cate=D('category');
    	$where['parentid']=0;
    	$cates=$cate->where($where)->select();
    	$this->assign('cates',$cates);
        //首页高亮显示;
        $this->assign('index',false);
        //内容页信息
        if(I('cate_id')){
            $cateid=I('cate_id');
        }
        if(I('ar_id')){
            $article=D('article');
            $ar_id=I('ar_id');
            $ar_cateid=$article->where("ar_id=$ar_id")->find();
            $cateid=$ar_cateid['ar_cateid'];
            //显示文章内容
            $ar_content= $ar_cateid['ar_content'];
            $ar_content=htmlspecialchars_decode($ar_content); 
            $this->assign('ar_content',$ar_content);     
        }
    	//列表页,当前页的位置信息
        $cate=D('category'); 
        if($cateid){
        $res=$cate->getParent($cateid);
        $this->assign('res',$res);
        //当前栏目
        $cateself=$cate->where("cate_id=$cateid")->find();
        $this->assign('cateself',$cateself);
        //顶级栏目
        if($cateself['parentid']!=0){
            $parentid=$cateself['parentid'];
            $catetop=$cate->where("cate_id=$parentid")->find();
            $topid=$catetop['cate_id'];
            $childids=$cate->where("parentid=$topid")->select();
            $this->assign('childids',$childids);
            $this->assign('catetop',$catetop);
        }else{
            $catetop=$cateself;
            $topid=$catetop['cate_id'];
            $childids=$cate->where("parentid=$topid")->select();
            $this->assign('childids',$childids);
            $this->assign('catetop',$catetop);

        }  
    }
        //内容页列表
        $article=D('article');


    }   
}