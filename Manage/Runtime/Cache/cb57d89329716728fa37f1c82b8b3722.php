<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理</title>
<SCRIPT language=javascript>
function CheckAll(form)
{
  for (var ii=0;ii<form.elements.length;ii++)
    {
    var e = form.elements[ii];
    if (e.Name != "chkAll")
       e.checked = form.chkAll.checked;
    }
}
function Checked()
{
	var jj = 0
	for(ii=0;ii < document.form.elements.length;ii++){
		if(document.form.elements[ii].name == "adid[]"){
			if(document.form.elements[ii].checked){
				jj++;
			}
		}
	}
	return jj;
}

function DelAll()
{
	if(Checked()  <= 0){
		alert("您至少选择1条信息!");
	}	
	else{
		if(confirm("确定要删除选择的信息吗？\n此操作不可以恢复！")){
			form.action="<?php echo U('Xw/betchdel');?>";
			form.submit();
		}
	}
}

</SCRIPT>
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

.t1 {background-color:#336699;text-align:center}
.t2 {background-color:#ffcc00;text-align:center}
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
                <td width="4%" height="19" valign="bottom"><div align="center"><img src="__PUBLIC__/images/tb.gif" width="14" height="14" /></div></td>
                <td width="96%" valign="bottom"><span class="STYLE1">文章管理</span></td>
              </tr>
            </table>			</td>
            <td><form method="get" action="">
			<div align="right">
			<input type="text" name="key" value="" size="20">
			<input type="submit" value=" 搜 索 " name="B1">
			
			<INPUT title=删除 onclick=DelAll() type=button value=删除 name=Submit>
			</div>
			</form></td>
          </tr>
        </table>		</td>
      </tr>
    </table>	</td>
  </tr>
  <tr>
    <td>
	<form id="bs" name=form method=post action="?action=xg"> 
	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id="table1">
      <tr>
        <td width="4%" height="50" bgcolor="d3eaef" class="STYLE10"><div align="center">编号</div></td>
        <td width="25%" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">标题</span></div></td>
        <td width="31%" height="50" bgcolor="d3eaef" class="STYLE6"><div align="center">分类</div></td>
        <td width="16%" bgcolor="d3eaef" class="STYLE6"><div align="center">时间</div></td>
        <td width="12%" height="50" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">操作</span></div></td>
        <td width="5%" bgcolor="d3eaef" class="STYLE6"><div align="center"><input id=chkAll onClick=CheckAll(this.form) type=checkbox value=checkbox name=chkAll style="font-weight: 700"></div></td>
      </tr>

<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
        <td height="30" bgcolor="#FFFFFF"><div align="center"><?php echo ($v["id"]); ?></div></td>
        <td height="30" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($v["title"]); ?></span></div></td>
        <td height="30" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($v["classname"]); ?></div></td>
        <td height="30" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo (date("Y年m月d日 H时i分",$v["time"])); ?></div></td>
        <td height="30" bgcolor="#FFFFFF"><div align="center" class="STYLE21"><a href="<?php echo U('Xw/del',array('id'=>$v['id']));?>">删除</a>          | <a href="<?php echo U('Xw/update',array('id'=>$v['id']));?>">修改</a></div></td>
        <td height="30" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name="adid[]" value="<?php echo ($v["id"]); ?>" onClick=Checked(form)></div></td>
      </tr><?php endforeach; endif; ?>
      <tr>
        <td height="30" bgcolor="#FFFFFF">&nbsp;</td>
        <td height="30" colspan="5" align="right" bgcolor="#FFFFFF" class="STYLE6"><?php echo ($page); ?></td>
        </tr>
    </table>
	</form>
	</td>
  </tr>
  <tr>
    <td height="30" align="right">&nbsp;</td>
  </tr>
</table>
<script Language="Javascript">

for (i=0;i<table1.rows.length;i++) {
(i%2==0)?(table1.rows(i).className = "t1"):(table1.rows(i).className = "t2");
}

</script>

</body>
</html>