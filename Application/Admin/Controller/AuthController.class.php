<?php
namespace Admin\Controller;
//use Think\Controller;
use Admin\Common\AdminController;


class AuthController extends AdminController {
    //列表展示
    function showlist(){
        //获得权限列表信息
        $info = D('Auth')->select();

        $info = generateTree($info);
        //dump($info);

        $this -> assign('info',$info);

        $this -> display();
    }

    //添加权限
    function tianjia(){
        $auth = D('Auth');
        if(IS_POST){
            $shuju = I('post.');
            if($auth -> add($shuju)){
                $this -> success('添加权限成功',U('showlist'),2);
            }else{
                $this -> error('添加权限失败',U('tianjia'),2);
            }
        }else{
            //获取可用户选取的上级权限(顶级权限)
            $authinfoA = $auth->where(array('auth_pid'=>0))->select();
            $this -> assign('authinfoA',$authinfoA);

            $this -> display();
        }
    }
}
