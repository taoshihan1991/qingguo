<?php
/**
* 商品控制器
* @author 陶士涵
* @time 2015年1月10日19:19:06
*/
class GoodsAction extends CommonAction {
    protected $gid;

	/*初始化*/
    public function _auto(){
    	/*实例化模型*/
        $this->db=D('GoodsView');
        $this->gid=intval($_GET['gid']);
    }
    /*显示商品列表*/
    public function index(){
        $total=$this->db->getGoodsTotal();
        import('ORG.Util.Page');
        $page=new Page($total,1);
    	$data=$this->db->getGoodsAll($page);
        $this->assign('data',$data);
        $this->assign('page',$page->show());

    	$this->assign('data',$data);
    	$this->display();
    }

	/**
	* 添加商品
	*/
    public function add(){
    	//是get请求显示模板
    	if(IS_GET===true){
            //分配当前商铺
            $this->setShop();
            //分配分类选择
            $this->setCategory();
            //分配地区选择
            $this->setLocality();
            $this->assign('goods_server',C('goods_server'));
            //显示模板
    		$this->display();
    		exit;
    	} 
    	//获得分类的数据
    	$data=$this->getData();
      
    	if($this->db->addGoods($data)){
    		//成功跳转
    		$this->success('添加成功',U('goods/index'));
    	}else{
    		throw new Exception('添加失败'.$this->db->getLastSql());
    	}
    	
    }
    /**
	* 编辑分类
	*/
    public function edit(){
        if(IS_GET===true){
            //分配分类选择
            $this->setCategory();
            //分配地区选择
            $this->setLocality();
            $this->assign('goods_server',C('goods_server'));

            $info=$this->db->getGoodsFind($this->gid);

            $info['goods_server']=unserialize($info['goods_detail']['goods_server']);
            $info['detail']=$info['goods_detail']['detail'];
        
            $this->assign('info',$info);
     
            //显示模板
            $this->display();
            exit;
        }

        $data=$this->getData();

        if($this->db->editGoods($data,$this->gid)){
            $this->success('编辑成功！',U('goods/index'));
        }else{
           $this->error('没有改动！',U('goods/index'));
        }

    }
    /**
    * 删除商品
    */
    public function del(){
        //删除旧文件
        $this->delOldFile($this->gid);
        if($this->db->delGoods($this->gid)){
            
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败');
        }
    }
    /**
    * 删除旧的文件
    */
    public function delOldFile($gid){
        $info=$this->db->getGoodsFind($gid);
        $array=explode(',',$info['goods_img']);
        foreach($array as $v){

            if(is_file(ROOT_PATH.$v)){
                unlink(ROOT_PATH.$v);
            }
        }
    }
    /**
	* 处理提交的数据
	*/
    private function getData(){
    	$data=array();
        $data['goods']['shopid']=intval($_POST['shopid']);
        $data['goods']['cid']=intval($_POST['cid']);
        $data['goods']['lid']=intval($_POST['lid']);
    	$data['goods']['main_title']=I('post.main_title');
    	$data['goods']['sub_title']=htmlspecialchars($_POST['sub_title']);
    	$data['goods']['price']=htmlspecialchars($_POST['price']);
    	$data['goods']['old_price']=htmlspecialchars($_POST['old_price']);
        $data['goods']['goods_img']=htmlspecialchars($_POST['goods_img']);
        $data['goods_detail']['detail']=$_POST['detail'];
        $data['goods_detail']['goods_server']=serialize($_POST['goods_server']);
    	return $data;
    }
    /**
    * 分配当前商铺信息
    */
    private function setShop(){
        $shopid=intval($_GET['shopid']);
        $db=D('Shop');
        $shop=$db->getShopFind($shopid);
        $this->assign('shop',$shop);
    }
    /**
    * 设置分类选择的数据
    */
    private function setCategory(){
        $db=D('Category');
        $category=$db->getCategoryAll();
        import('ORG.Util.Data');
        $category=Data::tree($category,'','cid','pid');
        $this->assign('category',$category);
    }
    /**
    * 设置地区选择的数据
    */
    private function setLocality(){
        $db=D('Locality');
        $level=$db->getLocalityAll();
        import('ORG.Util.Data');
        $level=Data::tree($level,'','lid','pid');
        $this->assign('locality',$level);
    }


}