<?php
require_once ("ms_login.php");
//require_once ("mysql_connect.php");
$name     = $_POST['name'];
$password = md5($_POST['password']);
$colum = collect_data();
if (($colum['username'] == $name) && ($colum['password'] == $password)) {

		//echo "验证成功！<br>";
echo "<script type='text/javascript'>alert('登陆成功');location='index.html';</script>";

} else {

		//echo "密码错误<br>";
echo "<script type='text/javascript'>alert('密码错误');location='login.php';</script>";

}
	//echo "<a href='login.php'>返回</a>";


?>