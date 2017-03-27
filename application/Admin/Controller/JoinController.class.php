<?php

namespace Admin\Controller;

use Common\Controller\AdminbaseController;
use Admin\Model\JoinModel;

class JoinController extends AdminbaseController{


    public function index()
    {
             $join = new JoinModel();
            $data = $join->selectJoin();
            $this->assign('data',$data);
            $this->display();
    }


    public function write()
    {
        $id = I('get.id');
        $join = new JoinModel();
        $data = $join->writejoin($id);
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->display('update');
    }

    public function update()
    {
        $id = I('post.updatehidden');
        $title = I('post.updatetitle');
       $type = I('post.updatetype');
       $agelimit = I('post.updateagelimit');
       $pay = I('post.updatepay');
       $number = I('post.updatenumber');
       $district = I('post.updatedistrict');
        $education = I('post.updateeducation');
       $time = date("Y-m-d");
       $join = new JoinModel();
       $data = $join->updatejoin($id,$title,$type,$agelimit,$pay,$number,$district,$education,$time);
       if ($data) {
       $this->success('修改成功！',U('Admin/Join/index'));
       } else {
         $this->error('修改失败');
       }

    }


    public function delete()
    {
        $id = I('get.id');
      $join = M('Join');
      $deletejoin=$join->delete($id);
      if($deletejoin){
        $this->success('删除成功');
      }else{
        $this->error('删除失败');
      }
    }

    public function add()
    {
        $title = I('post.addtitle');
       $type = I('post.addtype');
       $agelimit = I('post.addagelimit');
       $pay = I('post.addpay');
       $number = I('post.addnumber');
       $district = I('post.adddistrict');
        $education = I('post.addeducation');
       $time = date("Y-m-d");
       $join = new JoinModel();
       $data = $join->addjoin($title,$type,$agelimit,$pay,$number,$district,$education,$time);
       if ($data) {
             $this->success('修改成功！',U('Admin/Join/index'));
       } else {
           $this->error('修改失败');
       }

    }

}
