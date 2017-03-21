<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
    protected $_validate = array(
    	array('ar_title','require','文章名称不得为空!',1,'regex',3), //默认情况下用正则进行验证
    	array('ar_cateid','require','文章所属栏目不得为空!',1,'regex',3),
    	);

}




