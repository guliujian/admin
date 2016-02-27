<?php
//从test数据库中提取数据

function collect_data() {
	require_once ("mysql_connect.php");
	$sql    = "select * from user";
	$result = mysqli_query($con, $sql);

	$colum = mysqli_fetch_array($result);

	return $colum;
}

?>