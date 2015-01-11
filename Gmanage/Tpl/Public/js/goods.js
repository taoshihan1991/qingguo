$(function(){

	$('#goodsForm').validate({
		main_title:{
			rule:{
				required:true,
				maxlen:10
			},
			error:{
				maxlen:'不能大于10个字符',
				required:'请填写分类名称'

			},
			message:'分类名称必填'
		},
		title:{
			rule:{
				required:true,
				maxlen:40
			},
			error:{
				maxlen:'不能大于40个字符',
				required:'请填写分类标题'
			},
			message:'分类标题必填'
		}
	});
});
