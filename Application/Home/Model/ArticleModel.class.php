<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model{
	public function getnews(){
		return $this->where("1")->order("ar_id desc")->limit(2)->select();
	}
	public function getrems(){
		return $this->where("ar_rem=1")->select();
	}
}




