<?php
/**
* 分类模型
*/
class CategoryModel extends Model {
    protected $table='category';/*默认操作的表*/
	/**
	* 获得所有分类数据
	*/
    public function getCategoryAll(){
        return $this->select();
    }
    /**
    * 添加分类数据
    */
    public function addCategory($data){
        return $this->add($data);
    }
    /**
    * 获取父类信息
    */
    public function getParentInfo($cid){
        $result = $this->field('cname,cid')->find($cid);
        if($result){
            return $result;
        }else{
            return array(
                'cid'=>0,
                'cname'=>'顶级分类'
            );
        }
    }
    /**
    * 获取单条分类数据
    */
    public function getCategoryFind($cid){
        return $this->find($cid);
    }
    /**
    * 编辑单条数据
    */
    public function editCategory($data,$cid){
        return $this->where(array('cid'=>$cid))->save($data);
    }
    /**
    * 验证是否存在子分类
    */
    public function checkSon($cid){
        return $this->where(array('pid'=>$cid))->count();
    }
    /**
    * 删除类
    */
    public function delCategory($cid){
        return $this->where(array('cid'=>$cid))->delete();
    }
}