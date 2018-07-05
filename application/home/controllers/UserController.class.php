<?php
namespace application\home\controllers;
use application\home\models\UserModel;
use core\mybase\HomeGroupController;
use core\MySession;

class UserController extends HomeGroupController
{
    /**用户注册*/
    public function register()
    {
        //响应注册操作的信息
        $feedback = ["errno" => 500, "mess" => "注册失败！"];

        //从用户请求中获取数据
        $uname = $_POST['uname'];
        $upwd = $_POST['upwd'];
        $uemail = $_POST['uemail'];
        $args = [$uname, md5($upwd), $uemail];//密码使用md5函数加密
        //通过模型把数据写到数据库
        $um = new UserModel();
        $result = $um->add($args);
        //向客户端返回封装好注册信息的json数据
        if ($result > 0) {
            $feedback = ["errno" => 200, "mess" => "注册成功！"];
        }
        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);
    }

    /**判断用户名是否存在*/
    public function checkname()
    {
        $args = [$_POST['uname']];
        $um = new UserModel();
        $result = $um->getUserByName($args);
        echo $result['result'];
    }

    /**登陆*/
    public function login()
    {
        $feedback = ["errno" => 500, "mess" => "账号密码不正确！"];
        $uname = $_POST['uname'];
        $upwd = md5($_POST['upwd']);
        $args = [$uname, $upwd];
        //remember
        $remember = isset($_POST['remember']) ? true : false;
        $um = new UserModel();
        $user = $um->getUserByNameAndPassword($args);
        if ($user != null) {
            $feedback = ["errno" => 200, "mess" => "登陆成功！"];
            //用户自动登陆
            MySession::start();//注意：初始化UserController已经启动session，再次启动会导致错误。修改start（）方法，启动session时候需要判断
            MySession::setSession("uname", $uname);
            MySession::setSession("upwd", $upwd);
            MySession::setSession("remember", $remember);
            MySession::setSession("uemail", $user['uemail']);
            MySession::setSession("uid", $user['uid']);
            //模拟从数据库读取用户列表
            MySession::setSession('ulist', [array("id" => 1001, "name" => "张三"), array("id" => 1002, "name" => "李四"), array("id" => 1001, "name" => "王五")]);
            if ($remember) {
                MySession::extendSession(1 * 60 * 60);
            }
        }
        //var_dump($_SESSION);
        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);
    }

    /**用户中心*/
    public function index()
    {
        //用户中心数据显示
        //从session中获取用户信息
        $uid = $_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $uemial = $_SESSION['uemail'];
        $ulist = $_SESSION['ulist'];
        //数据分配到视图中
        $this->assign('uid', $uid);
        $this->assign('uname', $uname);
        $this->assign('uemail', $uemial);
        $this->assign('ulist', $ulist);
        //打开视图
        $this->display();
    }

    /**忘记密码*/
    public function forgot()
    {
        $tomail = isset($_POST["email"])?$_POST["email"]:"####@qq.com";
        $mail = new \PHPMailer();
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.qq.com';
        $mail->SMTPSecure = 'ssl';
        //设置ssl连接smtp服务器的远程服务器端口号 可选465或587
        $mail->Port = 465;
        $mail->Hostname = 'localhost';
        $mail->CharSet = 'UTF-8';
        $mail->FromName = '系统管理员';//发件人姓名
        $mail->Username = '####';//qq邮箱账号
        $mail->Password = '####';//qq邮箱客户端授权码
        $mail->From = '####@qq.com';
        $mail->isHTML(true);
        $mail->addAddress($tomail, '用户');
        $mail->Subject = '密码重置';
        $mail->Body = "这是一个<b style=\"color:red;\">PHPMailer</b>发送邮件的一个测试用例";
        //$mail->addAttachment('./src/20151002.png','test.png');
        $status = $mail->send();
        if ($status) {
            $this->error("操作失败！","?g=home&c=login&a=index");
        }else{
            $this->error("操作失败！","?g=home&c=user&a=forgot");
        }

    }
}

