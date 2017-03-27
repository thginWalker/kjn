<?php
namespace Admin\Model;

use Think\Model;

class PositionModel extends Model {



    /**
     * 申请详情
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public  function selectapply($id){
        $apply = M('Apply');
        if ($id) {
           $data = $apply->where("id=$id")->select();
        } else {
          $data = $apply->order('id DESC')->select();
        }
        return $data;
    }

    /**
     * 职位详情
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function selectposition($id){
        $position = M('Position');
        if ($id) {
           $data = $position->where("id=$id")->select();
        } else {
          $data = $position->order('id DESC')->select();
        }
        return $data;
    }


    /**
     * 职位名称
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function jointitle($title){
        $join = M('Join');
        $join_title = [];
        foreach ($title as  $value) {
         $require['Id'] = $value;
        $joinname = $join->where($require)->getField('join_title');
         array_push($join_title, $joinname);
        }
        return $join_title;
    }



       /**
        * 添加职位信息

        */
    public function addposition($joinid,$jointitle,$type,$number,$nature,$sex,$education,$district ,$section,$year,$age,$release,$abort,$tag,$describe,$require ,$other){

         $demand['position_join_id'] = $joinid;
         $demand['position_name'] = $jointitle;
       $demand['position_type'] = $type;
       $demand['position_number'] = $number;
       $demand['position_nature'] = $nature;
       $demand['position_sex'] = $sex;
       $demand['position_education'] = $education;
       $demand['position_district'] = $district;
       $demand['position_section'] = $section;
        $demand['position_year'] = $year;
       $demand['position_age'] = $age;
       $demand['position_release'] = $release;
       $demand['position_abort'] = $abort;
       $demand['position_tag'] = $tag;
       $demand['position_describe'] = $describe;
       $demand['position_require'] = $require;
       $demand['position_other'] = $other;
         $position = M('position');
       $addposition = $position->add($demand);
        if ($addposition) {
            return true;
        } else {
            return false;
        }
      }


     /**
      * 更新招聘信息
      * @param  [type] $id        [description]
      * @param  [type] $title     [description]
      * @param  [type] $type      [description]
      * @param  [type] $agelimit  [description]
      * @param  [type] $pay       [description]
      * @param  [type] $number    [description]
      * @param  [type] $district  [description]
      * @param  [type] $education [description]
      * @param  [type] $time      [description]
      * @return [type]            [description]
      */
      public function updateposition($id,$name,$type,$number,$nature,$sex,$education,$district ,$section,$year,$age,$release,$abort,$tag,$describe,$require ,$other){
        $demand['Id'] = $id;
         $demand['position_join_id'] = $name;
       $demand['position_type'] = $type;
       $demand['position_number'] = $number;
       $demand['position_nature'] = $nature;
       $demand['position_sex'] = $sex;
       $demand['position_education'] = $education;
       $demand['position_district'] = $district;
       $demand['position_section'] = $section;
        $demand['position_year'] = $year;
       $demand['position_age'] = $age;
       $demand['position_release'] = $release;
       $demand['position_abort'] = $abort;
       $demand['position_tag'] = $tag;
       $demand['position_describe'] = $describe;
       $demand['position_require'] = $require;
       $demand['position_other'] = $other;
     $position = M('position');
       $updateposition = $position->save($demand);
        if ($updateposition) {
            return true;
        } else {
            return false;
        }


      }



}
