<?php

namespace Portal\Controller;
use Common\Controller\HomebaseController;
use Portal\Model\ContactModel;

class ContactController extends HomebaseController {

	 public function index() {
                    $Contact = new ContactModel();
                    $data = $Contact->selectIndex();

                     $this->assign('data',$data);
                        $touch = M('Touch');
             $touchdata = $touch->select();
                $this->assign('touchdata',$touchdata);

                    $this->display();
            }

}
