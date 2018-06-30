<?php
/**视图基类*/

namespace core\mybase;


use core\Application;

class View
{
    public $view_dir;//视图模板路径

    /**渲染数据方法*/
    public function display($view_name=null){
        //echo $data;
        $view_name=isset($view_name)?$view_name:Application::$action;//视图名称默认为方法名称
        include_once $this->view_dir.$view_name.".html";//参考index.php的相对位置
    }

}