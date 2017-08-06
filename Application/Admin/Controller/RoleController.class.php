<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\AdminController;

//use Think\Verify;

class RoleController extends AdminController {
    //列表展示
    function showlist(){
        //获得角色列表信息
        $info = D('Role')->select();
        $this -> assign('info',$info);

        $this -> display();
    }

    //分配权限
    function distribute(){
        $role = D('Role');
        if(IS_POST){
            //在saveAuth里边实现role_auth_ids和role_auth_ac的维护，并更新角色的权限
            $z = $role -> saveAuth($_POST['role_id'],$_POST['auth_id']);
            if($z){
                $this -> success('分配权限成功',U('Role/showlist'),2);
            }else{
                $this -> error('分配权限失败',U('distribute',array('role_id',$_POST['role_id'])),2);
            }
        }else{
            //获得被分配权限的角色信息，传递给模板以便展示或后续其他使用
            $role_id = I('get.role_id');
            $roleinfo = D('Role')->find($role_id);
            $this -> assign('roleinfo',$roleinfo);

            //获得可以分配的权限信息(父级、子级)
            $authinfoA = D('Auth')->where(array('auth_pid'=>0))->select();
            $authinfoB = D('Auth')->where(array('auth_pid'=>array('neq',0)))->select();
            $this -> assign('authinfoA',$authinfoA);
            $this -> assign('authinfoB',$authinfoB);

            $this -> display();
        }

    }
}

