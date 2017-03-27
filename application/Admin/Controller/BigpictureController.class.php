<?php
namespace Admin\Controller;

use Common\Controller\AdminbaseController;

class BigpictureController extends AdminbaseController {
    public function index(){
        $this->display();
    }
     public function upload(){
    $upload = new \Think\Upload();// 实例化上传类
    $oldFN = $_FILES;
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =  './public/images/'; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    $upload->replace  = true;
    $upload->saveExt  = 'jpg';
    $upload->autoSub  = false;
    $upload->saveName = '';
    $info   =   $upload->upload();
    $this->renameFile($oldFN['photo']['name'], './public/images/');
    if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
    }else{// 上传成功
        $this->success('上传成功！');
    }
}
public function renameFile($oldFN,$path){

         for($i=0;$i<count($oldFN);$i++){
                if($oldFN[$i]!=="1.jpg"&&$oldFN[$i]!=="2.jpg"&&$oldFN[$i]!=="3.jpg"&&$oldFN[$i]!=="4.jpg"&&$oldFN[$i]!=="5.jpg"&&$oldFN[$i]!==""){
                  $extName = substr($oldFN[$i],strrpos($oldFN[$i],'.'));//获取扩展名
                  $newName = ($i+1).$extName;
                 var_dump($oldFN[$i]);
                var_dump($newName);
          rename($path.$oldFN[$i],$path.$newName);
       }
    }
    }
}
