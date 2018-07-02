<?php

namespace application\admin\models;

use core\mybase\Model;

/**留言信息数据模型*/
class GbModel extends Model
{
    /**统计留言数目*/
    public function count()
    {
        $sql = "SELECT COUNT(1) as total FROM guestbook";
        $args = null;
        $result = $this->query($sql, $args);
        return $result[0]['total'];
    }

    /**分页查询留言*/
    public function listPage($like = null, $pageIndex = 1, $pageSize = 10)
    {
        $sql = "";
        if ($like == null) {
            $sql = "SELECT * FROM guestbook ORDER BY id DESC LIMIT ".($pageIndex-1)*$pageSize.",".$pageSize;
        } else {
            $sql = "SELECT * FROM guestbook WHERE uname LIKE '%".$like."%' ORDER BY id DESC LIMIT ".($pageIndex-1)*$pageSize.",".$pageSize;
        }
        return $this->query($sql,null);
    }


    /**删除留言*/
    public function delete($args)
    {
        $sql="DELETE FROM guestbook WHERE id=?";
        return $this->execute($sql,$args);
    }

}

