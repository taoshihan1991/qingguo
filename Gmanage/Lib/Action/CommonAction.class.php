<?php
/**
* 公共控制器
*/
class CommonAction extends Action {
    protected $db;//数据连接

    /*初始化*/
    public function _initialize(){

        /*子类同时初始化*/
        if(method_exists($this,'_auto')){
            $this->_auto();
        }
    }
    /**
    * 图片上传
    */
    public function uploadGoodsImg(){
    	
    }
}