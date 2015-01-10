<?php
/**
* 商铺控制器
* @author 陶士涵
* @time 2015年1月10日10:12:38
*/
class ShopAction extends CommonAction {
	private $shopid;//商铺id
	/**
	* 初始化
	*/
	public function _auto(){
		$this->db=D('Shop');
		$this->shopid=intval($_GET['shopid']);
	}
	/**
	* 商铺列表
	*/
	public function index(){
		$total=$this->db->getShopTotal();
		import('ORG.Util.Page');
		$page=new Page($total,1);

		$data=$this->db->getShop($page);
		$this->assign('data',$data);
		$this->assign('page',$page->show());
		$this->display();
	}
	/**
	* 添加商铺
	*/
	public function add(){
		if(IS_GET===true){
			$this->display();
			exit;
		}
		$data=$this->getData();
		if($this->db->addShop($data)){
			$this->success('添加成功',U('shop/index'));
		}else{
			throw new Exception('添加失败'.$this->db->getLastSql());
		}
	}
	/**
	* 编辑商铺
	*/
	public function edit(){
		if(IS_GET===true){
			$info=$this->db->getShopFind($this->shopid);
			$this->assign('info',$info);
			$this->display();
			exit;
		}
		$data=$this->getData();
		if($this->db->editShop($data,$this->shopid)){
			$this->success('编辑成功',U('shop/index'));
		}else{
			$this->error('没有改动',U('shop/index'));
			throw new Exception('编辑失败'.$this->db->getLastSql());
		}
	}
	/**
	* 删除商铺
	*/
	public function del(){
		if($this->db->delShop($this->shopid)){
			$this->success('删除成功',U('shop/index'));
		}else{
			throw new Exception('删除失败'.$this->db->getLastSql());
		}
	}
	/**
	* 获取数据
	*/
	public function getData(){
		$data=array();
		$data['shopname']=htmlspecialchars($_POST['shopname']);
		$data['shopaddress']=htmlspecialchars($_POST['shopaddress']);
		$data['metroaddress']=htmlspecialchars($_POST['metroaddress']);
		$data['shoptel']=htmlspecialchars($_POST['shoptel']);
		$data['shopcoord']=htmlspecialchars($_POST['shopcoord']);
		return $data;
	}
}