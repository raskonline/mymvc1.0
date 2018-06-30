<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 13:49
 */

namespace application\home\models;


use core\mybase\Model;

class UserModel extends Model
{
    /**添加用户信息方法*/
    public function add($args)
    {
        $sql = "INSERT INTO hpuser VALUES(DEFAULT,?,?,?)";
        return $this->execute($sql, $args);
    }


    /**验证用户名是否已存在*/
    public function getUserByName($args)
    {
        $sql="SELECT count(1) AS result FROM hpuser WHERE uname=?";
        return $this->query($sql,$args);
    }


}