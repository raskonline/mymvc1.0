<?php

namespace core\mybase;

use core\Application;
use core\MySession;

/**前台权限控制器*/
class HomeGroupController extends Controller
{
    //设置前端不受权限检查的方法
    private $pass = array("register", "checkname", "login","forgot");

    public function __construct()
    {
        parent::__construct();
        $this->initSession();
        $this->checkLogin();
    }

    private function initSession()
    {
        MySession::start();
    }

    private function checkLogin()
    {

        if (in_array(Application::$action, $this->pass)) {
            //不处理
        } else {
            if (isset($_SESSION['remember'])) {
                //不处理
            } else {
                header("location:index.php?g=home&c=login&a=index");
            }
        }
    }

    /**操作成功*/
    public function success($msg,$uri){
        echo "<h1>^_^</h1>";
        echo $msg."<br>";//输出信息
        header("Refresh:2,url=index.php".$uri);//2秒收跳转到指定url

    }
    /**操作失败*/
    public function error($msg,$uri){
        echo "<h1>~_~</h1>";
        echo $msg."<br>";
        header("Refresh:2,url=index.php".$uri);

    }
}