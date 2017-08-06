<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
use Admin\Common\AdminController;

class ManagerController extends AdminController {
    public function login(){
             if(IS_POST){
                 $code = I('post.manager_verify');
                 $vry = new \Think\Verify();
                 if($vry->check($code)){
                      $name = I('post.manager_name');
                      $pwd = I('post.manager_pwd');
                      $info = D('Manager')->where(array('mg_name'=>$name,'mg_pwd'=>$pwd))->find();
                      if($info){
                          session('admin_id',$info['mg_id']);
                          session('admin_name',$info['mg_name']);
                          $this->redirect('Index/index');
                      }
                      $this->assign('errorlogin','用户名或密码不正确');
                 }else{
                     $this->assign('errorlogin','验证码不正确');

                 }

             }
        $this->display();
    }

    function logout(){
         session(null);
         $this->redirect('login');
    }


    function verifyImg(){
//        $vry =  new \Think\Verify();
        $cfg = array(
            'fontSize'  =>  20,              // 验证码字体大小(px)
            'imageH'    =>  50,               // 验证码图片高度
            'imageW'    =>  150,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
//            'useZh'     =>  true,           // 使用中文验证码
//            'fontttf'   =>  'SIMYOU.TTF',              // 验证码字体，不设置随机获取


        );
        $vry =  new Verify($cfg);
        $vry -> entry();

    }

}
