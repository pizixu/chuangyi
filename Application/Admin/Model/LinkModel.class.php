<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model{
    protected $_validate = array(
    	array('li_title','require','链接名称不得为空!',1,'regex',3), //默认情况下用正则进行验证
    	array('li_url','require','链接地址不得为空!',1,'regex',3),
    	);
}
