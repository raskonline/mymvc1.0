<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-07-01
 * Time: 18:04
 */

namespace core\mybase;
use core\MySession;
use core\Application;

class AdminGroupController extends Controller
{

    //设置前端不受权限检查的方法
    private $pass = array("index","login");

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
            if (isset($_SESSION['sysremember'])) {
                //不处理
            } else {
                header("location:index.php?g=admin&c=login&a=index");
            }
        }
    }


    /**操作成功*/
    public function success($msg,$uri){
        echo $msg."<br>";//输出信息
        header("Refresh:2,url=index.php".$uri);//2秒收跳转到指定url

    }
    /**炒作失败*/
    public function error($msg,$uri){
        echo $msg."<br>";
        header("Refresh:2,url=index.php".$uri);

    }
}