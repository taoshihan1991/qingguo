<?php
/**
* 青果团购个人中心控制器
* @author 陶士涵
* @time 2015年2月25日12:45:42
*/
class MemberAction extends AuthAction {
	protected $gid;
	/**
	* 初始化
	*/
    public function _auto(){
    	$this->gid=intval($_GET['gid']);
    }
	/**
	* 首页
	*/
    public function index(){
    	$this->display();
    }
    /**
    * 提交订单
    */
    public function buy(){
    
        $this->display();
    }
 
}