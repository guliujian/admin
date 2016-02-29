<?php
include_once ("mysql_connect.php");

$username = stripslashes(trim($_POST['name1']));
$query = mysqli_query($con,"select id from user where username='$username'");
$num   = mysqli_num_rows($query);
if ($num == 1) {
	echo '<script>alert("用户名已存在，请换个其他的用户名");window.history.go(-1);</script>';
	exit;
}

$password  = md5(trim($_POST['password1']));

//$code      = $_POST['check'];
$email = $_POST['email'];
$query1 = mysqli_query($con,"select id from user where username='$username'");
$num1   = mysqli_num_rows($query1);
if ($num1 == 1) {
	echo '<script>alert("邮箱已存在，请换个其他的邮箱");window.history.go(-1);</script>';

	exit;
}
$regitime = date('Y-m-d H:i:s');
$token = md5($username.$password.$regitime);
$token_exptime =date("Y-m-d H:i:s",strtotime("+1 day"));
$status=0;
$getpasstime=0;
// if ($code != $_SESSION['check']) {
//		// echo "验证码错误！";
//		echo "<script> alert('验证码错误,请重新输入！');parent.location.href='register.php'; </script>";
//	}
//		$sql    = "insert into user values('$name','md5($password),'$email')";
//		$sql="insert  into user  values ('.$name','.$password')";
$sql="insert into user values ('','".$username."','".$password."','".$email."','".$token."','".$token_exptime."','".$regitime."','".$status."','".$getpasstime."')";
$result = mysqli_query($con, $sql);
if (!$result) {
			// echo "注册不成功！";
echo "<script> alert('注册不成功，请重新注册');parent.location.href='index.html'; </script>";
			// echo "<a href='register.php'>返回</a>";
}
if (mysqli_insert_id($con)) {//写入成功，发邮件
         	include_once ("smtp.class.php");
         	$mail = new MySendMail();
         	$mail->setServer("smtp.qq.com", "guliujian@qq.com", "aunlwxsxlhjgbbab", 465, true);
         	$mail->setFrom("guliujian@qq.com");
         	$mail->setReceiver($email);
         	$mail->setMail("用户帐号激活","亲爱的$username<br>欢迎注册本网站<br>请在一天之内点击链接激活账号,否则账号会被清除<br>http://127.0.0.1/verify.php?verify=$token<br>如果无法直接点击请手动复制到浏览器里执行.<br>欢迎你的注册.");
            $mail->sendMail();
//           $msg = '恭喜您，注册成功！<br/>请登录到您的邮箱及时激活您的帐号！';
//           echo $msg;

         }
?>

