<?php
/**
* 青果团购商品细节控制器
* @author 陶士涵
* @time 2015年1月18日17:26:22
*/
class DetailAction extends CommonAction {
	protected $gid;
	/**
	* 初始化
	*/
    public function _auto(){
    	$this->gid=intval($_GET['gid']);
    	$this->db=D('GoodsView');
    }
	/**
	* 首页
	*/
    public function index(){
    	$info=$this->db->getGoodsFind($this->gid);
        $info=$this->disDetailData($info);
    	$this->assign('info',$info);

        /*设置最近浏览*/
        $this->setRecentView();
    	$this->display();
    }
    /**
    * 处理商品细节数据
    */
    public function disDetailData($data){
        $data['zhekou']=round(($data['price']/$data['old_price'])*10,1);
        $goods_server=unserialize($data['goods_server']);
        $server_conf=C('goods_server');
        $server=array();
        foreach($goods_server as $v){
            foreach ($server_conf as $k=>$r) {
                if($k==$v) $server[]=$r;
            }
        }
        $data['goods_server']=$server;
        return $data;
    }
    /**
    * 设置最近浏览
    */
    private function setRecentView(){
        $key=enctyption('recent',0);
        $value=isset($_COOKIE[$key]) ? unserialize($_COOKIE[$key]) : null;
        if(!in_array($this->gid,$value)){
            $value[]=$this->gid;
            setcookie($key,serialize($value),time()+86400,'/');
        }
    }
 
}