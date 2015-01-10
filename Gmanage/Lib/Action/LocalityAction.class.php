<?php
/**
* 地区控制器
* @author 陶士涵
* @time 2015年1月9日22:15:41
*/
class LocalityAction extends CommonAction {
    private $lid;//地区id

    /*初始化*/
    public function _auto(){
        $this->db=D('Locality');
        $this->lid=intval($_GET['lid']);
    }
    /*显示地区列表*/
    public function index(){
        $category=$this->db->getLocalityAll();
        import('ORG.Util.Data');
        $data=Data::tree($category,'','lid','pid');

        $this->assign('data',$data);
        $this->display();
    }
    /**
    * 添加地区
    */
    public function add(){
        if(IS_GET===true){
            //查询父类的信息
            $parent=$this->db->getParentInfo($this->lid);
            $this->assign('parent',$parent);

            //获取所有的分类用于选择
            $level=$this->db->getLocalityAll();
            import('ORG.Util.Data');
            $level=Data::tree($level,'','lid','pid');
            $this->assign('level',$level);

            $this->display();
            exit;
        }

        //获得地区的数据
        $data=$this->getData();
        if($this->db->addLocality($data)){
            //成功跳转
            $this->success('添加成功',U('locality/index'));
        }else{
            echo $this->db->getLastSql();
            throw new Exception('添加地区失败');
        }
    }
    /**
    * 编辑地区
    */
    public function edit(){
        if(IS_GET===true){
            

            //获取所有的地区用于选择
            $level=$this->db->getLocalityAll();
            import('ORG.Util.Data');
            $level=Data::tree($level,'','lid','pid');
            $this->assign('level',$level);

            $info=$this->db->getLocalityFind($this->lid);
            $this->assign('info',$info);

            //查询父类的信息
            $parent=$this->db->getParentInfo($info['pid']);
            $this->assign('parent',$parent);

            $this->display();
            exit;
        }

        $data=$this->getData();
        if($this->db->editLocality($data,$this->lid)){
            $this->success('编辑成功！',U('Locality/index'));
        }else{
           $this->error('没有改动！',U('Locality/index'));
        }

    }
    /**
    * 删除分类
    */
    public function del(){
        if($this->db->checkSon($this->lid)){
            $this->error('请先删除子地区');
        }
        if($this->db->delLocality($this->lid)){
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
        $data['lname']=I('post.lname');
        $data['sort']=intval($_POST['sort']);
        $data['pid']=intval($_POST['pid']);
        $data['display']=intval($_POST['display']);
        return $data;
    }
}