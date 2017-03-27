<?php
namespace Portal\Model;

use Think\Model;

class IndexModel extends Model {


    public function insertIndex(){

    }

    public function deleteIndex(){

    }

    public function updateIndex(){

    }

    public  function selectIndex(){
        $index = M('Index');
        $data =$index->select();
        return  $data;
    }





}

