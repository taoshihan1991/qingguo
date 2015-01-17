<?php
/**
* 商品模型
*/
class GoodsViewModel extends ViewModel {
    public $conditions;//查询条件
    public $viewFields = array(
        'goods'=>array('*'),
        'category'=>array('cname','_on'=>'goods.cid=category.cid'),
        'locality'=>array('lname','_on'=>'goods.lid=locality.lid'),
        'shop'=>array('shopname','_on'=>'goods.shopid=shop.shopid'),
    );
	/**
	* 获得分页商品数据
	*/
    public function getGoodsAll($page){
        return $this->where($this->conditions)->limit($page->firstRow,$page->listRows)->select();
    }
    /**
    * 获得所有商品总数
    */
    public function getGoodsTotal(){
        return $this->where($this->conditions)->count();
    }
   
    /**
    * 获取单条数据
    */
    public function getGoodsFind($gid){
        $detail=M('goods_detail')->where(array('goods_id'=>$gid))->find();
        $data=$this->where(array('gid'=>$gid))->find();
        $data['goods_detail']=$detail;
        return $data;
    }
   
  
}