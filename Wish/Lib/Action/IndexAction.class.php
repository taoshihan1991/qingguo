<?php
/*
许愿墙控制器
@author 陶士涵
*/

class IndexAction extends Action {
	/*
	默认前台方法
	@return void
	*/
    public function index(){
    	$a=M('wish');
    	$list=$a->select();
    	foreach ($list as $k => $v) {
    		$list[$k]['content']=$this->changeface($v['content']);
    		$list[$k]['time']=$this->time_format($v['time']);
    	}
    	$this->assign('list',$list);
    	$this->display();
    }
    /**
    * 异步发表愿望
    * @return void
    */
    public function ajaxsubmit(){
    	$username=htmlspecialchars($_POST['username']);
    	$content=htmlspecialchars($_POST['content']);

    	if(count($username)>40 || empty($username)) exit;
    	if(count($content)>200 || empty($content)) exit;
    	$color=mt_rand(1,4);

    	$data=array(
    		'nickname'=>$username,
    		'content'=>$content,
    		'time'=>time()
    	);
    	$content=$this->changeface(htmlspecialchars($_POST['content']));
    	$id=M('wish')->add($data);
    	$html=<<<str
    	<dl class="paper a{$color}">
			<dt>
				<span class="username">{$username}</span>
				<span class="num">No{$id}</span>
			</dt>
			<dd class="content">{$content}</dd>
			<dd class="bottom">
				<span class="time">刚刚</span>
				<a href="" class="close"></a>
			</dd>
		</dl>
str;
		echo $html;

    }

    /**
    * 替换表情
    * @param string 需要替换的字符串
    * @return string 替换完成后的字符串
    */
    public function changeface($str){

    	$arr=array(
    		'zhuakuang'=>'抓狂',
    		'baobao'=>'抱抱',
    		'haixiu'=>'害羞',
    		'ku'=>'酷',
    		'xixi'=>'嘻嘻',
    		'taikaixin'=>'太开心',
    		'touxiao'=>'偷笑',
    		'qian'=>'钱',
    		'huaxin'=>'花心',
    		'jiyan'=>'挤眼'
    	);
    	$preg="/\[(.*?)\]/";
    	preg_match_all($preg, $str, $temp);
    	$image=ROOT_URL.'Wish/Tpl/Public/Images/phiz/';
    	/*循环匹配到的词语*/
    	foreach($temp[1] as $k=>$v){
    		/*循环表情数组*/
    		foreach($arr as $f=>$r){
    			/*判断匹配到的和表情数组一致*/
    			if($r==$v){
    				/*替换汉字为图片路径*/
    				$str=str_replace('['.$v.']', "<img src='{$image}{$f}.gif' alt='{$v}' title='{$v}'/>", $str);
    			}
    		}

    	}

    	return $str;
    }

    /**
    * 日期替换
    * @param int 需要替换的时间戳
    * @return string 格式化完成后的
    */
	public function time_format($time){

	$now=time();
	//今天零时零分零秒
	$today=strtotime(date('Y-m-d',time()));

	//传递时间与当前时间秒相差
	$diff=$now-$time;
	
	$str='';
	switch($time){
		case $diff<60:
			$str=$diff.'秒前';
		break;

		case $diff<3600:
			$str=floor($diff/60).'分钟前';
		break;

		case $diff<(3600*8):
			$str=floor($diff/3600).'小时前';
		break;

		case $time>$today:
			$str='今天'.date('H:i',$time);
		break;

		default:
			$str=date('Y-m-d H:i:s',$time);
	}

	return $str;
}

}