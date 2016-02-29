<?php  
//// 连接服务器，并且选择test数据库
//if (isset ($_SESSION)) {
//	ob_start();
//	session_start();
//}
$con= mysqli_connect("localhost","root","glj00","regi") ;
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_query($con,"set names 'utf8'");
?>  