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

    	//设置地区模板
    	$this->setLocality();

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
		if($sonCategory&&$this->cid){
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

	/**
	* 设置地区模板
	* 1.没有lid 显示顶级地区
	* 2.有lid 显示顶级地区和当前地区下的子地区
	*/
	private function setLocality(){
		$db=D('Locality');
		$topLocality=$db->getLocalityLevel(0);
		$tempArr=array();
		//当没有cid的时候
		if(empty($this->lid)){	
			$tempArr[]='<a class="active" href="'.U('index').'">全部</a>';
		}else{
			$tempArr[]='<a href="'.U('index').'">全部</a>';
		}


		/*
		有lid的情况
		1.lid 是顶级分类id
		2.lid 不是顶级分类id
		*/
		$pid=$db->getLocalityPid($this->lid);
		foreach($topLocality as $v){
				if($this->lid==$v['lid'] || $pid==$v['lid']){
					$tempArr[]='<a class="active" href="'.U('index',array('lid'=>$v['lid'])).'">'.$v['lname'].'</a>';
				}else{
					$tempArr[]='<a href="'.U('index',array('lid'=>$v['lid'])).'">'.$v['lname'].'</a>';
				}	
		}
		$this->assign('topLocality',$tempArr);
		
		if($pid==0){
			$sonLocality=$db->getLocalityLevel($this->lid);
			$tempSon[]='<a class="active" href="'.U('index',array('lid'=>$this->lid)).'">全部</a>';
		}else{
			$sonLocality=$db->getLocalityLevel($pid);
			$tempSon[]='<a href="'.U('index',array('lid'=>$pid)).'">全部</a>';
		}
		if($sonLocality&&$this->lid){
			foreach($sonLocality as $v){
					if($this->lid==$v['lid']){
						$tempSon[]='<a class="active" href="'.U('index',array('lid'=>$v['lid'])).'">'.$v['lname'].'</a>';
					}else{
						$tempSon[]='<a href="'.U('index',array('lid'=>$v['lid'])).'">'.$v['lname'].'</a>';
					}	
			}
			$this->assign('sonLocality',$tempSon);			
		}

		
	}
}