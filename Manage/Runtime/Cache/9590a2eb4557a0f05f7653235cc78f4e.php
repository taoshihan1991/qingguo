<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理</title>
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
form{margin:0px;}
-->
</style>
</head>

<body>
	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="4%" height="19" valign="bottom"><div align="center"><img src="images/tb.gif" width="14" height="14" /></div></td>
                <td width="96%" valign="bottom"><span class="STYLE1">关键词添加</span></td>
              </tr>
            </table>			</td>
            <td>&nbsp;</td>
          </tr>
        </table>		</td>
      </tr>
    </table>	</td>
  </tr>
  <tr>
    <td>
	<form name="addNEWS" id="AddPro" method="post" action="<?php echo U('Key/insert');?>"  >
	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="50" colspan="2" bgcolor="d3eaef" class="STYLE10"><div align="center">关键词添加</div></td>
        </tr>
      <tr>
        <td width="34%" height="30" bgcolor="#FFFFFF"><div align="right">关键词：</div></td>
        <td width="66%" bgcolor="#FFFFFF"><div align="left">&nbsp;&nbsp;
          <input name="title" type="text" id="title" style="width:200px; height:17px; border:solid 1px #153966; font-size:12px; color:#283439; "/>
        </div></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#FFFFFF"><div align="right">链接地址：</div></td>
        <td bgcolor="#FFFFFF"><div align="left">&nbsp;&nbsp;
          <input name="link" type="text" id="link" style="width:200px; height:17px; border:solid 1px #153966; font-size:12px; color:#283439; "/>
          例:http://www.zhde.cn
        </div></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;&nbsp;
          <input type="submit" name="Submit" value="提交" />
          <input type="reset" name="Submit2" value="重置" /></td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
  <tr>
    <td height="30" align="right">&nbsp;</td>
  </tr>
</table>


</body>
</html>