<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends Controller {
    public function lst(){
    $link=D('link');// 实例化link对象 
    $count= $link->count();// 查询满足要求的总记录数
    $Page= new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(2)
    //自定义分页样式设置;
    //$Page->lastSuffix=false;//最后一页是否显示总页数;
    $Page->rollPage=4;//分页栏每页显示的页数;
    $Page->setConfig('prev','【上一页】');
    $Page->setConfig('next','【下一页】');
    $Page->setConfig('first','【首页】');    
    $Page->setConfig('last','【末页】');
    $Page->setConfig('theme','共%TOTAL_ROW%条记录,当前是%NOW_PAGE%/%TOTAL_ROW%%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
    $show= $Page->show();// 分页显示输出
    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list = $link->order('li_id')->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('list',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    $this->display();
}
    public function add(){
    $link=D('link');
    if(IS_POST){
/*    var_dump($_POST);  
    die;   */
        if($data=$link->create()){
            //文件上传部分;
            if($_FILES['li_pic']['error']==0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath='./';
                $upload->savePath='./Application/Public/uploads/';
                $info   =   $upload->uploadOne($_FILES['li_pic']);
                //var_dump($info);
                $li_pic=$info['savepath'].$info['savename'];
                $data['li_pic']=$li_pic;
             }
            if($link->add($data)){
                $this->success('链接添加成功!',U('lst'),3);
            }else{
                $this->error('链接添加失败!');
            }
        }else{
            $this->error($link->getError());
        }
    return;
    }
    $this->display();
    }
    public function edit($li_id){
    $link=D('link');
    $list=$link->find($li_id);
    $this->assign('list',$list);
        if(IS_POST){
        //var_dump($_POST);       
        if($data=$link->create()){
            //文件上传部分;
            if($_FILES['li_pic']['error']==0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath='./';
                $upload->savePath='./Application/Public/uploads/';
                $info   =   $upload->uploadOne($_FILES['li_pic']);
                $li_pic=$info['savepath'].$info['savename'];
                $data['li_pic']=$li_pic;
            }
            if($link->save($data)){
                $this->success('链接修改成功!',U('lst'),3);
            }else{
                $this->error('链接修改失败!');
            }
        }else{
            $this->error($link->getError());
        }
    return;
    }
    $this->display();
    }
    public function del($li_id){
        $link=D('link');
        if($link->delete($li_id)){
            $this->success('删除链接成功!',U('lst'),3);
        }else{
            $this->error('删除链接失败!');
        }
    }
    public function bdel(){
        $bdel=I('bdel');      
        if($bdel){
        $delid=implode(',',$bdel);
/*        var_dump($delid);
        die;*/
        $link=D('link');
            if($link->delete($delid)){
            $this->success('批量删除链接成功!',U('lst'),3);
            }
        }else{
            $this->error('批量删除链接失败!');
        }

    }
    
}