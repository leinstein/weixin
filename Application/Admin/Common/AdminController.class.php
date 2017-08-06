<?php
namespace Admin\Common;
use Think\Controller;
class AdminController extends Controller{
       public function __construct(){
            parent::__construct();

            $admin_id = session('admin_id');
            $admin_name = session('admin_name');

                 if(!empty($admin_name)){



                        $nowAC = CONTROLLER_NAME.'-'.ACTION_NAME;

                        $roleinfo = D('Manager')
                            ->alias('m')
                            ->join('__ROLE__ r on m.role_id = r.role_id')
                            ->field('r.role_auth_ac')
                            ->where(array('m.mg_id'=>$admin_id))
                            ->find();
                        $have_auth = $roleinfo['role_auth_ac'];

                        $allow_auth = "Manager-login,Manager-verifyImg,Index-index,Index-left,Index-right,Index-top,Manager-logout";

                        if(strpos($have_auth,$nowAC)===false &&strpos($allow_auth,$nowAC)===false &&$admin_name!=='admin'){


                            $this->redirect('Manager/login');

                            }
                 }else{
                             $allow_ac = "Manager-login,Manager-logout,Manager-verifyImg";
                             if(strrpos($allow_ac,$nowAC)===false) {
                                 $js = <<<eof
                                    <script>
                                        window.top.location.href="/index.php/Admin/Manager/login"
                                    </script>
eof;
                                 echo $js;
                             }
                 }


//


       }

}
