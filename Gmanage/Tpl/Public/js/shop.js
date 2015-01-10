$(function(){

	$('#shopForm').validate({
		shopname:{
			rule:{
				required:true,
				maxlen:20
				
			},
			error:{
				maxlen:'不能大于20个字符',
				required:'请填写商铺名称'

			},
			message:'商铺名称必填'
		},
		shopaddress:{
			rule:{
				required:true,
				maxlen:40	
			},
			error:{
				maxlen:'不能大于40个字符',
				required:'请填写商铺地址'
			},
			message:'商铺地址必填'
		},
		shoptel:{
			rule:{
				required:true,
				tel:true,
			},
			error:{
				required:'请填写电话号码',
				tel:'电话号码格式不正确'
				
			},
			message:'电话号码必填'
		},
		shopcoord:{
			rule:{
				required:true
			},
			error:{
				required:'请选择商铺坐标'
				
			},
			message:'点击下面地图，获取坐标'
		}
	});
});
