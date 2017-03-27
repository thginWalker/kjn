<?php

namespace Portal\Controller;
use Common\Controller\HomebaseController;
use Portal\Model\JoinModel;
use  Think\Verify;
use Think\Upload;

class JoinController extends HomebaseController{

    //定义图片名字变量
    public $picture;

    /**
     * 作用：加入我们首页
     */
    public function index() {
            $join = new JoinModel();
            $page = $join->Joinpage();
            $limit =  I('get.page');

            if (!$limit) {
                $limit = 1;
               $data = $join->selectJoin();
            }else{
                $data = $join->selectJoin($limit);
            }
    $touch = M('Touch');
             $touchdata = $touch->select();
                $this->assign('touchdata',$touchdata);
            $this->assign('limit',$limit);
            $this->assign('page',$page);
            $this->assign('data',$data);
            $this->display();
    }

    /**
     * 作用：职位内容详解
     */
    public function position(){
        $id =  I('get.id');
        $join = new JoinModel();
        $position = $join->selectPosition($id);
            $touch = M('Touch');
            $touchdata = $touch->select();
            $this->assign('touchdata',$touchdata);
        $this->assign('position',$position);
        $this->assign('id',$id);
        $this->display();

    }

     /**
     * 作用：职位类型筛选
     */
    public function type(){
        $id =  I('get.id');
        $join = new JoinModel();
        $page = $join->Joinpage($id);
        $data = $join->slectType($id);
        $this->assign('page',$page);
        $this->assign('data',$data);
        $this->display('index');
    }

    //表单申请
    public function apply(){
        $id =  I('get.id');
        $join = new JoinModel();
         $touch = M('Touch');
             $touchdata = $touch->select();
                $this->assign('touchdata',$touchdata);
        $name = $join->selectTitle($id);
        $this->assign('joinid',$id);
        $this->assign('name',$name);
        $this->display();
    }

    // 立即申请
    public function immediatelyapply(){
        $nameid = I('get.nameid');
      $join = M('Join');
      $joinid = $join->where("id = $nameid")->getField('id');
      $jointitle = $join->where("id = $nameid")->getField('join_title');
        $join = new JoinModel();
        $this->assign('joinid',$joinid);
        $this->assign('name',$jointitle);
        $this->display('apply');
    }

    //验证码
    public function verify(){
        $config =    array(
         'fontSize'    =>    15,
          'length'      =>    4,
        'useNoise'    =>    false,
        );
        $Verify = new Verify($config);
        $Verify->entry();
    }

    //验证码判断
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code, $id = ''){
        $verify = new Verify();
        return $verify->check($code, $id);
    }

    //表单提交s
    public function preservation(){
    // 实例化上传类
     $config = array(
                    'maxSize'    =>    3145728,
                   'rootPath'  =>  '.\data\picture/',
                    'saveName'   =>    array('uniqid',''),
                     'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                    'autoSub'    =>    true,
                    'subName'    =>    array('date','Ymd'),
                    );
        $upload = new Upload($config);// 实例化上传类
        $info   =   $upload->upload();
        $extName = substr($oldFN['photo']['name'],strrpos($oldFN['photo']['name'],'.'));//获取扩展名
        $newName = strtotime($time, $now).$extName;
        $path =  '.\data\picture/';
        $old = $path.$oldFN['photo']['name'];
        $new = $path.$newName;
        rename($old,$new);
        $picture = $info['picture']["savepath"].$info['picture']["savename"];

        //验证码判断是否正确
        $verify = I('post.verify');
        $check = $this->check_verify($verify, $id = '');
        if (!$check) {
           $this->error('验证码错误!');
        }
       //保存数据
         $joinid = I('post.joinid');
        $position = I('post.position');
       $name = I('post.name');
       $sex = I('post.sex');
       $year = I('post.year');
       $month = I('post.month');
       $day = I('post.day');
        $birthday = $year.'/'.$month.'/'.$day;
        $age = I('post.age');
       $message = I('post.message');
       $phone = I('post.phone');
       $cellphone = I('post.cellphone');
       $mailbox = I('post.mailbox');
       $QQ = I('post.QQ');
       $height = I('post.height');
       $marriage = I('post.marriage');
       $penetration = I('post.penetration');
       $present = I('post.present');
       // $picture = I('post.picture');  图片变量
       $education = I('post.education');
       $professional = I('post.professional');
       $school = I('post.school');
       $workingyear = I('post.workingyear');
       $quality = I('post.quality');
       $salary = I('post.salary');
       $experience = I('post.experience');
        //插入数据库
        $join = new JoinModel();
        $addApply = $join->addApply($joinid,$position,$name ,$sex,$birthday ,$age,$message ,$phone,$cellphone,$mailbox,$QQ,$height,$marriage ,$penetration,$present,$picture,$education,$professional,$school,$workingyear,$quality ,$salary,$experience );
        if ($addApply) {
             $this->success('申请成功');
        } else {
            $this->error('申请失败');
        }

        }



}
