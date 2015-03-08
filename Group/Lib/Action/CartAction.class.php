<?php
/**
* 青果团购购物车控制器
* @author 陶士涵
* @time 2015年3月2日22:08:43
*/
class CartAction extends CommonAction {
    private $uid=null;
    /**
    * 初始化
    */
    public function _auto(){
        if(isset($_SESSION[C('RBAC_AUTH_KEY')])){
             $this->uid=$_SESSION[C('RBAC_AUTH_KEY')];
             //把session数据写入购物车表
             $this->writeCart();
         }
    }
    /**
    * 显示购物车页
    */
    public function index(){
    	$goods=$this->getCartData();
    	$cart=$this->disCart($goods);
 		foreach($cart[0] as $k=>$v){
 			$cart[0][$k]['url']=U('Detail/index',array('gid'=>$v['gid']));
 			$cart[0][$k]['image']=getPicUrl($v['goods_img'],'mini');
 		}
 		/*导航栏鼠标移入*/
 		if(IS_AJAX===true){
 			if(!$cart){
 				$result=array('status'=>false);
 			}else{
 				$result=array('status'=>true,'data'=>$cart[0]);
 			} 
 			exit(json_encode($result));
 		}

    	$this->assign('cart',$cart[0]);
    	$this->assign('total',$cart[1]);
        $this->display();
    }
    /**
    * 获取购物车数据
    */
    public function getCartData(){
    	$db=D('Cart');
    	$result=array();
    	if(is_null($this->uid)){
    		if(!isset($_SESSION['cart']['goods'])) return;
    		$carts=$_SESSION['cart']['goods'];
    		foreach($carts as $v){
    			$data=array();
    			$data=$db->getGoods(array('gid'=>$v['id']));
    			$data['goods_num']=$v['num'];
    			$result[]=$data;
    		}
    	}else{
    		$uid=$this->uid;
	    	$carts=$db->getCart(array('user_id'=>$uid));
	    	foreach($carts as $v){
    			$data=array();
    			$data=$db->getGoods(array('gid'=>$v['goods_id']));
    			$data['goods_num']=$v['goods_num'];
    			$result[]=$data;
    		}
    	}
    	return $result;
    }
    /**
    * 处理购物车数据
    */
    public function disCart($cart){
    	if(empty($cart)) return false;
    	$total=0;
    	foreach ($cart as $k => $v) {
    		$cart[$k]['xiaoji']=$v['goods_num']*$v['price'];
    		$cart[$k]['status']=$v['endtime']<time() ? '已下架':'可购买';
    		$total+=$cart[$k]['xiaoji'];
    	}

    	return array($cart,$total);
    }
    /**
    * 添加购物车
    */
    public function add(){
        if(IS_AJAX===false) $this->error('非法请求');
        $result=array();
        if(is_null($this->uid)){
            $data=array();
            $data['id']=intval($_GET['gid']);
            $data['price']=0;
            $data['num']=1;
            $this->addCartBySESSION($data);
            $result=array('status'=>true,'kind'=>$_SESSION['cart']['kind']);

        }else{//用户登录
            $data=array();
            $data['goods_id']=intval($_GET['gid']);
            $data['user_id']=$this->uid;
            $data['goods_num']=1;
            $kind=$this->checkAdd($data);
            if($kind){
            	$db=D('Cart');
            	$uid=$this->uid;
            	$where=array('user_id'=>$uid);
            	$total=$db->countCart($where);
        		$result=array('status'=>true,'kind'=>$total);
        	}else{
        		$result=array('status'=>false);
        	}
        }
        exit(json_encode($result));

    }
    /*
    添加购物车session方式
    @ author tsh
    @ 使用方式
            $data=array();
            $data['id']=intval($_GET['id']);
            $data['price']=0;
            $data['num']=intval($_GET['num']);

            addCartBySESSION($data)
    @ 返回结果
            $_SESSION的值
            Array(
                [cart] => Array(
                        [kind] => 1
                        [total] => 6
                        [goods] => Array(
                                [0] => Array(
                                        [id] => 2
                                        [price] => 0
                                        [num] => 6
                                 )
                        
                )
            )
    */
    public function addCartBySESSION($data){
        $goods=$_SESSION['cart']['goods'];
        //商品总数
        $total=0;
        if(empty($goods)){
                $goods[]=$data;
                $total=$data['num'];
        }else{
            $flag=false;
            foreach($goods as $k=>$v){
                    if($v['id']==$data['id']){
                         $goods[$k]['num']=$goods[$k]['num']+$data['num'];
                         $flag=true;
                    }
             }
           if(!$flag) $goods[]=$data;
           foreach ($goods as $v) {
                $total+=$v['num'];
           }
        }
        //商品种类数量
        $_SESSION['cart']['kind']=count($goods);
        //商品总数

        $_SESSION['cart']['total']=$total;
        $_SESSION['cart']['goods']=$goods;
    }

    /*
	session数据写入购物车表
    */
    private function writeCart(){
    	if(!isset($_SESSION['cart']['goods'])) return;
    	$cart=$_SESSION['cart']['goods'];

    	foreach($cart as $v){
    		$data=array();
    		$data['user_id']=$this->uid;
    		$data['goods_num']=$v['num'];
    		$data['goods_id']=$v['id'];
    		$this->checkAdd($data);
    	}
    	unset($_SESSION['cart']);
    }
    /*
	验证添加
	存在自增加购物车商品数量
	不存在添加新数据
    */
    private function checkAdd($data){
    	$where=array(
    		'user_id'=>$data['user_id'],
    		'goods_id'=>$data['goods_id']
    	);
    	$db=D("Cart");

    	if($db->checkCart($where)){
    		$res=$db->incCart($where,$data['goods_num']);
    	}else{
    		$res=$db->addCart($data);
    	}
    	if($res){
    		return true;
    	}else{
    		return false;
    	}
    }
    /**
    * ajax修改购物车数量
    */
    public function ajaxUpdateCartNum(){
    	if(IS_AJAX===false) return false;
    	$gid=intval($_POST['gid']);
    	$num=intval($_POST['num']);
    	if(!$gid || !$num) return false;

    	$result=array('status'=>false);
    	//用户没有登录
    	if(is_null($this->uid)){
    		foreach($_SESSION['cart']['goods'] as $k=>$v){
    			if($v['id']==$gid){
    				$_SESSION['cart']['goods'][$k]['num']=$num;
    			}
    		}
    		$result=array('status'=>true);
    	}else{//已登录
    		$db=D('Cart');
    		$where=array(
    			'user_id'=>$this->uid,
    			'goods_id'=>$gid
    		);
    		$res=$db->updateCartGoodsNum($where,$num);
    		if($res) $result=array('status'=>true);
    	}
    	exit(json_encode($result));
    }
    /**
    * ajax删除购物车数据
    */
    public function ajaxDelCartGoods(){
    	if(IS_AJAX===false) return false;
    	$gid=intval($_POST['gid']);
    	$result=array('status'=>false);
    	//没有登录
    	if(is_null($this->uid)){
    		foreach($_SESSION['cart']['goods'] as $k=>$v){
    			if($v['id']==$gid){
    				unset($_SESSION['cart']['goods'][$k]);
    				$result=array('status'=>true);
    			}
    			continue;
    		}

    	}else{//已经登录
    		$db=D('Cart');
    		$where=array(
    			'user_id'=>$this->uid,
    			'goods_id'=>$gid
    		);
    		$res=$db->delCartGoods($where);
    		if($res) $result=array('status'=>true);
    	}
    	exit(json_encode($result));
    }
}