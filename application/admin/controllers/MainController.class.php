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
       $this->display();
   }

    /**留言信息管理页*/
    public function gbmgr(){
        $this->display();
    }

    /**用户管理*/
    public function usermgr(){
        $this->display();
    }

    /**新闻管理*/
    public function newsmgr(){
        $this->display();
    }

    /**预约管理*/
    public function bookmgr(){
        $this->display();
    }
}