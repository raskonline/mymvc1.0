<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-07-01
 * Time: 18:45
 */

namespace application\admin\controllers;
use core\mybase\AdminGroupController;

class MainController extends AdminGroupController
{
    /**管理后台首页*/
   public function main(){

       //用户中心数据显示
       //从session中获取用户信息
       $sysid=$_SESSION['sysid'];
       $sysname=$_SESSION['sysname'];
       //数据分配到视图中
       $this->assign('id',$sysid);
       $this->assign('name',$sysname);
       //打开视图
       $this->display();
       $this->display();
   }

    /**留言信息管理页*/
    public function gbmgr(){
        //用户中心数据显示
        //从session中获取用户信息
        $sysid=$_SESSION['sysid'];
        $sysname=$_SESSION['sysname'];
        //数据分配到视图中
        $this->assign('id',$sysid);
        $this->assign('name',$sysname);
        $this->display();
    }

    /**用户管理*/
    public function usermgr(){
        //用户中心数据显示
        //从session中获取用户信息
        $sysid=$_SESSION['sysid'];
        $sysname=$_SESSION['sysname'];
        //数据分配到视图中
        $this->assign('id',$sysid);
        $this->assign('name',$sysname);
        $this->display();
    }

    /**新闻管理*/
    public function newsmgr(){
        //用户中心数据显示
        //从session中获取用户信息
        $sysid=$_SESSION['sysid'];
        $sysname=$_SESSION['sysname'];
        //数据分配到视图中
        $this->assign('id',$sysid);
        $this->assign('name',$sysname);
        $this->display();
    }

    /**预约管理*/
    public function bookmgr(){
        //用户中心数据显示
        //从session中获取用户信息
        $sysid=$_SESSION['sysid'];
        $sysname=$_SESSION['sysname'];
        //数据分配到视图中
        $this->assign('id',$sysid);
        $this->assign('name',$sysname);
        $this->display();
    }
}