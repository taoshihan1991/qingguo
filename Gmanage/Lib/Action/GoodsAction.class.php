<?php
/**
* 商品控制器
* @author 陶士涵
* @time 2015年1月10日19:19:06
*/
class GoodsAction extends CommonAction {

    private $cid;//分类id

	/*初始化*/
    public function _auto(){
    	/*实例化模型*/
        $this->db=D('Category');
        $this->cid=intval($_GET['cid']);
    }
    /*显示分类列表*/
    public function index(){
    	$category=$this->db->getCategoryAll();
    	import('ORG.Util.Data');
    	$data=Data::tree($category,'','cid','pid');

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
            //显示模板
    		$this->display();
    		exit;
    	} 
    	//获得分类的数据
    	$data=$this->getData();
    	if($this->db->add($data)){
    		//成功跳转
    		$this->success('添加成功',U('category/index'));
    	}else{
    		throw new Exception('添加分类失败');
    	}
    	
    }
    /**
	* 编辑分类
	*/
    public function edit(){
        if(IS_GET===true){
            

            //获取所有的分类用于选择
            $level=$this->db->getCategoryAll();
            import('ORG.Util.Data');
            $level=Data::tree($level,'','cid','pid');
            $this->assign('level',$level);

            $category=$this->db->getCategoryFind($this->cid);
            $this->assign('category',$category);

            //查询父类的信息
            $parent=$this->db->getParentInfo($category['pid']);
            $this->assign('parent',$parent);

            $this->display();
            exit;
        }

        $data=$this->getData();
        if($this->db->editCategory($data,$this->cid)){
            $this->success('编辑成功！',U('category/index'));
        }else{
           $this->error('没有改动！',U('category/index'));
        }

    }
    /**
    * 删除分类
    */
    public function del(){
        if($this->db->checkSon($this->cid)){
            $this->error('请先删除子分类');
        }
        if($this->db->delCategory($this->cid)){
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败');
        }
    }
    /**
	* 处理提交的数据
	*/
    private function getData(){
    	$data=array();
    	$data['cname']=I('post.cname');
    	$data['title']=htmlspecialchars($_POST['title']);
    	$data['keywords']=htmlspecialchars($_POST['keywords']);
    	$data['description']=htmlspecialchars($_POST['description']);
    	$data['sort']=intval($_POST['sort']);
    	$data['pid']=intval($_POST['pid']);
    	$data['display']=intval($_POST['display']);
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