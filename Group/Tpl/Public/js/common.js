/**
 * 添加收藏
 */
function addFavorite2() {
    var url = window.location;
    var title = document.title;
    var ua = navigator.userAgent.toLowerCase();
    if (ua.indexOf("360se") > -1) {
        alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
    }
    else if (ua.indexOf("msie 8") > -1) {
        window.external.AddToFavoritesBar(url, title); //IE8
    }
    else if (document.all) {
    	try{
    		window.external.addFavorite(url, title);
    	}catch(e){
    		alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
    	}
    }
    else if (window.sidebar) {
        window.sidebar.addPanel(title, url, "");
    }
    else {
    	alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
    }
}
/**
 * 导航字菜单
 */

$(function(){
	//导航样式切换
	$('#nav .user-nav').hover(function(){
		$(this).addClass('active');
	},function(){
		$(this).removeClass('active');
	})
	//我的团购菜单切换
	$('#nav .my-hdtg').hover(function(){
		$(this).find('.menu').show();
	},function(){
		$(this).find('.menu').hide();
	})
	//最近浏览菜单切换
	var requestRecentStatus=false;//请求发送开关
	$('#nav .recent-view').hover(function(){
		$(this).find('.menu').show();

		if(requestRecentStatus===true) return;
		requestRecentStatus=true;

		var url=$(this).attr('data-url');
		$.ajax({
			url:url,
			dataType:'json',
			type:'GET',
			success:function(result){
				if(result.status===false){
					$('#nav .recent-view .menu').html("您还没有浏览任何商品哦~");
				}else{
					var data=result.data;
					var htmlStr=''
					for(var i in data){
						htmlStr+='<li>'
							+'<a class="image" href="'+data[i].url+'">'
									+'<img src="'+data[i].image+'" />'
							+'</a>'
							+'<div>'
								+'<h4>'
									+'<a href="'+data[i].url+'">'+data[i].main_title+'</a>'
								+'</h4>'
								+'<span><strong>¥'+data[i].price+'</strong><del>¥'+data[i].old_price+'</del>'
								+'</div>'			
							+'</li>';
					}
					htmlStr+='<p class="clear"><a href="'+url+'">清除我的浏览记录</a></p>';
					$('#nav .recent-view .menu').html(htmlStr);
				}
			}
		});
	},function(){
		setTimeout(function(){
			requestRecentStatus=false;
		},3000);
		$(this).find('.menu').hide();
	})

	//购物车菜单切换
	var requestStatus=false;//请求发送开关
	$('#nav .my-cart').hover(function(){
		$(this).find('.menu').show();
		if(requestStatus===true) return;
		requestStatus=true;

		var url=$(this).attr('data-url');
		$.ajax({
			url:url,
			dataType:'json',
			type:'GET',
			success:function(result){
				if(result.status===false){
					$('.my-cart .menu').html("您的购物车中没有商品哦~");
				}else{
					var data=result.data;
					var htmlStr=''
					for(var i in data){
						htmlStr+='<li>'
							+'<a class="image" href="'+data[i].url+'">'
									+'<img src="'+data[i].image+'" />'
							+'</a>'
							+'<div>'
								+'<h4>'
									+'<a href="'+data[i].url+'">'+data[i].main_title+'</a>'
								+'</h4>'
								+'<span><strong>¥'+data[i].price+'</strong><a data-id="'+data[i].gid+'" class="delCart" href="javascript:void(0);">删除</a></span>'
								+'</div>'			
							+'</li>';
					}
					htmlStr+='<p class="clear"><a href="'+url+'">查看我的购物车</a></p>';
					$('.my-cart .menu').html(htmlStr);
				}
			}
		});
		
	},function(){
		setTimeout(function(){
			requestStatus=false;
		},3000);
		$(this).find('.menu').hide();
	});
	/*导航栏异步删除购物车数据*/
	$('#nav .my-cart .delCart').live('click',function(){
		var gid=$(this).attr('data-id');
		var url=$('#nav .my-cart').attr('delCartUrl');
		var self=this;
		$.ajax({
			url:url,
			data:"gid="+gid,
			dataType:'json',
			type:'POST',
			success:function(result){
				if(result.status===true){
					$(self).parents('li').remove();
				}else{
					alert('删除购物车失败');
				}
			}
		});
	});

	/*购物车页面异步删除购物车数据*/
	$('.cart-table .delCart').click(function(){
		var gid=$(this).attr('data-gid');
		var url=$(this).attr('data-url');
		var self=this;
		$.ajax({
			url:url,
			data:"gid="+gid,
			dataType:'json',
			type:'POST',
			success:function(result){
				if(result.status===true){
					$(self).parents('tr').remove();
					window.location.reload();
				}else{
					alert('删除购物车失败');
				}
			}
		});
	});

})




