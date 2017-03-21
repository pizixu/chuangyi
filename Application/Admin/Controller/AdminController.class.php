<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function lst(){
        $admin=D('admin');
        $admins=$admin->select();
        $this->assign('admins',$admins);
        $this->display();
}
    public function add(){
         $admin=D('admin');         
        if(IS_POST){
            if($data=$admin->create()){
                $data['ad_password']=md5(I('ad_password'));
            if($admin->add($data)){
                $this->success('添加管理员成功!',U('lst'),3);
            }else{
                $this->error('添加管理员失败!');
            }
            }else{
                $this->error($admin->getError());
            }
            return;
        }
        $this->display();
}
    public function edit($ad_id){
        $admin=D('admin');
        if(IS_POST){
            if($data=$admin->create()){
                 $data['ad_password']=md5(I('ad_password'));
            if($admin->save($data)){
                $this->success('修改管理员成功!',U('lst'),3);
            }else{
                $this->error('修改管理员失败!');
            }
            }else{
                $this->error($admin->getError());
            }
            return;
        }
        $adm=$admin->find($ad_id);
        $this->assign('adm',$adm);
        $this->display();
}
    public function del($ad_id){
         $admin=D('admin');
        if($admin->delete($ad_id)){
            $this->success('删除管理员成功!',U('lst'),3);
        }else{
            $this->error('删除管理员失败!');
        }
}
    public function bdel(){
        $bdel=I('bdel');       
        if($bdel){
        $delid=implode(',',$bdel);
        $cate=D('admin');
            if($cate->delete($delid)){
            $this->success('批量删除管理员成功!',U('lst'),3);
            }
        }else{
            $this->error('批量删除管理员失败!');
        }

    }

}