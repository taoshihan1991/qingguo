<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>数据管理-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
        <?php $addCss=""; $addJs=""; $currentNav ='数据管理 > 数据库表信息'; ?>
        <script type="text/javascript" src="__PUBLIC__/zd_js/jquery.js"></script>
    </head>
    <body>
        <div class="wrap">
        
            <div class="mainBody">
            
                <div id="Right">
                    <div class="Item hr">
                        <span class="fr">数据库中共有<?php echo ($tables); ?>张表，共计<?php echo ($total); ?></span>
                        <div class="current">数据库表结构列表</div>
                    </div>
                    <form>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                            <thead>
                                <tr>
                                    
                                    <td>表名</td>
                                    <td>表用途</td>
                                    <td>记录行数</td>
                                    <td>引擎类型</td>
                                    <td>字符集</td>
                                    <td>表大小</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab): $mod = ($i % 2 );++$i;?><tr align="center">
                                       
                                        <td align="left"><?php echo ($tab["Name"]); ?></td>
                                        <td><?php echo ($tab["Comment"]); ?></td>
                                        <td><?php echo ($tab["Rows"]); ?></td>
                                        <td><?php echo ($tab["Engine"]); ?></td>
                                        <td><?php echo ($tab["Collation"]); ?></td>
                                        <td><?php echo ($tab["size"]); ?></td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                           总计：<?php echo ($total); ?>
                        </table>
                    </form>
                  
                </div>
            </div>
        </div>
        <div class="clear"></div>
		<form action="<?php echo U('sysData/backup');?>" method="post">
			<input type="text" name="table[]" />
			<input type="submit" value="提交" />
		</form>
        <script type="text/javascript">
            $(function(){
                clickCheckbox();
                $(".submit").click(function(){
					alert(2323);
                    if($("tbody input[type='checkbox']:checked").size()==0){
                        popup.alert("请先选择你要备份的数据库表吧");
                        return false;
                    }
                    if($(this).attr("disabledSubmit")){
                        popup.alert("已提交，系统在处理中...");
                    }else{
                        $(this).attr("disabledSubmit",true).html("提交处理中...");
                        commonAjaxSubmit("__URL__/backup");
//                        popup.alert("系统处理中，如果数据库中数据较多可能需要较长时间，请稍候....");
                        setTimeout(function(){
                            popup.close("asyncbox_alert");
                        },2000);
                    }
                });
            });
        </script>
    </body>
</html>