<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理</title>
<script type="text/javascript" src="__PUBLIC__/zd_js/jquery-1.4.2.js"></script>
<script type="text/javascript">
$(function(){
$("#bs tr").hover(function(){
$(this).addClass("bs");
},function(){
$(this).removeClass();
});
});
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
                <td width="96%" valign="bottom"><span class="STYLE1">产品分类</span></td>
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
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
            <td height="50" bgcolor="d3eaef" class="left_txt">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
       

<br />
<div align="center">
    <form action="<?php echo U('Cpclass/addClass');?>" method="post">
<table width="98%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" class="list" style="border-collapse: collapse">
  <tr> 
    <th width="100%" height="25" bgcolor="#EEF2FB" >
	类别添加</th>
  </tr>
  <tr> 
    <td align="center" style="height: 12px; padding-left:5px; padding-right:5px; padding-top:2px; padding-bottom:2px">
名称：<input name="classname" type="text">
上级类别：<select  name="topid">
  <option value="0">作为顶级分类</option>
	<?php if(is_array($cpClass)): foreach($cpClass as $key=>$v): ?><option value='<?php echo ($v["id"]); ?>'><?php $__FOR_START_9819__=0;$__FOR_END_9819__=$v['lev'];for($i=$__FOR_START_9819__;$i < $__FOR_END_9819__;$i+=1){ ?>&nbsp;&nbsp;<?php } ?>|-<?php echo ($v["classname"]); ?></option><?php endforeach; endif; ?>
</select>
排序：<input type="text" name="xh" size="5" onKeyUp="if(isNaN(value)){alert('排序只能为数字，数字越小排名越前！');value='';}">&nbsp;
<input name="添加" type="submit" value="添加" ></td>
  </tr>
</table>
</form>
</div>

<div align="center">
<table width="98%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" class="list" id="bs" style="border-collapse: collapse">
  <tr> 
    <th width="100%" height="25" colspan="2" bgcolor="#EEF2FB" style="padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px">
	类别管理</th>
  </tr>
<?php if(is_array($cpClass)): foreach($cpClass as $key=>$v): ?><tr>
	<td width="86%" style="padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px"><a href="<?php echo U('Cpclass/update',array('id'=>$v['id']));?>"><?php $__FOR_START_16120__=0;$__FOR_END_16120__=$v['lev'];for($i=$__FOR_START_16120__;$i < $__FOR_END_16120__;$i+=1){ ?>&nbsp;&nbsp;<?php } ?>|-<?php echo ($v["classname"]); ?></a>【<?php echo ($v["xh"]); ?>】</td>
	<td align=left style="padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px"><a href="<?php echo U('Cpclass/update',array('id'=>$v['id']));?>">编辑</a>&nbsp;<a href="<?php echo U('Cpclass/del',array('id'=>$v['id']));?>"  onClick="javascript:return confirm('删除大类的同时会删除其下属的小类！确定？')" >删除</a></td>
	</tr><?php endforeach; endif; ?>    
</table>
</div>

            <br /></td>
          </tr>
          </table>
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