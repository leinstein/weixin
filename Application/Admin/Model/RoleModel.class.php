<?php
namespace Admin\Model;
use Think\Model; //命名空间类元素引入

//父类Model：ThinkPHP/Library/Think/Model.class.php
class RoleModel extends Model {
    //实现给角色维护权限的
    function saveAuth($role_id,$auth_id){
        //① 维护role_auth_ids字段
        $authids = implode(',',$auth_id); //101,104,102,107
        //② 维护role_auth_ac字段
        //通过$authids去数据库查询权限，获得"控制器"和"操作方法"
        $authinfo = D('Auth')->where(array('auth_id'=>array('in',$authids),'auth_pid'=>array('neq',0)))->select();

        //制作控制器、操作方法字符串
        $tmp = array();
        foreach($authinfo as $v){
            $ac = $v['auth_c']."-".$v['auth_a'];
            array_push($tmp,$ac);
        }
        $acs = implode(',',$tmp);//Goods-showlist,Order-tianjia

        //③ 给角色更新权限
        $shuju['role_id']       = $role_id;
        $shuju['role_auth_ids'] = $authids;
        $shuju['role_auth_ac']  = $acs;
        return $this ->save($shuju);
    }
}
