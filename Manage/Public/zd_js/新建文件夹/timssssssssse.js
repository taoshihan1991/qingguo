//����Ҫʹ�õĵط���������Ĵ��뼴��;
/*
<script language="javascript">
	showTime();
</script>
*/
function initArray(){
	for(i=0;i<initArray.arguments.length;i++)
	this[i]=initArray.arguments[i];
}
	var isnMonths=new initArray("1��","2��","3��","4��","5��","6��","7��","8��","9��","10��","11��","12��");
	var isnDays=new initArray("������","����һ","���ڶ�","������","������","������","������","������");
	today=new Date();
	hrs=today.getHours();
	min=today.getMinutes();
	sec=today.getSeconds();
	clckh=""+((hrs>12)?hrs:hrs);
	clckm=((min<10)?"0":"")+min;
	clcks=((sec<10)?"0":"")+sec;
	clck=(hrs>=12)?"����":"����";
	var stnr="";
	var ns="0123456789";
	var a="";
function getFullYear(d){
	yr=d.getYear();if(yr<1000)
	yr+=1900;return yr;
};
function showTime(){
	document.write("<span id='timebox'></span>");
	getTimes();
	setInterval(getTimes,450);
}
function getTimes(){
	today=new Date();
	hrs=today.getHours();
	min=today.getMinutes();
	sec=today.getSeconds();
	clckh=""+((hrs>12)?hrs:hrs);
	clckm=((min<10)?"0":"")+min;
	clcks=((sec<10)?"0":"")+sec;
	times=getFullYear(today)+"�� "+isnMonths[today.getMonth()]+today.getDate()+"�� "+isnDays[today.getDay()]+" "+clckh+":"+clckm+":"+clcks+"";
	document.getElementById("timebox").innerHTML=times;
}