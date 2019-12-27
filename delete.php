<?php
include('connect.php');
session_start();
if( !isset( $_SESSION['login']) ) {
   header("location:Tip.html");
}else{
	$id = (int) $_GET['id'];
$sql = "DELETE FROM msg where id='{$id}' ";
$conn->query($sql);
$conn ->close();
header("location:gbook-add.php");
}

