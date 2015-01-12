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

}