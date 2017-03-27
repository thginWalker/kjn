<?php

namespace Portal\Controller;
use Common\Controller\HomebaseController;
use Portal\Model\IndexModel;

class IndexController extends HomebaseController{

            // 前台控制器
	public function index() {
            $Index = new IndexModel();
             $data = $Index->selectIndex();
             //
                $touch = M('Touch');
                $touchdata = $touch->select();
                $this->assign('touchdata',$touchdata);
                $this->assign('data',$data);
               $this->display();
            }



}


