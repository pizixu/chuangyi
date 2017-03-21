<?php
namespace Admin\Model;
use Think\Model;
class ConfModel extends Model{
    protected $_validate = array(
    	array('cf_name','require','配置名称不得为空!',1,'regex',3), //默认情况下用正则进行验证
    	array('cf_ename','require','配置英文名称不得为空!',1,'regex',3),
    	);
    public function xiugai($ret){
   	foreach ($ret as $k => $v) {
    		 $this->execute("update ar_conf set cf_value='$v' where cf_ename='$k'");
    	}
    }
}
