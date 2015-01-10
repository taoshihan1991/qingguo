


function waterfall(parent,pin){
	var oParent=document.getElementById(parent);

	var aPin=getClassObj(oParent,pin);

	var iPinW=aPin[0].offsetWidth;
	var num=Math.floor(document.documentElement.clientWidth/iPinW);

	oParent.style.cssText='width:'+num*iPinW+'px;margin:0 auto;';//居中显示

	//第一列的所有高度数组
	var rowHeight=[];
	for(var j=0;j<aPin.length;j++){
		if(j<num){
			rowHeight[j]=aPin[j].offsetHeight;
		}else{
			var minHeight=Math.min.apply('',rowHeight);//获得第一列的最小高度
			var minKey=getMinKey(rowHeight,minHeight);//获得最小高度的索引

			setMove(aPin[j],minHeight,aPin[minKey].offsetLeft,j,1);//运动函数

			rowHeight[minKey]+=aPin[j].offsetHeight;//更新一下最低值数组
		}
		
	}
	
	
}

	var startNum=0;
	//设置运动
	function setMove(obj,top,left,index,style){
			if(index<=startNum){
				return;
			}

			var documentW=document.documentElement.clientWidth;//页面的宽度
			obj.style.position='absolute';//第二行第一个的样式

			switch(style){
				case 1:
					
					obj.style.top=getTotalH()+'px';
					obj.style.left=(documentW/2-obj.offsetWidth)+'px';

					$(obj).stop().animate({
						top:top,
						left:left
					},700);
				break;
				case 2:
					obj.style.opactiy= 0;//设置透明度

					obj.style.filter='alpha(opacity=0)';
					obj.style.top=top+'px';
					obj.style.left=left+'px';
					$(obj).stop().animate({
						opacity:1

					},1000);
				break;


			}

			

			startNum=index;//更新索引
			

	}

	//获得总的高度
	function getTotalH(){
		$t=document.documentElement.scrollHeight || document.body.scrollHeight;//总的高度就是滚动条的高度
		return $t;
	}
	
	//通过js取class元素
	function getClassObj(parent,classname){

		var obj=parent.getElementsByTagName('*');

		var result=[];

		for(var i=0;i<obj.length;i++){
			if(obj[i].className==classname){
				result.push(obj[i]);
			}
		}

		return result;
	}

	//获得数组中最小值的索引
	function getMinKey(arr,minH){
		for(var i=0;i<arr.length;i++){
			if(arr[i]==minH){
				return i;
			}
		}
	}

		//判断是否滚动到底部
	function checkScroll(){
		var oParent=document.getElementById('picmain');
		var oPin=oParent.getElementsByClassName('pin');
		var key=oPin.length-1;
		var lastPin=oPin[key];
		var lastPinH=lastPin.offsetTop+Math.floor((lastPin.offsetHeight/2));
		var scrollTop=document.documentElement.scrollTop || document.body.scrollTop;
		var documentH=document.documentElement.clientHeight;
		if(scrollTop+documentH<lastPinH){

			return false;
		}else{
		
			return true;
		}
		
		
	}
