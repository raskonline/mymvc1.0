<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 10:34
 */

namespace core;


class MyLoad
{
    //自动加载的函数
    public static function myAutoLoad($className)
    {
        $path = str_replace("\\", "/", $className);
        $filePath = $path . ".class.php";
        if (file_exists($filePath)) {
            include_once $filePath;//加载类文件
        }else{
            die("加载的文件不存在：".$filePath);
        }
    }

    //注册自动加载函数
    public static function registerAutoLoad(){
        spl_autoload_register("self::myAutoLoad");
    }

}