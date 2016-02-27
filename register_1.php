<?php
Session_start();
$name      = $_POST['name'];
$password  = $_POST['password'];
$pwd_again = $_POST['pwd_again'];
$code      = $_POST['check'];
$con       = mysqli_connect("localhost", "root", "glj00", "regi");
if (!$con) {
	die('Could not connect: '.mysql_error());
}

// if ($code != $_SESSION['check']) {
//		// echo "验证码错误！";
//		echo "<script> alert('验证码错误,请重新输入！');parent.location.href='register.php'; </script>";
//	}
		$sql    = "insert into user values('','".$name."','".md5($password)."')";
		$result = mysqli_query($con, $sql);
		if (!$result) {
			// echo "注册不成功！";
			echo "<script> alert('注册不成功，请重新注册');parent.location.href='register.php'; </script>";
			// echo "<a href='register.php'>返回</a>";
		} else {
			echo "注册成功!";
		}


?>