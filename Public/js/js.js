$(function(){
	//图片延迟加载
	$('img').lazyload({
		effect:'fadeIn',
		failure_limit:10,
		skip_invisible : true
	});
	
	//搜索框效果
	var value=$('.search_text').attr('value');
	$('.search_text').focus(function(){
		$(this).attr('value','');

		$(this).addClass('active');
	});
	$('.search_text').blur(function(){

		if($(this).attr('value')==""){
			$(this).attr('value',value);
		}
		$(this).removeClass('active');
	});


	//图片颜色渐变
	
		$('img').animate({"opacity":1});
		$('img').hover(function(){
			$(this).stop().animate({"opacity":.6})
			},function(){
				$(this).stop().animate({"opacity":1})
			});

	$('#floating .close').click(function(){
		$('#floating').hide();
	});

	//首页动态评论
	$.get(index_comment_url,function(data){
		$('.index_comment').html(data);
	});

	

	//弹出窗样式
	var ui={
		alert:function(msg,status){
			var html=$('#box');
			if(status){
				html.find('.content').html('<span class="right">:)</span>'+msg);
			}else{
				html.find('.content').html('<span class="error">:(</span>'+msg);
			}
			html.show();
		}
	}

	//关闭弹窗
	$('.dialog_close').click(function(){
		$(this).parents('#box').hide();
	});

	//提交评论
	$('#comment_submit').click(function(){
		var obj=$(this);
		$.post(insertcomment,$('form').serialize(),function(data){
			var json=JSON.parse(data);
			ui.alert(json.msg,json.status);
			if(json.status){
				var html='<div class="item"><div class="top"><span class="name">'+obj.parents('form').find('.nickname').val()+'</span>';
				html+='<span class="time">发表于 刚刚</span><span class="attitude"><a href="">回复</a><a href="">反对(<b>0</b>)</a> <a href="">支持(<b>0</b>)</a></span>';
				html+='</div><div class="bottom">'+obj.parents('form').find('.text').val()+'</div></div>';
				$('.comment-list').append(html);
				obj.parents('form').find('.text').val('');
				obj.parents('form').find('.nickname').val('');
			}
			
		});
	});

	//回复评论
	$('.reply').click(function(){
		var name=$(this).attr('data-name');
		var content="@"+name+' ';
		var obj=$('#comment_from .text');
		obj.focus().val(content);
	});

	//支持和反对
	$('.agree').click(function(){
		var obj=$(this).find('b');
		$.post(agree,{id:$(this).attr('data-id'),act:$(this).attr('class')},function(data){
			var json=JSON.parse(data);
			ui.alert(json.msg,json.status);
			if(json.status){
				var num=parseInt(obj.html())+1;
				obj.html(num);
			}	
		})
	});
	$('.disagree').click(function(){
		var obj=$(this).find('b');
		$.post(agree,{id:$(this).attr('data-id'),act:$(this).attr('class')},function(data){
			var json=JSON.parse(data);
			ui.alert(json.msg,json.status);
			if(json.status){
				var num=parseInt(obj.html())+1;
				obj.html(num);
			}	
		})
	});

	//回到顶部
	$('.scollgo .top').click(function(){
		$('html,body').animate({
			scrollTop:'0px'
		},1000);
		return false;
	});
	//回到底部
	$('.scollgo .bottom').click(function(){
		var bottom=$(document).height()+'px';
		$('html,body').animate({
			scrollTop:bottom
		},1000);
		return false;
	});
	//留言交流
	$('.scollgo .feed').click(function(){
		ui.alert('留言板还没做，可以先找个地评论下吗(⊙o⊙)…',1);
	});

	//落叶效果
	(function(){
		var leafTop=$(window).height()*2;
		var leaf=$('.leaf');
		var num=1;
		leaf.animate({
			'top': leafTop,
			'left':num*3,
			'-webkit-transform':'rotate(0deg)'
		},8000,'swing',function(){
				leaf.css({'top':'-100px'});
		});
		setInterval(function(){
			leaf.animate({
				'top': leafTop,
				'left':num*3,
				'-webkit-transform':'rotate(0deg)'
			},8000,'swing',function(){
				leaf.css({'top':'-100px'});
			});

		},5000);
		setInterval(function(){
			leaf.css({'-webkit-transform':'rotate('+num+'deg)'});
			num++;
			if(num==360) num=0;
		},100);
	})();


})








 
