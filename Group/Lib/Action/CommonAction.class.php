<?php
/**
* 前台公共控制器
* @author 陶士涵
* @time 2015年1月12日22:13:02
*/
class CommonAction extends Action {
	protected $db;
	/**
	* 初始化
	*/
	public function _initialize(){
		/*同时初始化子类*/
		if(method_exists($this, '_auto')){
			$this->_auto();
		}
		/*导航栏*/
		$this->setNav();
		$this->assign('userIsLogin',$_SESSION[C('RBAC_AUTH_KEY')]);
	}
	/**
	* 设置导航栏
	*/
	private function setNav(){
		$db=D('Category');
		$nav=$db->getCategoryLevel(0);
		$this->assign('nav',$nav);
	}

}