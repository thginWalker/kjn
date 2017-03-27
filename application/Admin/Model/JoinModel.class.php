<?php
namespace Admin\Model;

use Think\Model;

class JoinModel extends Model {



    //返回数据
    public  function selectJoin(){
        $join = M('Join');
        $data = $join->order('id DESC')->select();
        return $data;
    }

    //职位数据
    public function selectPosition($id){
        $position = M('Position');
        $data = $position->find($id);
        return $data;
    }

    //职位名称
    public function selectTitle($id){
        $join = M('Join');
        $require['Id'] = $id;
        $title = $join->where($require)->getField('join_title');
        return $title;
    }


    //职位类型
    public function slectType($id){
        $join = M('Join');
        $require['Id'] = $id;
        $join_type = $join->where($require)->getField('join_type');
        $demand['join_type'] = $join_type;
        $data = $join->where($demand)->select();
        return $data;
    }

    //读取招聘信息
    public function writejoin($id){
        $join = M('Join');
        $data = $join->find($id);
        return $data;
    }

    //更新招聘信息
    public function updatejoin($id,$title,$type,$agelimit,$pay,$number,$district,$education,$time){
      $require['Id'] = $id;
      $require['join_title'] = $title;
       $require['join_type'] = $type;
       $require['join_agelimit'] = $agelimit;
       $require['join_pay'] = $pay;
       $require['join_number'] = $number;
       $require['join_district'] = $district;
       $require['join_education'] = $education;
       $require['join_time'] = $time;
         $join = M('Join');
      $updatejoin = $join->save($require); // 根据条件保存
        if ($updatejoin) {
            return true;
        } else {
            return false;
        }
      }


       //增加招聘信息
    public function addjoin($title,$type,$agelimit,$pay,$number,$district,$education,$time){
      $require['join_title'] = $title;
       $require['join_type'] = $type;
       $require['join_agelimit'] = $agelimit;
       $require['join_pay'] = $agelimit;
       $require['join_number'] = $number;
       $require['join_district'] = $district;
       $require['join_education'] = $education;
       $require['join_time'] = $time;
         $join = M('Join');
       $addjoin = $join->add($require);
        if ($addjoin) {
            return true;
        } else {
            return false;
        }
      }

}
