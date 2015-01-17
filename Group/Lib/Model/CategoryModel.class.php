<?php
/**
* 分类模型
*/
class CategoryModel extends Model {
	/**
	* 按等级获取分类数据
	*/
    public function getCategoryLevel($pid){
        return $this->field('cname,cid')->where(array('pid'=>$pid,'display'=>1))->order('sort asc')->select();
    }
    /**
	* 获取分类的父id
	*/
    public function getCategoryPid($cid){
        $result=$this->field('pid')->where(array('cid'=>$cid,'display'=>1))->find();
        return $result['pid'];
    }
    /**
    * 获取所有的子分类
    */
    public function getSonCategory($cid){
        $result=$this->field('cid')->where(array('pid'=>$cid,'display'=>1))->select();
        $result[]=array('cid'=>$cid);
        return $result;
    }

}