<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller {
    public function lst(){
        $cate=D('category');
        $cateres=$cate->catetree();
        $this->assign('cateres',$cateres);
        $this->display();
    }
    public function add(){
        $cate=D('category');
        //接收数据;
        if(IS_POST){       
            if($data=$cate->create()){
            //文件上传部分;
            if($_FILES['cate_pic']['error']==0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath='./';
                $upload->savePath='./Application/Public/uploads/';
                $info   =   $upload->uploadOne($_FILES['cate_pic']);
                //var_dump($info);
                $cate_pic=$info['savepath'].$info['savename'];
                $data['cate_pic']=$cate_pic;
            }
            if($cate->add($data)){
            $this->success('栏目增加成功!',U('lst'),3);
            }else{
            $this->error('栏目新增失败!');
            }
            }else{
            $this->error($cate->getError());   
            }

        //执行增加操作,不需要显示添加的界面;return数据;
        return;
        
    }
        $cateres=$cate->catetree();
        $this->assign('cateres',$cateres);
        $this->display();
    }
    public function edit($cate_id){
        $cate=D('category');
        if(IS_POST){       
            if($data=$cate->create()){
          

            //文件上传部分;
            if($_FILES['cate_pic']['error']==0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath='./';
                $upload->savePath='./Application/Public/uploads/';
                $info   =   $upload->uploadOne($_FILES['cate_pic']);
                //var_dump($info);
                $cate_pic=$info['savepath'].$info['savename'];
                $data['cate_pic']=$cate_pic;
            }
            if($cate->save($data)){
            $this->success('栏目修改成功!',U('lst'),3);
            }else{
            $this->error('栏目修改失败!');
            }
            }else{
            $this->error($cate->getError());   
            }

        //执行增加操作,不需要显示添加的界面;return数据;
        return;
        
    }
        $catere=$cate->find($cate_id);
        $this->assign('catere',$catere);
        $cateres=$cate->catetree();
        $this->assign('cateres',$cateres);
        $this->display();
    }
    public function del($cate_id){
        $cate=D('category');
        if($cate->delete($cate_id)){
            $this->success('删除栏目成功!',U('lst'),3);
        }else{
            $this->error('删除栏目失败!',U('lst'),3);
        }
    }
    public function bdel(){
        $bdel=I('bdel');       
        if($bdel){
        $delid=implode(',',$bdel);
        $cate=D('category');
            if($cate->delete($delid)){
            $this->success('批量删除栏目成功!',U('lst'),3);
            }
        }else{
            $this->error('批量删除栏目失败!');
        }

    }
}