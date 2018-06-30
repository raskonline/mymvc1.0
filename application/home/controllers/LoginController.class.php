<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 10:58
 */

namespace application\home\controllers;


use core\mybase\Controller;
/**登陆功能控制器*/
class LoginController extends Controller
{
    /**打开登陆视图*/
    public function index(){
        $this->display();
    }

    /**打开注册视图*/
    public function signup(){
        $this->display();
    }

    /**打开忘记密码视图*/
    public function forgot(){
        $this->display();
    }

}