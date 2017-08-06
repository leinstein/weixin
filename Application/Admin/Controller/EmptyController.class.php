<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\AdminController;

class EmptyController extends AdminController {
    public function _empty(){
        $this->display('./Application/Common/error.html');
    }
}