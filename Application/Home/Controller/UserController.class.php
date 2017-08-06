<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function _empty(){
        $this->display('./Application/Common/error.html');
    }
    public function login(){
        $this->display();
    }
    public function regist(){
        $user = D('User');
        if(IS_POST){
            //$shuju = I('post.');
            $shuju = $user->create();
            if($shuju){
               $shuju['user_hobby'] = implode(',',$shuju['user_hobby']);
               $newid = $user->add($shuju);
               if($newid){
//                   $this->success('用户注册成功',U('Index/index'),1);
                   $this->redirect("Index/index");
               }else{
//                   $this->error('用户注册失败',U('regist'),1);
                   $this->redirect("regist");

               }
            }else{
                $this->assign('errorinfo',$user->getError());

            }

        }
        $this->display();
    }

    function checkName(){
        if(IS_AJAX){
            $mingzi = I('get.mingzi');
            $info = D('User')->where(array('username'=>$mingzi))->find();
            if($info){
                echo json_encode(array('status'=>0));
            }else{
                echo json_encode(array('status'=>1));

            }
        }

    }
}
