<?php
namespace Admin\Model;

use Think\Model;

class IndexModel extends Model {


    public  function selectIndex(){
        $index = M('Index');
        $data =$index->select();
        return  $data;
    }





}

