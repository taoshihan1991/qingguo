<?php
/**
* 青果团购首页控制器
* @author 陶士涵
* @time 2015年1月12日22:11:29
*/
class IndexAction extends CommonAction {
	private $cid;//分类id
	private $lid;//地区id
	/**
	* 初始化
	*/
    public function _auto(){
    	$this->cid=intval($_GET['cid']);
    	$this->lid=intval($_GET['lid']);
    }
	/**
	* 首页
	*/
    public function index(){
    	//设置分类模板
    	$this->setCategory();

    	$this->display();
    }
    /**
	* 设置分类模板
	* 1.没有cid 显示顶级分类
	* 2.有cid 显示顶级分类和当前分类
	*/
	private function setCategory(){
		$db=D('Category');
		if(empty($this->cid)){
			$topCategory=$db->getCategoryLevel(0);
			$tempArr=array();
			echo __URL__;
			//$tempArr[]=''
			dump($topCategory);
		}
	}
}