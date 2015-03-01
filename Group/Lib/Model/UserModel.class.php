<?php
/**
* 用户模型
*/
class UserModel extends Model {
	/**
	* 验证字段是否存在
	*/
    public function check($field,$value){
       return $this->where(array($field=>$value))->count();
    }
    /**
    * 获取用户
    */
    public function getUser($where){
        return $this->where($where)->find();
    }
    /**
    * 添加用户
    */
    public function addUser($data){
        return $this->add($data);
    }
}