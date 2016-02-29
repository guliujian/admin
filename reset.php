<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 16/2/28
 * Time: 20:30
 */
include_once("mysql_connect.php");//连接数据库

$token = stripslashes(trim($_GET['token']));
$email = stripslashes(trim($_GET['email']));
$sql = "select * from `user` where email='$email'";

$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
if($row){
    $mt = md5($row['id'].$row['username'].$row['password']);
    if($mt==$token){
        if(date('Y-m-d H:i')-$row['getpasstime']>24*60*60){
            $msg = '该链接已过期！';
        }else{
            //重置密码...
//            $msg = '请重新设置密码，显示重置密码表单，<br/>这里只是演示，略过。';
            $sql1="UPDATE user set   password= md5(trim('123456'))  WHERE user.email='$email'";
            $query1=mysqli_query($con,$sql1);
            if($query1){
                $msg='请使用初始密码123456登录,然后到后台更改密码';
                echo $msg;
            }else{
                echo 'error';
            }
        }
    }else{
        $msg =  '无效的链接';
        echo $msg;
    }
}else{
    $msg =  '错误的链接！';
    echo $msg;
}

?>