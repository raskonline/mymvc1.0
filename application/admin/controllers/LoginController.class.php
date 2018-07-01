<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-07-01
 * Time: 18:01
 */

namespace application\admin\controllers;


use application\admin\models\SysUserModel;
use core\mybase\AdminGroupController;
use core\MySession;


class LoginController extends AdminGroupController
{
    /**打开登陆窗口*/
    public function index()
    {
        $this->display();
    }

    /**登陆验证*/
    public function login()
    {
        $feedback = ["errno" => 500, "mess" => "账号密码不正确！"];
        $sysname=$_POST['account'];
        $syspwd=md5($_POST['password']);
        $args = [$sysname,$syspwd];
        //remember
        $sysremember = isset($_POST['remember']) ? true : false;
        $sum=new SysUserModel();
        $user = $sum->getUser($args);
        if ($user != null) {
            $feedback = ["errno" => 200, "mess" => "登陆成功！"];
            //用户自动登陆
            MySession::start();//注意：初始化UserController已经启动session，再次启动会导致错误。修改start（）方法，启动session时候需要判断
            MySession::setSession("sysname",$sysname);
            MySession::setSession("syspwd",$syspwd);
            MySession::setSession("sysremember",$sysremember);
            MySession::setSession("sysid",$user['id']);
            if($sysremember){
                MySession::extendSession(1*60*60);
            }
        }
        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);
    }

    /**注销登陆*/
    public function logout(){
        MySession::destorySession();
        header("location:index.php?g=admin&c=login&a=index");
    }

}