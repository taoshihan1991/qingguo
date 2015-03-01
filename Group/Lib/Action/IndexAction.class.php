<?php
/**
* 青果团购首页控制器
* @author 陶士涵
* @time 2015年1月12日22:11:29
*/
class IndexAction extends CommonAction {
	private $cid;//分类id
	private $lid;//地区id
	private $price;//价格
	private $order;//排序
	/**
	* 初始化
	*/
    public function _auto(){
    	$this->cid=intval($_GET['cid']);
    	$this->lid=intval($_GET['lid']);
    	$this->price=isset($_GET['price']) ? $_GET['price'] : '0~0';
    	$this->order=isset($_GET['order']) ? $_GET['order'] : 'gid~desc';
    	$this->db=D('GoodsView');
    }
	/**
	* 首页
	*/
    public function index(){
    	//设置分类模板
    	$this->setCategory();

    	//设置地区模板
    	$this->setLocality();

    	//设置价格筛选模板
    	$this->setPrice();

    	//设置排序
    	$this->setOrderUrl();

    	//查询商品
    	$this->setOrder();
    	$this->setSearchWhere();
    	$total=$this->db->getGoodsTotal();
    	import('ORG.Util.Page');
    	$page=new Page($total,10);
    	$goods=$this->db->getGoodsAll($page);
    	$this->assign('goods',$goods);
    	$this->assign('page',$page->show());

    	$this->display();
    }
    /**
	* 设置查询条件
	*/
	private function setSearchWhere(){
		//组合分类条件
		if($this->cid){
			$db=D('Category');
			$sonCids=$db->getSonCategory($this->cid);
			$cids=array();
			foreach($sonCids as $v){
				$cids[]=(int)$v['cid'];
			}
			$this->db->conditions['goods.cid']=array('in',$cids);
		}
		//组合地区条件
		if($this->lid){
			$db=D('Locality');
			$sonLids=$db->getSonLocality($this->lid);
			$lids=array();
			foreach($sonLids as $v){
				$lids[]=(int)$v['lid'];
			}
			$this->db->conditions['goods.lid']=array('in',$lids);
		}
		//组合价格条件
		if($this->price){
			$price=explode('~',$this->price);
			if($price[1]){
				$this->db->conditions['goods.price'][]=array('gt',$price[0]);
				$this->db->conditions['goods.price'][]=array('lt',$price[1]);
			}else{
				$this->db->conditions['goods.price']=array('gt',$price[0]);
			}
		}
	}
	 /**
	* 设置查询排序	
	*/
	private function setOrder(){
		$arr=explode('~',$this->order);
		$this->db->order='goods.'.$arr[0].' '.$arr[1];
	}
	 /**
	* 设置排序条件
	*/
	private function setOrderUrl(){
		$orderArr=array();
		$orderArr['d']=U('index',array('cid'=>$this->cid,'lid'=>$this->lid,'price'=>$this->price,'order'=>'gid~desc'));
		$orderArr['b_d']=U('index',array('cid'=>$this->cid,'lid'=>$this->lid,'price'=>$this->price,'order'=>'buy~desc'));
		$orderArr['p_d']=U('index',array('cid'=>$this->cid,'lid'=>$this->lid,'price'=>$this->price,'order'=>'price~desc'));
		$orderArr['p_a']=U('index',array('cid'=>$this->cid,'lid'=>$this->lid,'price'=>$this->price,'order'=>'price~asc'));
		$orderArr['g_d']=U('index',array('cid'=>$this->cid,'lid'=>$this->lid,'price'=>$this->price,'order'=>'gid~desc'));
		$this->assign('orderUrl',$orderArr);
	}
    /**
	* 设置分类模板
	* 1.没有cid 显示顶级分类
	* 2.有cid 显示顶级分类和当前分类
	*/
	private function setCategory(){
		$urlArr=array('cid'=>$this->cid,'lid'=>$this->lid,'price'=>$this->price);
		$urlArr['cid']=0;
		$db=D('Category');
		$topCategory=$db->getCategoryLevel(0);
		$tempArr=array();
		//当没有cid的时候
		if(empty($this->cid)){		
			$tempArr[]='<a class="active" href="'.U('index',$urlArr).'">全部</a>';
		}else{
			$tempArr[]='<a href="'.U('index',$urlArr).'">全部</a>';
		}


		/*
		有cid的情况
		1.cid 是顶级分类id
		2.cid 不是顶级分类id
		*/
		$pid=$db->getCategoryPid($this->cid);
		foreach($topCategory as $v){
				$urlArr['cid']=$v['cid'];
				if($this->cid==$v['cid'] || $pid==$v['cid']){
					$tempArr[]='<a class="active" href="'.U('index',$urlArr).'">'.$v['cname'].'</a>';
				}else{
					$tempArr[]='<a href="'.U('index',$urlArr).'">'.$v['cname'].'</a>';
				}	
		}
		$this->assign('topCategory',$tempArr);
			
		if($pid==0){
			$urlArr['cid']=$this->cid;
			$sonCategory=$db->getCategoryLevel($this->cid);
			$tempSon[]='<a class="active" href="'.U('index',$urlArr).'">全部</a>';
		}else{
			$urlArr['cid']=$pid;
			$sonCategory=$db->getCategoryLevel($pid);
			$tempSon[]='<a href="'.U('index',$urlArr).'">全部</a>';
		}
		if($sonCategory&&$this->cid){
			foreach($sonCategory as $v){
					$urlArr['cid']=$v['cid'];
					if($this->cid==$v['cid']){
						$tempSon[]='<a class="active" href="'.U('index',$urlArr).'">'.$v['cname'].'</a>';
					}else{
						$tempSon[]='<a href="'.U('index',$urlArr).'">'.$v['cname'].'</a>';
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
		$urlArr=array('cid'=>$this->cid,'lid'=>$this->lid,'price'=>$this->price);
		$urlArr['lid']=0;
		$db=D('Locality');
		$topLocality=$db->getLocalityLevel(0);
		$tempArr=array();
		//当没有cid的时候
		if(empty($this->lid)){	
			$tempArr[]='<a class="active" href="'.U('index',$urlArr).'">全部</a>';
		}else{
			$tempArr[]='<a href="'.U('index',$urlArr).'">全部</a>';
		}


		/*
		有lid的情况
		1.lid 是顶级分类id
		2.lid 不是顶级分类id
		*/
		$pid=$db->getLocalityPid($this->lid);
		foreach($topLocality as $v){
				$urlArr['lid']=$v['lid'];
				if($this->lid==$v['lid'] || $pid==$v['lid']){
					$tempArr[]='<a class="active" href="'.U('index',$urlArr).'">'.$v['lname'].'</a>';
				}else{
					$tempArr[]='<a href="'.U('index',$urlArr).'">'.$v['lname'].'</a>';
				}	
		}
		$this->assign('topLocality',$tempArr);
		
		if($pid==0){
			$urlArr['lid']=$this->lid;
			$sonLocality=$db->getLocalityLevel($this->lid);
			$tempSon[]='<a class="active" href="'.U('index',$urlArr).'">全部</a>';
		}else{
			$urlArr['lid']=$pid;
			$sonLocality=$db->getLocalityLevel($pid);
			$tempSon[]='<a href="'.U('index',$urlArr).'">全部</a>';
		}
		if($sonLocality&&$this->lid){
			foreach($sonLocality as $v){
					$urlArr['lid']=$v['lid'];
					if($this->lid==$v['lid']){
						$tempSon[]='<a class="active" href="'.U('index',$urlArr).'">'.$v['lname'].'</a>';
					}else{
						$tempSon[]='<a href="'.U('index',$urlArr).'">'.$v['lname'].'</a>';
					}	
			}
			$this->assign('sonLocality',$tempSon);			
		}

		
	}
	/**
	* 设置价格筛选模板
	*/
	private function setPrice(){
		$urlArr=array('cid'=>$this->cid,'lid'=>$this->lid,'price'=>$this->price);
		$urlArr['price']=0;
		$db=D('Category');
		$key='';
		$pid=$db->getCategoryPid($this->cid);
		$key=$pid ? $pid : $this->cid; 
		$priceArr=C('PRICE');
		$price=$priceArr[$key];

		$tempArr=array();
		if(empty($this->price)){	
			$tempArr[]='<a class="active" href="'.U('index',$urlArr).'">全部</a>';
		}else{
			$tempArr[]='<a href="'.U('index',$urlArr).'">全部</a>';
		}
		foreach($price as $v){
			$urlArr['price']=$v[1];
			if($this->price==$v[1]){
				$tempArr[]='<a class="active" href="'.U('index',$urlArr).'">'.$v[0].'</a>';
			}else{
				$tempArr[]='<a href="'.U('index',$urlArr).'">'.$v[0].'</a>';
			}
		}
		$this->assign('priceArr',$tempArr);
	}
}