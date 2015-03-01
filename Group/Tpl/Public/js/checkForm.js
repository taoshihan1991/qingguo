/*
表单前端验证类
@ website www.tshgrw.cn
@ author 陶士涵
@ 使用方式
	首先先加载JQuery库

	javascript部分
		$(function(){
			var obj=new checkForm('#regForm','.must');//填入form的id属性和需验证input的class属性
			obj.run({
					'email':{
						preg:/^[a-z0-9\.]+@[a-z0-9]+\.[a-z]+$/i,
						focus:'请填写你的邮箱',
						empty:'邮箱不能为空',
						error:'邮箱格式错误',
						success:'邮箱填写正确',
						ajax:true,
						url:"{:U('Login/check')}"
					},
					'username':{
						preg:/^[a-z]\w{5,15}$/i,
						focus:'请填写你的用户名',
						empty:'用户名不能为空',
						error:'用户名格式错误',
						success:'用户名填写正确',
						ajax:true,
						url:"{:U('Login/check')}"
					},
					'password':{
						preg:/^\S{6,32}$/,
						focus:'请填写你的密码',
						empty:'密码不能为空',
						error:'密码格式错误',
						success:'密码填写正确'
					},
					'password_d':{
						focus:'请填写确认密码',
						empty:'确认密码不能为空',
						error:'确认密码不一致',
						success:'确认密码填写正确',
						confirm:'password',

					},
					'code':{
						preg:/^[a-z0-9]{4}$/i,
						focus:'请填写验证码',
						empty:'验证码不能为空',
						error:'验证码格式错误',
						success:'验证码填写正确',
						ajax:true,
						url:"{:U('Login/check')}"
					}
			});
		})


	php后端处理
        $key=addslashes(key($_POST));
        $value=addslashes($_POST[$key]);
        switch($key){
            case 'email':

                if(/查询数据库/){
                    $data=array('status'=>false,'msg'=>'该邮箱存在');
                }else{
                    $data=array('status'=>true);
                }
                break;
            case 'username':

                if(/查询数据库/)){
                    $data=array('status'=>false,'msg'=>'该用户名存在');
                }else{
                    $data=array('status'=>true);
                }

                break;
            case 'code':
                if(/验证规则自己验证/){
                    $data=array('status'=>false,'msg'=>'验证码错误');
                }else{
                    $data=array('status'=>true);
                }
                break;

        }
        exit(json_encode($data));


	html结构
		<dl class="success">
			<dt>用户名</dt>
			<dd class="text"><input class="must" type="text" name="username"></dd>
			<dd class="prompt">用户名填写正确</dd>
		</dl>

	本类会动态修改 dl的class success error focus 和提示信息文字
	本类的目的是提供最简洁的js验证类，所以样式请自己定义
*/
function checkForm(formId,inputClass){
		/*表单元素配置项*/
		this.checkForm={};
		/*表单元素集合数组*/
		var aEls=[];

		/*启动方法*/
		this.run=function(config){
			this.checkForm=config;
			var aMust=$(formId).find(inputClass);
			this.bindEvent(aMust);

			$(formId).submit(function(){
					for(var i=0;i<aEls.length;i++){
						if(aEls[i].status===false){
							return false;
						}
					}
			});
		}

		/*绑定事件时验证*/
		this.bindEvent=function(aMust){
			aMust.each(function(){
				aEls.push(this);
				this.status=false;
			});

			var obj=this;
			
			/*添加表单事件*/
			for(var i=0;i<aEls.length;i++){
					aEls[i].onfocus=function(){
						var name=this.name;
						var msg=obj.checkForm[name]['focus'];
						showFocus.call(this,msg);
						this.onblur=function(){
							var val=this.value;
							//为空的时候
							if(val==''){
								msg=obj.checkForm[name]['empty'];
								showError.call(this,msg);
								return;
							}
							if(obj.checkForm[name]['confirm']){
								//确认密码
								if($(formId).find("input[name='"+obj.checkForm[name]['confirm']+"']").val()!=val){
									msg=obj.checkForm[name]['error'];				
									showError.call(this,msg);
									return;
								}
							}else{
								//验证正则
								var preg=obj.checkForm[name]['preg'];
								if(!preg.test(val)){
									msg=obj.checkForm[name]['error'];				
									showError.call(this,msg);
									return;
								}
							}

							//ajax验证
							if(obj.checkForm[name]['ajax']===true){
								var url=obj.checkForm[name]['url'];
								var self=this;
								$.ajax({
									url:url,
									type:'POST',
									dataType:'json',
									data:name+'='+val,
									success:function(result){
										if(result.status==true){
											msg=obj.checkForm[name]['success'];
											showSuccess.call(self,msg);
										}else{
											showError.call(self,result.msg);
											return;
										}
									}

								});
							}else{
								//验证成功
								msg=obj.checkForm[name]['success'];
								showSuccess.call(this,msg);
							}
							
						}
					}
			}
		}
		/*显示获得焦点的*/
		function showFocus(msg){
			var parent=$(this).parents('dl');
			var oPrompt=parent.find('.prompt');
			parent.attr('class','focus');
			oPrompt.html(msg);
		}
		/*显示错误的*/
		function showError(msg){
			var parent=$(this).parents('dl');
			var oPrompt=parent.find('.prompt');
			parent.attr('class','error');
			oPrompt.html(msg);
			this.status=false;
		}
		/*显示成功信息*/
		function showSuccess(msg){
			var parent=$(this).parents('dl');
			var oPrompt=parent.find('.prompt');
			parent.attr('class','success');
			oPrompt.html(msg);
			this.status=true;
		}

	}