<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $_validate = array(
    	array('ad_name','require','管理员名称不得为空!',1,'regex',3), //默认情况下用正则进行验证
    	array('ad_password','require','管理员密码不得为空!',1,'regex',3), //默认情况下用正则进行验证
    	array('ad_name','require','管理员名称不得重复!',1,'unique',3),
    	array('checkcode','checkcd','验证码有误!',1,'callback',4),
    	);

	public function login()
	{	
		$password=$this->ad_password;
		$info=$this->where("ad_name='$this->ad_name'")->find();
		
		if($info)
		{
			if(md5($password)==$info['ad_password'])
			{
				session('id',$info['ad_id']);
				session('username',$info['ad_name']);
				return true;
			}
		}
		else
		{		
		return false;
		}
	}
	public function checkcd($code){
		$verify = new \Think\Verify();
		return $verify->check($code,'');
	}
	public function logout(){
		session(null);
	}
}




