<?php

namespace core;

/**session管理类*/
class MySession
{
    /**构造方法，启动session*/
    public function __construct()
    {
        session_start();//启动session
    }

    /**session添加数据*/
    public static function setSession($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**从session获取数据*/
    public static function getSession($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
        return null;
    }

    /**销毁session*/
    public static function destorySession(){
        //清空session的值
        session_unset();
        //清空cookie
        setcookie(session_name(),null,time()-1,"/");
        //销毁session
        session_destroy();
    }

    /**调整session有效期*/
    public static function extendSession($second){
        setcookie(session_name(),session_id(),time()+$second,"/");
    }
}