<?php
/**
* 商品模型
*/
class GoodsViewModel extends ViewModel {
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
        return $this->limit($page->firstRow,$page->listRows)->select();
    }
    /**
    * 获得所有商品总数
    */
    public function getGoodsTotal(){
        return $this->count();
    }
    /**
    * 添加数据
    */
    public function addGoods($data){
        $gid=$this->table(C('DB_PREFIX').'goods')->add($data['goods']);
        $data['goods_detail']['goods_id']=$gid;
        return M('goods_detail')->add($data['goods_detail']);
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
    /**
    * 编辑单条数据
    */
    public function editGoods($data,$gid){

        M('goods')->where(array('gid'=>$gid))->save($data['goods']);
        $data['goods_detail']['goods_id']=$gid;
        M('goods_detail')->where(array('goods_id'=>$gid))->save($data['goods_detail']);
        return $gid;
    }
    /**
    * 删除商铺
    */
    public function delGoods($gid){
        M('goods_detail')->where(array('goods_id'=>$gid))->delete();
        return M('goods')->where(array('gid'=>$gid))->delete();
    }
}