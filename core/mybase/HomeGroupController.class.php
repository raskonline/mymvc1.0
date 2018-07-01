<?php

namespace core\mybase;

use core\Application;
use core\MySession;

/**前台权限控制器*/
class HomeGroupController extends Controller
{
    //设置前端不受权限检查的方法
    private $pass = array("register", "checkname", "login");

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
}