<?php
include('connect.php');
session_start();
$user = isset ( $_POST['user'] ) ? $_POST['user'] : '' ;
$pwd  = isset ( $_POST['pwd' ])  ? $_POST['pwd']  : '';
if ( !empty($user) && !empty($pwd ) ) {
	$sql = "SELECT * FROM admin WHERE user = '{$user}' and pwd = '{$pwd}' ";
	$mysqli_result = $conn->query($sql);
	$row = $mysqli_result->fetch_array( MYSQLI_ASSOC) ; 
	if ( is_array($row) ){
		$_SESSION['login'] = 1;
		header ("location:gbook-add.php");
		exit;}
	else{
	    echo "登陆失败";
	}
	
}
?>