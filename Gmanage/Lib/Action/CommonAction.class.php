<?php
/**
* 公共控制器
*/
class CommonAction extends Action {
    protected $db;//数据连接

    /*初始化*/
    public function _initialize(){

        /*子类同时初始化*/
        if(method_exists($this,'_auto')){
            $this->_auto();
        }
    }
    /**
    * 图片上传
    */
    public function uploadGoodsImg(){
    	if(!IS_POST){
            $this->error('页面不存在！');
        }

        $upload=$this->_upload('Goods','460,310,90','280,185,55');
        echo json_encode($upload);
    }
    /**
    * 编辑器内图片上传
    */
    public function uploadDetailImg(){
        if(!IS_POST){
            $this->error('页面不存在！');
        }
        /*
        {
        "originalName":"QQ\u622a\u56fe20141114215545.jpg",
        "name":"14209571758715.jpg",
        "url":"upload\/20150111\/14209571758715.jpg",
        "size":24205,
        "type":".jpg",
        "state":"SUCCESS"
        }
        */
        import('ORG.Net.UploadFile');
        $obj=new UploadFile();
        $obj->maxSize = C('UPLOAD_MAX_SIZE');
        $obj->savePath = C('UPLOAD_PATH').'Goods/';
        $obj->saveRule = 'uniqid';
        $obj->uploadReplace=true;
        $obj->allowExts = C('UPLOAD_EXTS');
        $obj->autoSub=true;
        $obj->subType='date';
        $obj->dateFormat='Y_m';
        if(!$obj->upload()){
            $info=$obj->getErrorMsg();
        }else{
            $info=$obj->getUploadFileInfo(); 
            $pic=explode('/',$info[0]['savename']);
            $res=array(
                'originalName'=>$info[0]['name'],
                'name'=>$pic[1],
                'url'=>$info[0]['savename'],
                'size'=>$info[0]['size'],
                'type'=>'.'.$info[0]['extension'],
                'state'=>"SUCCESS"
            );
            echo json_encode($res);
        }
       
    }
    /**
    * 上传类
    * @param $path 保存文件夹的名称
    * @param $width 缩略图的宽度180,100
    * @param $height 缩略图的高度100,30
    * @return $array 图片信息
    */
    private function _upload($path,$width,$height){
        import('ORG.Net.UploadFile');
        $obj=new UploadFile();
        $obj->maxSize = C('UPLOAD_MAX_SIZE');
        $obj->savePath = C('UPLOAD_PATH').$path.'/';
        $obj->saveRule = 'uniqid';
        $obj->uploadReplace=true;
        $obj->allowExts = C('UPLOAD_EXTS');
        $obj->thumb = true;
        $obj->thumbMaxWidth=$width;
        $obj->thumbMaxHeight=$height;
        $obj->thumbPrefix='max_,medium_,mini_';
        $obj->thumbPath = $obj->savePath.date('Y_m').'/';
        $obj->thumbRemoveOrigin=true;
        $obj->autoSub=true;
        $obj->subType='date';
        $obj->dateFormat='Y_m';

        if(!$obj->upload()){
            return array('status'=>0,'msg'=>$obj->getErrorMsg());
        }else{
            $info=$obj->getUploadFileInfo();
            $pic=explode('/',$info[0]['savename']);
            return array(
                'status'=>1,
                'path'=>array(
                    'max'=>$pic[0].'/max_'.$pic[1],
                    'medium'=>$pic[0].'/medium_'.$pic[1],
                    'mini'=>$pic[0].'/mini_'.$pic[1]
                )
            );
        }
        return $info;
    }
}