<?php
namespace Admin\Controller;

use Common\Controller\AdminbaseController;


class ContactController extends AdminbaseController {
    public function index(){
        $m=M("Contact");
        $arr=$m->select();
        $this->assign('name',$arr);
        $this->display();
    }
    public function edit(){
        $id = I('get.id');
         $this->assign('id',$id);
        $m=M("Contact");
        $arr=$m->where("id=$id")->select();
        $this->assign('name',$arr);
        $this->display();

    }
    public function add(){
          $m = M("Contact"); // 实例化User对象
          //$data[id]=1;
          $id = I('post.id');
          $data['contact_title'] = I('post.title');
          $data['contact_address'] = I('post.address');
          $data['contact_postcode'] = I('post.postcode');
          $data['contact_phone'] = I('post.phone');
          $data['contact_fax'] = I('post.fax');
          $data['contact_email'] = I('post.email');
          $i=$m->where("id=$id")->save($data);
          $this->upload($id);

    }
    public function pircture(){
        $id=0;
          $this->upload($id);
    }
public function addf(){
  $this->display();

}
public function addg(){

          $data['contact_address'] = I('post.address');
          $data['contact_postcode'] = I('post.postcode');
          $data['contact_phone'] = I('post.phone');
          $data['contact_fax'] = I('post.fax');
          $data['contact_email'] = I('post.email');
          $m = M("Contact"); // 实例化User对象
          $id=$m->add($data);
          $this->upload($id);
}
  public function deleat(){
      $id = I('get.id');
      $m = M('Contact');
      $i=$m->delete($id);
      if($i>0){
        $this->success("删除成功");
      }
      else{
        $this->error("删除失败");
      }
}
     public function upload($id){
    $upload = new \Think\Upload();// 实例化上传类
    $oldFN = $_FILES;
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =  '.\themes\simplebootx\Public\Contact\img/'; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    $upload->replace  = true;
    $upload->autoSub  = false;
    $upload->saveName = '';
    $info   =   $upload->upload();
    $this->renameFile($oldFN['pircture']['name'], '.\themes\simplebootx\Public\Contact\img/',$id);
    if(!$info) {// 上传错误提示错误信息
        $this->success('上传成功！',U('Admin/Contact/index'));
    }else{// 上传成功
        $this->success('上传成功！',U('Admin/Contact/index'));
    }
}
public function renameFile($oldFN,$path,$id){
                  $newName = "$id".".jpg";
                rename($path.$oldFN[0],$path.$newName);
                $m=M('Contact');
                  $data[contact_pircture]= $newName;
                  $i=$m->where("id=$id")->save($data);

    }
        public function touch(){
      $touch=M("Touch");
      $data[qq]=$_POST[qq];
      $data[phone]=$_POST[phone];
      $i=$touch->where("id=1")->save($data);
      if($i>0){
        $this->success("更改成功");
      }else{
        $this->error("更改失败");
      }
    }
}
