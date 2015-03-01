<?php
// 后台公共类
class PublicAction extends Action {
    public function top(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		$this->display();
    }
	public function center(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		$this->display();
    }
	public function end(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		$this->display();
    }

	public function menu(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		$this->display();
    }

	public function main(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		//欢迎页面
		$ip=get_client_ip();
		$admin = $_SESSION['admin']['name'];
		$info = array(
				'操作系统'=>PHP_OS,
				'运行环境'=>$_SERVER["SERVER_SOFTWARE"],
				'PHP运行方式'=>php_sapi_name(),
				'当前登录管理员'=>"用户名:{$admin}&nbsp;&nbsp;&nbsp;&nbsp;登录IP:{$ip}&nbsp;&nbsp;",
				'上传附件限制'=>ini_get('upload_max_filesize'),
				'执行时间限制'=>ini_get('max_execution_time').'秒',
				'服务器时间'=>date("Y年n月j日 H:i:s"),
				'北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
				'服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
				'剩余空间'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
				'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
				'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
				'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
				);
		$this->assign('info',$info);
		$this->display();
    }

	//登陆
	public function login(){
		$this->display();
	}

	//验证码
	public function checkcode(){
		import("ORG.Util.Image");
		Image::buildImageVerify(4,1,"png");
	}

	//登陆验证
	public function check(){
		
		$zd_name=htmlspecialchars(trim($_POST['zd_name']));
		$zd_pass=htmlspecialchars(trim($_POST['zd_pass']));
		$code=trim($_POST['code']);
		if (empty($zd_name)) {
			$this->error('账号不能为空',U('login'));
			exit;
		}elseif(empty($zd_pass)){
			$this->error('密码不能为空',U('login'));
			exit;
		}elseif(empty($code)){
			$this->error('验证码不能为空',U('login'));
			exit;
		}elseif(md5($code) != $_SESSION['verify']){
			$this->error('验证码不正确',U('login'));
			exit;
		}

		$user=(M('Admin')->where("ad_name='{$zd_name}'")->find());
		if($user['ad_pass']&&$user['ad_pass']==$zd_pass){
			$_SESSION['admin']=array('id'=>$user['id'],'name'=>$user['ad_name'],'state'=>$user['state']);
			$this->success('登陆成功',U('Index/index'));
			exit;
		}else{
			$this->error('用户名或密码错误！',U('login'));
			exit;
		}
		
		
	}

	 public function clearCache($type=0,$path=NULL) {
		 //验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
       //前台页面
			  header("Content-type: text/html; charset=utf-8");
			  //清文件缓存
			  $dirs = array('Runtime/App');
			  @mkdir('Runtime',0777,true);
			  //清理缓存
			  foreach($dirs as $value) {
			   $this->rmdirr($value);
			  }
			 $this->error("缓存清理成功！",U('main'));  



    }

	 public function rmdirr($dirname) {
		  if (!file_exists($dirname)) {
		   return false;
		  }
		  if (is_file($dirname) || is_link($dirname)) {
		   return unlink($dirname);
		  }
		  $dir = dir($dirname);
		  if($dir){
		   while (false !== $entry = $dir->read()) {
			if ($entry == '.' || $entry == '..') {
			 continue;
			}
			//递归
			$this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
		   }
		  }
		  $dir->close();
		  return rmdir($dirname);
	 }

	//退出
	public function loginout(){
		$_SESSION['admin']=null;
		unset($_SESSION['admin']);
		$this->error('退出成功',U('Public/login'));
		exit;
	}


}