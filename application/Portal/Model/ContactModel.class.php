<?php
namespace Portal\Model;

use Think\Model;

class ContactModel extends Model {


    public function insertContact(){

    }

    public function deleteContact(){

    }

    public function updateContact(){

    }

    public  function selectIndex(){
        $contact = M('Contact');
        $data =$contact->select();
        return  $data;
    }





}

