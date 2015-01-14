<?php
/**
* 地区模型
*/
class LocalityModel extends Model {
	/**
	* 按等级获取分类数据
	*/
    public function getLocalityLevel($pid){
        
        return $this->field('lname,lid')->where(array('pid'=>$pid,'display'=>1))->order('sort asc')->select();
    }
    /**
	* 获取地区的父id
	*/
    public function getLocalityPid($lid){
        $result=$this->field('pid')->where(array('lid'=>$lid,'display'=>1))->find();
        return $result['pid'];
    }

}