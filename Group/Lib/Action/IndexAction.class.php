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
		$topCategory=$db->getCategoryLevel(0);
		$tempArr=array();
		//当没有cid的时候
		if(empty($this->cid)){	
			$tempArr[]='<a class="active" href="'.U('index').'">全部</a>';
		}else{
			$tempArr[]='<a href="'.U('index').'">全部</a>';
		}


		/*
		有cid的情况
		1.cid 是顶级分类id
		2.cid 不是顶级分类id
		*/
		$pid=$db->getCategoryPid($this->cid);
		foreach($topCategory as $v){
				if($this->cid==$v['cid'] || $pid==$v['cid']){
					$tempArr[]='<a class="active" href="'.U('index',array('cid'=>$v['cid'])).'">'.$v['cname'].'</a>';
				}else{
					$tempArr[]='<a href="'.U('index',array('cid'=>$v['cid'])).'">'.$v['cname'].'</a>';
				}	
		}
		$this->assign('topCategory',$tempArr);
			
		if($pid==0){
			$sonCategory=$db->getCategoryLevel($this->cid);
			$tempSon[]='<a class="active" href="'.U('index',array('cid'=>$this->cid)).'">全部</a>';
		}else{
			$sonCategory=$db->getCategoryLevel($pid);
			$tempSon[]='<a href="'.U('index',array('cid'=>$pid)).'">全部</a>';
		}
		foreach($sonCategory as $v){
				if($this->cid==$v['cid']){
					$tempSon[]='<a class="active" href="'.U('index',array('cid'=>$v['cid'])).'">'.$v['cname'].'</a>';
				}else{
					$tempSon[]='<a href="'.U('index',array('cid'=>$v['cid'])).'">'.$v['cname'].'</a>';
				}	
		}
		$this->assign('sonCategory',$tempSon);


		

		
	}
}