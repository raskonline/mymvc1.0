<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/28
 * Time: 15:19
 */

namespace application\home\models;
use core\mybase\Model;

class GuestBookModel extends Model
{
    //添加留言的功能
   public function add($args){
       $sql="INSERT INTO guestbook VALUES(DEFAULT,?,?,?,?)";
       //$args=null;//如果持久化不需要参数，项目中统一使用null值
       return $this->execute($sql,$args);
   }

}