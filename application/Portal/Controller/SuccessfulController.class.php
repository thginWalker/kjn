<?php

namespace Portal\Controller;
use Common\Controller\HomebaseController;


class SuccessfulController extends HomebaseController{

// 前台控制器
    public function index() {
                $m=M('Posts');
                $arr=$m->select();
                $this->assign('data',$arr);
                    $touch = M('Touch');
             $touchdata = $touch->select();
                $this->assign('touchdata',$touchdata);
               $this->display();
    }




}


