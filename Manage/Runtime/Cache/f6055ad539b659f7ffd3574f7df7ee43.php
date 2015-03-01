<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
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

				K('#image1').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#url1').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url1').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				
			});
		</script>
<!--kindeditor-->
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
                <td width="4%" height="19" valign="bottom"><div align="center"><img src="__PUBLIC__/images/tb.gif" width="14" height="14" /></div></td>
                <td width="96%" valign="bottom"><span class="STYLE1">文章添加</span></td>
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
  
	<form name="addNEWS" id="AddPro" method="post" action="<?php echo U('Xw/insert');?>"  >
	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="50" colspan="2" bgcolor="d3eaef" class="STYLE10"><div align="center">文章添加</div></td>
        </tr>
      <tr>
        <td width="19%" height="30" bgcolor="#FFFFFF"><div align="right">标题：</div></td>
        <td width="81%" bgcolor="#FFFFFF"><div align="left">&nbsp;&nbsp;
          <input name="title" type="text" id="title" style="width:200px; height:17px; border:solid 1px #153966; font-size:12px; color:#283439; "/>
        </div></td>
      </tr>
      <tr>
        <td width="19%" height="30" bgcolor="#FFFFFF"><div align="right">图片：</div></td>
        <td width="81%" bgcolor="#FFFFFF"><div align="left">&nbsp;&nbsp;
           <span id="picdr" style="padding-right:2px;">
		<input type="text" id="url1" value="" name="pic1"/> <input type="button" id="image1" value="选择图片" />（网络图片 + 本地上传）</span>
        </div></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#FFFFFF"><div align="right">分类：</div></td>
        <td bgcolor="#FFFFFF"><div align="left">&nbsp;&nbsp;&nbsp;
			<select  name="topid">
			<?php if(is_array($xwClass)): foreach($xwClass as $key=>$v): ?><option value='<?php echo ($v["id"]); ?>'><?php $__FOR_START_28976__=0;$__FOR_END_28976__=$v['lev'];for($i=$__FOR_START_28976__;$i < $__FOR_END_28976__;$i+=1){ ?>&nbsp;&nbsp;<?php } ?>|-<?php echo ($v["classname"]); ?></option><?php endforeach; endif; ?>
			</select>
		</div></td>
      </tr>
      <tr>
        <td width="19%" height="30" bgcolor="#FFFFFF"><div align="right">内容：</div></td>
        <td width="81%" bgcolor="#FFFFFF"><div align="conter">
          <textarea id="elm1" name="content" rows="20" cols="50"  style="width:98%"></textarea>
        </div></td>
      </tr>
      <tr>
        <td width="19%" height="30" bgcolor="#FFFFFF"><div align="right">关健词：</div></td>
        <td width="81%" bgcolor="#FFFFFF"><div align="left">&nbsp;&nbsp;
         <input name="key" type="text" id="key" size="45" maxlength="80" />
        </div></td>
      </tr>
      <tr>
        <td width="19%" height="30" bgcolor="#FFFFFF"><div align="right">描述：</div></td>
        <td width="81%" bgcolor="#FFFFFF"><div align="left">&nbsp;&nbsp;
          <textarea name="ms" id="ms" cols="45" rows="5" onKeyDown="MaxInput(this.form)" onKeyUp="MaxInput(this.form)"></textarea>
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
<script language="JavaScript">
<!--可以输入的最大字符数 -->
maxLength = 120; 
function MaxInput(form) {
if (form.ms.value.length > maxLength) 
form.ms.value = form.ms.value.substring(0, maxLength);
else form.TLength.value = maxLength - form.ms.value.length;
}
</script>

</body>
</html>