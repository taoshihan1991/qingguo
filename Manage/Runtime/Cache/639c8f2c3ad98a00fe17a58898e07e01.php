<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站设置</title>
<script type="text/javascript" src="__PUBLIC__/zd_js/jquery-1.4.2.js"></script>
<script type="text/javascript" charset="utf-8"  src="__PUBLIC__/zd_js/xheditor.js"></script>
<script type="text/javascript" language="javascript">
$(pageInit);
function pageInit()
{
$('#elm1').xheditor({skin:'vista',forcePtag:false,upMultiple:1,upLinkUrl:'up2.asp',upImgUrl:'up2.asp',upFlashUrl:'up2.asp',upMediaUrl:'up2.asp'});
$('#elm2').xheditor({skin:'vista',forcePtag:false,upMultiple:1,upLinkUrl:'up2.asp',upImgUrl:'up2.asp',upFlashUrl:'up2.asp',upMediaUrl:'up2.asp'});
}
</script>
<script>
var str="";
function check(obj){
str1 = obj.value.replace(/\r\n/ig,"");//去掉串中的换行回车符
n = str1.length;//总字数
if (n<=80){//判断总字数是否大于50
str = obj.value;
show.innerText = n;
}
else{
obj.value = str;
alert("总字数超过80");
}
}

var str="";
function checks(obj){
str1 = obj.value.replace(/\r\n/ig,"");//去掉串中的换行回车符
n = str1.length;//总字数
if (n<=200){//判断总字数是否大于50
str = obj.value;
show.innerText = n;
}
else{
obj.value = str;
alert("总字数超过200");
}
}
</script>
<style type="text/css">
<!--
body {
	margin-left: 3px;
	margin-top: 0px;
	margin-right: 3px;
	margin-bottom: 0px;
}
.STYLE1 {
	color: #e1e2e3;
	font-size: 12px;
}
.STYLE6 {color: #000000; font-size: 12; }
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
	color: #344b50;
	font-size: 12px;
}
.STYLE21 {
	font-size: 12px;
	color: #3b6375;
}
.STYLE22 {
	font-size: 12px;
	color: #295568;
}
body,td,th {
	font-size: 12px;
}
-->
</style>
</head>

<body>

	<form method=Post action="<?php echo U('config/update');?>">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="4%" height="19" valign="bottom"><div align="center"><img src="__PUBLIC__/images/tb.gif" width="14" height="14" /></div></td>
                <td width="96%" valign="bottom"><span class="STYLE1">网站设置</span></td>
              </tr>
            </table></td>
            <td><div align="right"></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="50" colspan="2" bgcolor="d3eaef" class="STYLE10"><div align="center"><span class="STYLE10">网站设置</span></div></td>
        </tr>
        <tr>
        <td width="17%" height="30" bgcolor="#FFFFFF"><div align="right">网站名称：</div></td>
        <td width="83%" height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
            <div align="left">&nbsp;
                <input name="name" type="text" id="name" style="width:500px; height:17px; border:solid 1px #153966; font-size:12px; color:#283439; " value="<?php echo ($setup["name"]); ?>" />
              例：智得网络</div>
        </div></td>
      </tr>
      <tr>
        <td width="17%" height="30" align="right" bgcolor="#FFFFFF"><div align="right">网站标题：</div>
          <div align="center"></div>          <div align="center"></div></td>
        <td width="83%" height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
          <div align="left">
            &nbsp;&nbsp;<input name="title" type="text" id="title" style="width:500px; height:17px; border:solid 1px #153966; font-size:12px; color:#283439; " value="<?php echo ($setup["title"]); ?>"/>
          最多不要超过80个字</div>
        </div></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#FFFFFF"><div align="right">网站关键词：</div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
          <div align="left">&nbsp;
            <input name="key" type="text" id="key" style="width:500px; height:17px; border:solid 1px #153966; font-size:12px; color:#283439; " value="<?php echo ($setup["keywords"]); ?>" />
          最多不要超过100个字</div>
        </div></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#FFFFFF"><div align="right">网站描述：</div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
          <div align="left">
            &nbsp;
            <textarea name="ms" id="ms" onpropertychange="checks(this)" style="width:500px; height:100px; border:solid 1px #153966; font-size:12px; color:#283439; "><?php echo ($setup["descriptions"]); ?></textarea>
          最多不要超过200个字</div>
        </div></td>
      </tr>
      <tr>
        <td width="17%" height="30" bgcolor="#FFFFFF"><div align="right">网站网址：</div></td>
        <td width="83%" height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
            <div align="left">&nbsp;
                <input name="web" type="text" id="web" style="width:500px; height:17px; border:solid 1px #153966; font-size:12px; color:#283439; " value="<?php echo ($setup["weburl"]); ?>" />
              例：http://www.zhde.cn </div>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="right"><div align="center">
          <input type="submit" name="Submit" value="设置网站" />
          <input name="newid" type="hidden"  value="<?php echo ($setup["id"]); ?>" />
          <input type="reset" name="Submit2" value="重置" /></td>
  </tr>
  <tr>
    <td height="30" align="right">&nbsp;</td>
  </tr>
</table>
</form>

</body>
</html>