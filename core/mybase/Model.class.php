<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/28
 * Time: 14:37
 */

namespace core\mybase;

/**数据模型基类*/
class Model
{
    private $dsn = "mysql:dbname=myhospital;host=localhost:3306";
    private $username = "root";
    private $password = "rootkit.";
    private $option = array(\PDO::ATTR_PERSISTENT => true, \PDO::ATTR_ORACLE_NULLS => true, \PDO::ERRMODE_EXCEPTION => true);
    private $pdo;//PDO对象

    /**读取配置文件，初始化Model类的属性：$dsn，$username，$password，$option*/
    public function __construct()
    {
        global $C;
        $this->dsn = isset($C['db']['dsn']) ? $C['db']['dsn'] : $this->dsn;
        $this->username = isset($C['db']['username']) ? $C['db']['username'] : $this->username;
        $this->password = isset($C['db']['password']) ? $C['db']['password'] : $this->password;
        $this->option = isset($C['db']['option']) ? $C['db']['option'] : $this->option;
    }

    /**获取PDO对象的方法*/
    public function getPDO()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO($this->dsn, $this->username, $this->password, $this->option);
        }
        return $this->pdo;
    }

    /**销毁PDO对象的方法*/
    public function destoryPDO()
    {
        if ($this->pdo != null) {
            $this->pdo = null;
        }
    }

    /**增删改的通用方法*/
    public function execute($sql, $args)
    {
        $result = 0;
        try {
            $pdostmt = $this->getPDO()->prepare($sql);
            //1、参数列表是索引数组
            if ($args != null) {
                for ($i = 0; $i < count($args); $i++) {
                    $pdostmt->bindParam($i + 1, $args[$i]);
                }
            }
            $pdostmt->execute();
            //2、参数列表是关联数组
            //$pdostmt->execute($args);
            $result = $pdostmt->rowCount();//获得受影响的行数
        } catch (\PDOException $e) {
            echo "持久化异常：" . $e->getMessage();
            return -1;
        }finally{
            $this->destoryPDO();
        }
        return $result;
    }

    /**查询的通用方法*/
    public function query($sql, $args)
    {
        try {
            $pdostmt = $this->getPDO()->prepare($sql);
            if ($args != null) {
                for ($i = 0; $i < count($args); $i++) {
                    $pdostmt->bindParam($i + 1, $args[$i]);
                }
            }
            $pdostmt->execute();
            return $pdostmt->fetchAll(\PDO::FETCH_ASSOC);//获得二维关联数组
        } catch (\PDOException $e) {
            echo "持久化异常：" . $e->getMessage();
            return null;
        }finally{
            $this->destoryPDO();
        }
    }

}