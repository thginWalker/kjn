<?php
namespace Admin\Controller;

use Common\Controller\AdminbaseController;
use Admin\Model\IndexModel;

class QindexController extends AdminbaseController {
//后台首页
    public function index() {
      $m=new IndexModel();
       $data = $m->selectIndex();
       $this->assign('name',$data);
        $this->display();
    }
    //三张轮转图的控制器
    public function upload(){
    $upload = new \Think\Upload();// 实例化上传类
    $oldFN = $_FILES;
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =  '.\themes\simplebootx\Public\assets\images\demo/'; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    $upload->replace  = true;

    $upload->autoSub  = false;
    $upload->saveName = '';
    $info   =   $upload->upload();
    $this->renameFile($oldFN['photo']['name'], '.\themes\simplebootx\Public\assets\images\demo/');
    if(!$info) {// 上传错误提示错误信息
         $this->success('操作成功！',U('Admin/Qindex/index'));
    }else{// 上传成功
       $this->success('操作成功！',U('Admin/Qindex/index'));
    }
}
public function renameFile($oldFN,$path){

         for($i=0;$i<count($oldFN);$i++){
                if($oldFN[$i]!=="1.jpg"&&$oldFN[$i]!=="2.jpg"&&$oldFN[$i]!=="3.jpg"&&$oldFN[$i]!==""){
                  $extName = substr($oldFN[$i],strrpos($oldFN[$i],'.'));//获取扩展名
                  $newName = ($i+1).".jpg";
          rename($path.$oldFN[$i],$path.$newName);
       }
    }
    }
    //编辑
    public function edit(){
         $id = I('get.id');
         $this->assign('id',$id);
         $m=M('Index');
         $data=$m->where("id=$id")->select();
        $this->assign('name',$data);

        $this->display();
    }
    public function up(){
         $id = I('post.id');
         $title = I('post.title');
         $content = I('post.content');

          $m = M("Index"); // 实例化User对象
          $data['index_title'] = $title;
          $data['index_content'] = $content;
          $i=$m->where("id=$id")->save($data);
    $up = new \Think\Upload();// 实例化上传类
     $oldFN = $_FILES;
    $up->maxSize   =     3145728 ;// 设置附件上传大小
    $up->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $up->rootPath  =  '.\themes\simplebootx\Public\mystyle\img/'; // 设置附件上传根目录
    $up->savePath  =     ''; // 设置附件上传（子）目录
    $up->replace  = true;
    $up->autoSub  = false;
     $up->saveName = '';
    $info   =   $up->upload();
    $this->renameFile1($oldFN['address']['name'], '.\themes\simplebootx\Public\mystyle\img/',$id);
    if($info||($i>0)) {// 上传错误提示错误信息
           $this->success('操作成功！',U('Admin/Qindex/index'));
    }else{// 上传成功
 $this->success('操作成功！',U('Admin/Qindex/index'));

    }
}

public function deleat(){
      $id = I('get.id');
      $m = M('Index');
      $i=$m->delete($id);
      if($i>0){
        $this->success("删除成功");
      }
      else{
        $this->error("删除失败");
      }
}
//添加
public function add(){
      $this->display();
}
public function upp(){
         $title = I('post.title');
         $content = I('post.content');

          $m = M("Index"); // 实例化User对象
          //$data[id]=1;
          $data['index_title'] = $title;
          $data['index_content'] = $content;
          $id=$m->add($data);
    $upp = new \Think\Upload();// 实例化上传类
   $oldFN = $_FILES;
    $upp->maxSize   =     3145728 ;// 设置附件上传大小
    $upp->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upp->rootPath  =  '.\themes\simplebootx\Public\mystyle\img/'; // 设置附件上传根目录
    $upp->savePath  =     ''; // 设置附件上传（子）目录
    $upp->replace  = true;
    $upp->autoSub  = false;
     $upp->saveName = '';
    $info   =   $upp->upload();
    $arr=$this->renameFile1($oldFN['address']['name'], '.\themes\simplebootx\Public\mystyle\img/',$id);
    $data['index_address']="$arr";
    $m->where("id=$id")->save($data);
    if($info||($id>0)) {// 上传错误提示错误信息
          $this->success('操作成功！',U('Admin/Qindex/index'));
    }else{// 上传成功
 $this->success('操作成功！',U('Admin/Qindex/index'));

    }
}
public function renameFile1($oldFN,$path,$id){
                  $extName = substr($oldFN[0],strrpos($oldFN[0],'.'));//获取扩展名
                  $newName = 'senke_xy0'.($id -1).".jpg";
          rename($path.$oldFN[0],$path.$newName);
          return $newName;

    }
}

