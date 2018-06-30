<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 13:55
 */

namespace application\home\controllers;


use application\home\models\UserModel;
use core\mybase\Controller;

class UserController extends Controller
{
    /**用户注册*/
    public function register(){
        //响应注册操作的信息
        $feedback=["errno"=>500,"mess"=>"注册失败！"];

        //从用户请求中获取数据
        $uname=$_POST['uname'];
        $upwd=$_POST['upwd'];
        $uemail=$_POST['uemail'];
        $args=[$uname,md5($upwd),$uemail];//密码使用md5函数加密
        //通过模型把数据写到数据库
        $um=new UserModel();
        $result=$um->add($args);
        //向客户端返回封装好注册信息的json数据
        if($result>0){
            $feedback=["errno"=>200,"mess"=>"注册成功！"];
        }
        echo json_encode($feedback,JSON_UNESCAPED_UNICODE);
    }

    /**判断用户名是否存在*/
    public function checkname(){
        $args=[$_POST['uname']];
        $um=new UserModel();
        $result=$um->getUserByName($args);
        echo $result['result'];
    }

    /**登陆*/
    public function login(){
        $feedback=["errno"=>500,"mess"=>"账号密码不正确！"];
        $args=[$_POST['uname'],md5($_POST['upwd'])];
        $um=new UserModel();
        $user=$um->getUserByNameAndPassword($args);
        if($user!=null){
            $feedback=["errno"=>200,"mess"=>"登陆成功！"];
        }
        echo json_encode($feedback,JSON_UNESCAPED_UNICODE);
    }
}