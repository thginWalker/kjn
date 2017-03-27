<?php
namespace Portal\Model;

use Think\Model;

class JoinModel extends Model {


    //查询页数
    public  function Joinpage($id){

        $join = M('Join');
        if ($id) {
        $require['Id'] = $id;
        $join_type = $join->where($require)->getField('join_type');
        $demand['join_type'] = $join_type;
        }
       $count = $join->where($demand)->count();
        $page = ceil($count/10);
        return $page;

    }

    //返回数据
    public  function selectJoin($page =1){
        $start = ($page-1)*10;
        $join = M('Join');
        $data = $join->order('id DESC')->limit($start,'10')->select();
        return $data;
    }

    //职位数据
    public function selectPosition($id){
        $position = M('Position');
        $data = $position->where("position_join_id = $id")->select();
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

    //职位申请
    public function addApply($joinid,$position,$name ,$sex,$birthday ,$age,$message ,$phone,$cellphone,$mailbox,$QQ,$height,$marriage ,$penetration,$present,$picture,$education,$professional,$school,$workingyear,$quality ,$salary,$experience ){
        $require['apply_join_id'] = $joinid;
         $require['apply_position'] = $position;
         $require['apply_age'] = $age;
         $require['apply_sex'] = $sex;
       $require['apply_name'] = $name;
        $require['apply_birthday'] = $birthday;
       $require['apply_message'] = $message;
       $require['apply_phone'] = $phone;
       $require['apply_cellphone'] = $cellphone;
       $require['apply_mailbox'] = $mailbox;
       $require['apply_qq'] = $QQ;
       $require['apply_height'] = $height;
       $require['apply_marriage'] = $marriage;
       $require['apply_penetration'] = $penetration;
       $require['apply_present'] = $present;
       $require['apply_picture'] = $picture;  //图片变量
       $require['apply_education'] = $education;
       $require['apply_professional'] = $professional;
       $require['apply_school'] = $school;
       $require['apply_workingyear'] = $workingyear;
       $require['apply_quality'] = $quality;
       $require['apply_salary']= $salary;
       $require['apply_experience'] = $experience;
         $apply = M('Apply');
        $addapply = $apply->add($require);
        if ($addapply>0) {
            return true;
        } else {
            return false;
        }

    }





}
