<?php
//邮件发送

require 'core/PHPMailer/class.phpmailer.php';
require 'core/PHPMailer/class.smtp.php';

date_default_timezone_set('PRC');

ignore_user_abort();

set_time_limit(0);

$interval = 60 * 1;

do {
    $mail = new PHPMailer();
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
    $mail->Username = '2083967667';//qq邮箱账号
    $mail->Password = 'hnvjcxxqxxhdffgc';//qq邮箱客户端授权码
    $mail->From = '2083967667@qq.com';
    $mail->isHTML(true);
    $mail->addAddress('986133435@qq.com', '用户');
    $mail->Subject = '密码重置';
    $mail->Body = "这是一个<b style=\"color:red;\">PHPMailer</b>发送邮件的一个测试用例";
    //$mail->addAttachment('./src/20151002.png','test.png');
    $status = $mail->send();
    if ($status) {
        echo '发送邮件成功' . date('Y-m-d H:i:s');;
    } else {
        echo '发送邮件失败，错误信息未：' . $mail->ErrorInfo;
    }
    sleep($interval);//休眠1minute
} while (true);
?>

