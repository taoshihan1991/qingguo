<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>软件管理优化系统后台登陆验证</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	overflow:hidden;
}
.STYLE3 {font-size: 12px; color: #adc9d9; }
-->
</style></head>

<body>
<form name="myform" action="<?php echo U('Public/check');?>" method="post">
<table width="100%"  height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#1075b1">&nbsp;</td>
  </tr>
  <tr>
    <td height="608" background="__PUBLIC__/images/login_03.gif"><table width="847" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="837" height="318" background="__PUBLIC__/images/login_04.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td height="84"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="381"><img src="__PUBLIC__/images/login_06.gif" width="381" height="84"></td>
            <td width="163" background="__PUBLIC__/images/login_07.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="44" height="24" valign="bottom"><div align="right"><span class="STYLE3">用户</span></div></td>
                <td width="10" valign="bottom">&nbsp;</td>
                <td height="24" colspan="2" valign="bottom"><div align="left">
                    <input type="text" name="zd_name" id="username" style="width:100px; height:17px; background-color:#87adbf; border:solid 1px #153966; font-size:12px; color:#283439; ">
                </div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="right"><span class="STYLE3">密码</span></div></td>
                <td width="10" valign="bottom">&nbsp;</td>
                <td height="24" colspan="2" valign="bottom"><input type="password" name="zd_pass" id="password" style="width:100px; height:17px; background-color:#87adbf; border:solid 1px #153966; font-size:12px; color:#283439; "></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="right"><span class="STYLE3">验证码</span></div></td>
                <td width="10" valign="bottom">&nbsp;</td>
                <td width="52" height="24" valign="bottom"><input type="text" name="code" id="code" style="width:50px; height:17px; background-color:#87adbf; border:solid 1px #153966; font-size:12px; color:#283439; "></td>
                <td width="62" valign="bottom"><div align="left"><img src="<?php echo U('Public/checkCode');?>" onclick="this.src=this.src+'?'+Math.random()" style="cursor:pointer;" title="看不清?点击刷新"/></div></td>
              </tr>
              <tr></tr>
            </table></td>
            <td width="26"><img src="__PUBLIC__/images/login_08.gif" width="26" height="84"></td>
            <td width="66" background="__PUBLIC__/images/login_09.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="25"><div align="center">
                  <input type="image" name="submit" src="__PUBLIC__/images/dl.gif">
                </div></td>
              </tr>
              <tr>
                <td height="25"><div align="center"><img src= "__PUBLIC__/images/cz.gif" onclick= "javascript:form1.reset() "></div></td>
              </tr>
            </table></td>
            <td width="211"><img src="__PUBLIC__/images/login_10.gif" width="211" height="84"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="206" background="__PUBLIC__/images/login_11.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#152753">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>