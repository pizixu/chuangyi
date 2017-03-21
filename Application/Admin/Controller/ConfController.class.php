<?php
namespace Admin\Controller;
use Think\Controller;
class ConfController extends Controller {
      public function lst(){
      	$conf=D('conf');
      	$list=$conf->select();
      	$this->assign('list',$list);
        $this->display();
      }

      public function add(){
      	$conf=D('conf');
      	if(IS_POST){
      		if($data=$conf->create()){
      			if($conf->add($data)){
      			$this->success('添加配置成功!',U('lst'),3);
      		}else{
      			$this->error('添加配置失败!');
      		}
      	}else{
      		$this->error($conf->getError());
      	}

      	return;
      	}
        $this->display();
      }
      public function edit($cf_id){
      	$conf=D('conf');
      	 if(IS_POST){
      	 	if($data=$conf->create()){
      	 		if($conf->save($data)){
      	 		$this->success('修改配置成功!',U('lst'),3);	
      	 		}else{ 
      	 		    $this->error('修改配置失败!');	 			
      	 	}
      	 }else{
      	 $this->error($conf->getError());
      	 	}
 		return;
 		}
      	$list=$conf->find($cf_id);
      	$this->assign('list',$list);
        $this->display();
      }   
      public function del($cf_id){
      	//echo $cf_id;
      	$conf=D('conf');
 		if($conf->delete($cf_id)){
 			$this->success('删除配置成功!',U('lst'),3);
 		}else{
 			$this->error('删除配置失败!');
 		}
       }  
       //配置的批量删除
       public function bdel(){
       	$conf=D('conf');
       	//I接收数据的三种方式
       	//$bdel=I('post.');      	
       	//$bdel=I('post.bdel');  
        //$bdel=I('bdel');
       	$bdel=I('post.bdel');
       	$bdelids=implode(',',$bdel);
       	if($bdelids){
       		if($conf->delete($bdelids)){
       		$this->success('批量删除配置成功!',U('lst'),3);
       		}else{
       		$this->error('批量删除配置失败!');
       		}
       	}
       }
 	public function conflst(){
		$conf=D('conf');
		if(IS_POST){
		$ret=array();
		$ret=$_POST;
		if($conf->xiugai($ret)!==false){
			$this->success('修改配置项成功！',U('conflst'),3);
		}else{
			$this->error('修改配置项失败!');
		}
		return;
		}
		$confs=$conf->select();
		$this->assign('confs',$confs);
		$this->display();
	}
}