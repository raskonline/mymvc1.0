<?php
namespace application\admin\models;
use core\mybase\Model;

/**系统用户数据模型*/

class SysUserModel extends Model
{

    /**用户名密码验证用户*/
    public  function  getUser($args){
        $sql="SELECT * FROM sysuser WHERE name=? AND pwd=?";
        $result=$this->query($sql,$args);
        if(count($result)>0){
            return $result[0];
        }else{
            return null;
        }
    }

}