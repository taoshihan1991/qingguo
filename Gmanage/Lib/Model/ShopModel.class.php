<?php
/**
* 商铺模型
*/
class ShopModel extends Model {
    public $table='shop';
	/**
	* 获得分页商铺数据
	*/
    public function getShop($page){
        return $this->limit($page->firstRow,$page->listRows)->select();
    }
    /**
    * 获得所有商铺总数
    */
    public function getShopTotal(){
        return $this->count();
    }
    /**
    * 添加商铺数据
    */
    public function addShop($data){
        return $this->add($data);
    }
  
    /**
    * 获取单条地区数据
    */
    public function getShopFind($shopid){
        return $this->find($shopid);
    }
    /**
    * 编辑单条数据
    */
    public function editShop($data,$shopid){
        return $this->where(array('shopid'=>$shopid))->save($data);
    }
    /**
    * 删除商铺
    */
    public function delShop($shopid){
        return $this->where(array('shopid'=>$shopid))->delete();
    }
}