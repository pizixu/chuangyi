<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	$ar=D('article');
    	$article_news=$ar->getnews();
    	$article_rems=$ar->getrems();
    	$this->assign('article_rems',$article_rems);
    	$this->assign('article_news',$article_news);
    	$this->assign('index',true);
    	$this->display();
    }
}