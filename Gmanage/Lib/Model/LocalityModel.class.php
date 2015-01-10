<?php
/**
* 地区模型
*/
class LocalityModel extends Model {
    public $table='locality';
	/**
	* 获得所有地区数据
	*/
    public function getLocalityAll(){
        return $this->select();
    }
    /**
    * 添加分类数据
    */
    public function addLocality($data){
        return $this->add($data);
    }
    /**
    * 获取父类信息
    */
    public function getParentInfo($lid){
        $result = $this->field('lname,lid')->find($lid);
        if($result){
            return $result;
        }else{
            return array(
                'lid'=>0,
                'lname'=>'顶级地区'
            );
        }
    }
    /**
    * 获取单条地区数据
    */
    public function getLocalityFind($cid){
        return $this->find($cid);
    }
    /**
    * 编辑单条数据
    */
    public function editLocality($data,$lid){
        return $this->where(array('lid'=>$lid))->save($data);
    }
    /**
    * 验证是否存在子地区
    */
    public function checkSon($lid){
        return $this->where(array('pid'=>$lid))->count();
    }
    /**
    * 删除地区
    */
    public function delLocality($lid){
        return $this->where(array('lid'=>$lid))->delete();
    }
}