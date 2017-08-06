<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    protected $patchValidate    =   true; //是否批处理验证


    protected $_validate        =   array(
         array('username','require','用户名不能为空'),
         array('username','','用户名重复',0,'unique'),
         array('password','require','密码不能为空'),
         array('password2','require','确认密码不能为空'),
         array('password2','password','两次密码必须保持一致',0,'confirm'),
        array('user_email','email','邮箱格式不正确',2),
        array('user_qq','number','QQ号码必须是全数字'),
        array('user_qq','6,14','QQ号码必须是6到14位',0,'length'),
        array('user_xueli','1,2,3,4','必须选择学历',0,'in'),
        array('user_hobby','check_hobby','爱好必须选择两个以上',1,'callback'),

    );  // 自动验证定义

    //$arg $_POST['hobby]
    function check_hobby($arg){
          if(count($arg)<2){
              return false;
          }
          return true;
    }

    protected $_map             =   array(
         'user'     =>      'username',
         'pwd'      =>       'password',
         'pwd2'     =>      'password2',
         'email'    =>       'user_email',
         'xueli'    =>      'user_xueli',
         'qq'       =>       'user_qq',
         'sex'      =>      'user_sex',
         'hobby'    =>      'user_hobby',
    );  // 字段映射定义

}
