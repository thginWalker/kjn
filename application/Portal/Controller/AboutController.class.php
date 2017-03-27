<?php

namespace Portal\Controller;
use Common\Controller\HomebaseController;
use Portal\Model\AboutModel;

class AboutController extends HomebaseController {

	 public function index() {
       $touch = M('Touch');
                    $touchdata = $touch->select();
                    $this->assign('touchdata',$touchdata);
                     $About = new AboutModel();
                     $data = $About->selectAbout();
                     $this->assign('gsjj',$data[0]);
                     $this->assign('gsry',$data[1]);
                     $this->assign('zzrz',$data[2]);
                     $this->assign('data',$data[3]);
                     $this->display();

            }

}
