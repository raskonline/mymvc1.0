<?php
$C = [
//设定系统访问的默认路由：默认访问的模块、控制器、方法
    'default_route' => [
        "group" => "home",
        "controller" => "index",
        "action" => "index"
    ],
    'db' => [
        'dsn' => 'mysql:dbname=myhospital;host=localhost:3306',
        'username' => 'root',
        'password' => 'rootkit.',
        'option' => array(\PDO::ATTR_PERSISTENT => true, \PDO::ATTR_ORACLE_NULLS => true, \PDO::ERRMODE_EXCEPTION => true)
    ]
];