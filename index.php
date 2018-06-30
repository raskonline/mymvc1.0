<?php
//入口文件
//1.加载配置文件和常量
require "configs/config.php";
require "configs/constants.php";

//2.注册自动加载方法
require "core/MyLoad.class.php";
\core\MyLoad::registerAutoLoad();

//3.启动核心运行类(前端处理器)
\core\Application::run();



