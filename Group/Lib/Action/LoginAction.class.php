<?php
/**
* 青果团购个人中心登陆注册控制器
* @author 陶士涵
* @time 2015年2月25日16:53:49
*/
class LoginAction extends CommonAction {
    /**
    * 用户登陆
    */
    public function index(){
        $this->display();
    }
    /**
    * 用户注册
    */
    public function register(){
        $this->display();
    }
    /**
    * 验证码
    */
    public function showCode(){
        import("ORG.Util.Image");
        Image::buildImageVerify(4,1,"png");
    }
    /**
    * ajax校验
    */
    public function check(){
        //验证是否为ajax请求
        if(IS_AJAX===false){
            $this->error('非法请求');
        }
        $this->db=D('User');
        $key=addslashes(key($_POST));
        $value=addslashes($_POST[$key]);
        switch($key){
            case 'email':
                if($this->db->check('email',$value)){
                    $data=array('status'=>false,'msg'=>'该邮箱存在');
                }else{
                    $data=array('status'=>true);
                }
                break;
            case 'username':

                if($this->db->check('uname',$value)){
                    $data=array('status'=>false,'msg'=>'该用户名存在');
                }else{
                    $data=array('status'=>true);
                }

                break;
            case 'code':
                if(md5($value)!=$_SESSION['verify']){
                    $data=array('status'=>false,'msg'=>'验证码错误');
                }else{
                    $data=array('status'=>true);
                }
                break;

        }
        exit(json_encode($data));
    }
    /**
    * 添加用户
    */
    public function addUser(){
        if(IS_POST===false) $this->error('请求非法');
        $this->db=D('User');
        $data=array();
        $data['email']=htmlspecialchars($_POST['email']);
        $data['uname']=htmlspecialchars($_POST['username']);
        $data['password']=md5($_POST['password']);
        $uid=$this->db->addUser($data);
        if($uid){
            $_SESSION[C('RBAC_AUTH_KEY')]=$uid;
            setcookie(session_name(),session_id(),time()+C('COOKIE_LIFE_TIME'),'/');
            $this->success('注册成功');
        }else{
            $this->error('注册失败',U('Index/index'));
        }
    }
    /**
    * 验证登陆
    */
    public function login(){
        if(!IS_POST) $this->error('非法请求');
        $this->db=D('User');
        $data=array();
        $data['uname']=htmlspecialchars($_POST['username']);
        $data['password']=md5($_POST['password']);
        $where=array('uname'=>$data['uname'],'email'=>$data['uname'],'_logic'=>'or');
        $info=$this->db->getUser($where);
        if($info['password']==$data['password']){
            $_SESSION[C('RBAC_AUTH_KEY')]=$info['uid'];
            if(isset($_POST['auto_login'])){
                setcookie(session_name(),session_id(),time()+C('COOKIE_LIFE_TIME'),'/');
            }
            $this->success('登陆成功',U('Member/index'));
        }else{
            $this->error('登陆失败',U('Index/index'));
        }
    }
    /**
    * 退出登陆
    */
    public function quit(){
        setcookie(session_name(),session_id(),time()-1,'/');
        session_unset();
        session_destroy();
        $this->success('退出成功',U('Index/index'));
    }
}