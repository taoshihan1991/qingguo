<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>单页管理</title>
<link href="__PUBLIC__/images/skin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/zd_js/jquery-1.4.2.js"></script>
<!--kindeditor-->
<link rel="stylesheet" href="__PUBLIC__/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script>
<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true
				});

				K('#submit').click(function(e) {
					var str=editor.html();
					$('#content').html(str);
				});
				
			});
		</script>
<!--kindeditor-->
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
.t1 {background-color:#336699;text-align:center}
.t2 {background-color:#ffcc00;text-align:center}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="4%" height="19" valign="bottom"><div align="center"><img src="__PUBLIC__/images/tb.gif" width="14" height="14" /></div></td>
                <td width="96%" valign="bottom"><span class="STYLE1">单页管理</span></td>
              </tr>
            </table></td>
            <td><div align="right"></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
	<form name="addNEWS" id="AddPro" method="post" action="<?php echo U('About/modify');?>">
	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"  id="table1">
      <tr>
        <td height="50" colspan="2" bgcolor="d3eaef" class="STYLE10"><div align="center">单页管理</div>          </td>
        </tr>
      <tr>
        <td width="19%" height="30" bgcolor="#FFFFFF"><div align="right" class="STYLE21">栏目名称：</div></td>
        <td width="81%" bgcolor="#FFFFFF">&nbsp;<?php echo ($v["title"]); ?></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#FFFFFF"><div align="right" class="STYLE21">栏目内容：</div></td>
        <td bgcolor="#FFFFFF"><textarea id="elm1" name="content" rows="20" cols="50"  style="width:100%"><?php echo ($v["content"]); ?></textarea></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交" class="input">
          <input type="hidden" name="Id" value="<?php echo ($v["id"]); ?>">
        <input type="reset" name="Submit2" value="重置" class="input"> </td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
  <tr>
    <td height="30" align="right"></td>
  </tr>
</table>
</body>
</html>