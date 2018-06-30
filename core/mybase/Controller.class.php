<?php
namespace core\mybase;
use core\Application;

/**控制器基类*/
class Controller
{
    protected $view;//视图对象

    /**子类对象如果没有定义 __construct()，子类在实例化的时候会自动调用父类 __construct()。*/
    public function __construct()
    {
        $this->initView();//初始化视图
    }

    /**初始化视图*/
    private function initView(){
        //初始化视图对象
        $this->view=new View();
        // 视图模板的路径： application/home/views/index/index.html
        $this->view->view_dir="application/".Application::$group."/views/".strtolower(Application::$controller)."/";
    }

    /**调用视图对象渲染数据方法*/
    protected function display($viewname=null){
        $this->view->display($viewname);
    }
}