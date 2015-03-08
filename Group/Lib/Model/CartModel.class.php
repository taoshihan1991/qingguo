<?php
/**
* 购物车模型
*/
class CartModel extends Model {
    /**
    * 添加购物车
    */
    public function addCart($data){
        $res=$this->add($data);
        if(!$res) return false;
        return $this->where(array('user_id'=>$data['user_id']))->count();
    }
    /**
    * 验证购物车信息是否存在
    */
    public function checkCart($where){
        return $this->where($where)->count();
    }
    /**
    * 自增购物车
    */
    public function incCart($where,$num){
        return $this->where($where)->setInc('goods_num',$num);

    }
    /**
    * 统计购物车总数
    */
    public function countCart($where){
        return $this->where($where)->count();
    }
    /**
    * 获取商品数据
    */
    public function getGoods($where){
        $field=array(
            'goods_img','gid','main_title','price'
        );
       $data=$this->table(C('DB_PREFIX').'goods')->field($field)->where("gid=".$where['gid'])->find();
       return $data;
    }
    /**
    * 获取购物车的数据
    */
    public function getCart($where){
       $data=$this->where($where)->select();
       return $data;
    }
    /**
    * 更新购物车数量
    */
    public function updateCartGoodsNum($where,$num){
        $res=$this->where($where)->setField('goods_num',$num);
        return $res;
    }
    /**
    * 删除购物车商品
    */
    public function delCartGoods($where){
        $res=$this->where($where)->delete();
        return $res;
    }
  
}