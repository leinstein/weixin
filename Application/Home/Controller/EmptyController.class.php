<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
    public function index(){
        $this->display('./Application/Common/error.html');
    }
    public function _empty(){
        $this->display('./Application/Common/error.html');
    }
}
