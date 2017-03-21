<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends BaseController {
    public function index(){
    $cateid=I('cate_id');
 	$article=D('article');// 实例化article对象 
    $count= $article->where("ar_cateid=$cateid")->count();// 查询满足要求的总记录数
    $Page= new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(2)
    //自定义分页样式设置;
    $Page->lastSuffix=false;//最后一页是否显示总页数;
    $Page->rollPage=4;//分页栏每页显示的页数;
    $Page->setConfig('prev','【上一页】');
    $Page->setConfig('next','【下一页】');
    $Page->setConfig('first','【首页】');    
    $Page->setConfig('last','【末页】');
    $Page->setConfig('theme','共%TOTAL_ROW%条记录,当前是%NOW_PAGE%/%TOTAL_ROW%%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
    $show= $Page->show();// 分页显示输出
    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list = $article->where("ar_cateid=$cateid")->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('list',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    $this->display();
    }
}