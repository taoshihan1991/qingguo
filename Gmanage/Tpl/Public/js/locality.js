$(function(){

	$('#localityForm').validate({
		lname:{
			rule:{
	
				required:true
				
			},
			error:{
	
				required:'请填写分类名称'
,
			message:'地区名称必填'
			}
		},
		sort:{
			rule:{
				required:true,
				num:"1,100"
			},
			error:{
				required:'排序必填',
				num:'请填写1到100的数字'
			},
			message:'地区排序必填'
		}
	});
});
