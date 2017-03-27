<?php
namespace Portal\Model;

use Think\Model;

class AboutModel extends Model {


    public function insertAbout(){

    }

    public function deleteAbout(){

    }

    public function updateAbout(){

    }

    public  function selectAbout(){
        $contact = M('About');
        $data [0]=$contact->where("about_flag=0")->select();
        $data [1]=$contact->where("about_flag=1")->select();
         $data [2]=$contact->where("about_flag=2")->select();
          $data [3]=$contact->where("about_flag=3")->select();
        return  $data;
    }





}

