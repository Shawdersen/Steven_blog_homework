<?php
// 创建连接 
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "steven";
$conn = new mysqli($servername, $username, $password ,$dbname);
$conn->query("SET NAMES UTF8");
if($conn->connect_error <> 0) {
	echo "连接数据库失败";
}
?>