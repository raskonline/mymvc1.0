<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-07-02
 * Time: 2:08
 */

namespace application\admin\controllers;


use application\admin\models\GbModel;
use core\mybase\AdminGroupController;

class GbController extends AdminGroupController
{

    /**分页查询留言信息*/
    public function list()
    {
        $pageIndex = isset($_GET['pageIndex']) ? $_GET['pageIndex'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $like = isset($_GET['like']) ? $_GET['like'] : null;
        $gbm = new GbModel($like);
        $list = $gbm->listPage($like, $pageIndex, $pageSize);
        $total = $gbm->count($like);
        $feedback = ["total" => $total, "rows" => $list];
        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);
    }

    /**删除留言*/
    public function del()
    {
        $feedback=["errno"=>500,"mess"=>"删除留言失败！"];
        $id=isset($_POST['id'])?$_POST['id']:-1;
        $args=array(intval($id));
        $gbm=new GbModel();
        $result=$gbm->delete($args);
        if($result>0){
            $feedback=["errno"=>200,"mess"=>"删除留言成功！"];
        }
        echo  json_encode($feedback,JSON_UNESCAPED_UNICODE);
    }

}