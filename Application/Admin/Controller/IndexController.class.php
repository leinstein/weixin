<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\AdminController;

class IndexController extends AdminController {
    public function index(){
       $this->display();
    }
    public function left(){

        $admin_id = session('admin_id');
        $admin_name = session('admin_name');
        if($admin_name === 'admin'){
            $authinfoA = D('auth')->where(array('auth_pid'=>0))->select();
            $authinfoB = D('auth')->where(array('auth_pid'=>array('neq',0)))->select();

        }else{
            $roleinfo = D('Manager')
                ->alias('m')
                ->join('__ROLE__ as r on m.role_id=r.role_id')
                ->field('r.role_auth_ids')
                ->where(array('m.mg_id'=>$admin_id))
                ->find();

            $authids = $roleinfo['role_auth_ids'];

            $authinfoA = D('auth')->where(array('auth_id'=>array('in',$authids),'auth_pid'=>0))->select();
            $authinfoB = D('auth')->where(array('auth_id'=>array('in',$authids),'auth_pid'=>array('neq',0)))->select();


        }
//         dump($authinfoA);
//         dump($authinfoB);
        $this->assign('authinfoA',$authinfoA);
        $this->assign('authinfoB',$authinfoB);
        $this->display();

    }

    public function right(){
        $this->display();
    }
    public function top(){
        $this->display();
    }
    public function _empty(){
        $this->display('./Application/Common/error.html');
    }
}