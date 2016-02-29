<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 16/2/28
 * Time: 15:41
 */
include_once("mysql_connect.php");

$verify = stripslashes(trim($_GET['verify']));
$nowtime = date('Y-m-d H:i:s');

$query = mysqli_query($con,"select id,token_exptime from user where status='0' and `token`='$verify'");
$row = mysqli_fetch_array($query,MYSQLI_BOTH);
if($row){
    if($nowtime>$row['token_exptime']){ //30min
        $msg = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
    }else{
        mysqli_query($con,"update user set status=1 where id=".$row['id']);
        if(mysqli_affected_rows($con)!=1) die(0);
        $msg = '激活成功！';
    }
}else{
    $msg = 'error.';
}

echo $msg;
?>
