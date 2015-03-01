function imgs()
{
    var file=$("#file").val();      
    if(file==""||file==null)
    {
        alert("Please Enter The picture url");
        $("#file").focus(); 
        return false;
    } else if(!checkImgType(file,"Please enter the image type gif, jpg, png, jpeg or bmp"))
    {
        return false;
    }
    return true;
}

function checkImgType(fileURL,strAlertMsg) {
     var Temp = false;
     var right_type=new Array(".gif",".jpg",".jpeg",".png",".bmp");
     var right_typeLen=right_type.length;
     var imgUrl=fileURL.toLowerCase();
      imgUrl=imgUrl.replace(/^(\s)*|(\s)*$/g,"");//去掉字符串两边的空格

    var postfixLen=imgUrl.length;
    var len4=imgUrl.substring(postfixLen-4,postfixLen);
    var len5=imgUrl.substring(postfixLen-5,postfixLen);
    //判断是否是图片格式
    for (i=0;i<right_typeLen;i++)
    {
        if((len4==right_type[i])||(len5==right_type[i]))
        {
         Temp = true;
        }
     }
     if (Temp == false)
     {
        alert(strAlertMsg);
        return false;
      }
      else
      {
         return true;
      }
} 

function showPic()
{
    var file=$("#file").val(); 
      var textarea=$("#textarea").val();
    if(file==""||file==null)
    {
        alert("Please Enter The picture url");
        $("#file").focus(); 
    }
    else if(!checkImgType(file,"Please enter the image type gif, jpg, png, jpeg or bmp"))
    {
    }else{
        var pic= document.getElementById("pic");
        pic.src=file;
        pic.width=120;
        pic.heigth=100;
         $("#pic").show();
     }
}