<?php

namespace Admin\Controller;

use Common\Controller\AdminbaseController;
use Admin\Model\PositionModel;

class PositionController extends AdminbaseController{

    /**
     * 默认页面
     * @return [type] [description]
     */
    public function index()
    {
            $apply = new PositionModel();
            $data = $apply->selectapply();
            $position  =  $apply->selectposition();
            $jointitle = $apply->jointitle($title);
            $this->assign('position',$position);
            $this->assign('data',$data);
            $this->assign('jointitle',$jointitle);
            $this->display();
    }

    /**
     * 申请详情
     * @return [type] [description]
     */
    public function applydetails()
    {
            $id = I('get.id');
            $apply = new PositionModel();
            $applydetails = $apply->selectapply($id);
            $this->assign('applydetails',$applydetails);
            $this->display();
    }

    /**
     * 删除申请
     * @return [type] [description]
     */
    public function applydelete()
    {
    $id = I('get.id');
      $apply = M('Apply');
      $deleteapply=$apply->delete($id);
      if($deleteapply){
        $this->success('删除成功');
      }else{
        $this->error('删除失败');
      }
    }

    /**
     * 职位具体详情
     * @return [type] [description]
     */
    public function positiondetails($id)
    {
             $id = I('get.id');
            $apply = new PositionModel();
            $positiondetails = $apply->selectposition($id);
             $title = [];
            foreach ($positiondetails as  $key => $value) {
            $join_id = $positiondetails[$key]['position_join_id'];
             array_push($title, $join_id);
            }
            $jointitle = $apply->jointitle($title);
             $this->assign('positiondetails',$positiondetails);
            $this->display();
    }
    /**
     * 删除职位详情
     * @return [type] [description]
     */
    public function positiondelete()
    {
         $id = I('get.id');
      $position = M('Position');
      $deleteposition=$position->delete($id);
      if($deleteposition){
        $this->success('删除成功');
      }else{
        $this->error('删除失败');
      }
    }

    /**
     * 默认跳转
     */
    public function addposition()
    {
        $join = M('Join');
       $data = $join->select();
      $this->assign('data',$data);
        $this->display();
    }

    /**
     * 默认跳转
     *///////还要传一个修改的名字的ID与数据库保持一致
    public function updateposition()
    {
          $id = I('get.id');
             $apply = new PositionModel();
            $positiondetails = $apply->selectposition($id);
          $this->assign('positiondetails',$positiondetails);
          $this->assign('updateid',$id);
          $this->display();
    }

    /**
     * 添加职位详情
     */
    public function appendposition()
    {

        $titleid = I('post.addtitle');
      $pieces = explode("+", $titleid);
      $joinid = $pieces[0];
      $jointitle = $pieces[1];
       $type = I('post.addtype');
       $number = I('post.addnumber');
       $nature = I('post.addnature');
       $sex = I('post.addsex');
       $education = I('post.addeducation');
        $district = I('post.adddistrict');
        $section = I('post.addsection');
       $year = I('post.addyear');
        $age = I('post.addage');
        $release = date("Y-m-d");
        $abort = I('post.addabort');
       $tag = I('post.addtag');
        $describe = I('post.adddescribe');
        $require = I('post.addrequire');
        $other = I('post.addother');
       $position = new positionModel();
       $data = $position->addposition($joinid,$jointitle,$type,$number,$nature,$sex,$education,$district ,$section,$year,$age,$release,$abort,$tag,$describe,$require ,$other);
       if ($data) {
             $this->success('添加成功');
       } else {
           $this->error('添加失败');
       }

    }


    /**
     * 修改职位详情
     */
    public function modifyposition()
    {

      $id = I('post.id');
         $name = I('post.name');
       $type = I('post.updatetype');
       $number = I('post.updatenumber');
       $nature = I('post.updatenature');
       $sex = I('post.updatesex');
       $education = I('post.updateeducation');
       $district = I('post.updatedistrict');
        $section = I('post.updatesection');
       $year = I('post.updateyear');
        $age = I('post.updateage');
        $release = date("Y-m-d");
        $abort = I('post.updateabort');
       $tag = I('post.updatetag');
        $describe = I('post.updatedescribe');
        $require = I('post.updaterequire');
        $other = I('post.updateother');
       $position = new positionModel();
       $data = $position->updateposition($id,$name,$type,$number,$nature,$sex,$education,$district ,$section,$year,$age,$release,$abort,$tag,$describe,$require ,$other);
       if ($data) {
             $this->success('修改成功!',U('Admin/Position/index'));
       } else {
           $this->error('修改失败!');
       }

    }


}



