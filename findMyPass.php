<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 16/2/28
 * Time: 17:24
 */
include_once("mysql_connect.php");//连接数据库

$email = $_POST['email2'];

$sql = "select id,username,password from `user` where `email`='$email'";
$query = mysqli_query($con,$sql);
$num = mysqli_num_rows($query);
if($num==0){//该邮箱尚未注册！
    echo 'noreg';
    exit;
}else{
    $row = mysqli_fetch_array($query);
    $getpasstime = date('Y-m-d H:i:s');
    $uid = $row['id'];
    $token = md5($uid.$row['username'].$row['password']);//组合验证码
    $url = "http://127.0.0.1/reset.php?email=".$email."&token=".$token;//构造URL
    $time = date('Y-m-d H:i:s');
    $result = sendmail($time,$email,$url);
    if($result==1){//邮件发送成功
        $msg = '系统已向您的邮箱发送了一封邮件<br/>请登录到您的邮箱及时重置您的密码！';
        //更新数据发送时间
        mysqli_query($con,"update `user` set `getpasstime`='$getpasstime' where id='$uid '");
    }else{
        $msg = $result;
    }
    echo $msg;
}

//发送邮件
function sendmail($time,$email,$url){
    include_once ("smtp.class.php");
    $mail = new MySendMail();
    $mail->setServer("smtp.qq.com", "guliujian@qq.com", "aunlwxsxlhjgbbab", 465, true);
    $mail->setFrom("guliujian@qq.com");
    $mail->setReceiver($email);
    $mail->setMail("用户帐号激活","亲爱的$email<br>你在".$time."提交了找回密码请求,请点击下面的链接重置密码,链接24小时内有效<br>$url</a> <br>如果无法直接点击请手动复制到浏览器里执行.<br>");
    $state=$mail->sendMail();
    return $state;
}
