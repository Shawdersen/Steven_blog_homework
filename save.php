<?php
include('input.php');
include('connect.php');
include('upload.php');
$content = $_POST['content'];
$user    = $_POST['user'];
$title   = $_POST['title'];
$input = new input();

$upload = new upload();
$filename = $upload->up('file1');
//调用该函数
$is = $input->post( $content );
if( $is == false ){
	echo "content is empty ";
}

$is =$input-> post( $user);
 if( $is == false ){
 	echo "user is empty";
 }
//创建一个时间函数
$time = time();
//将数据库与html连接起来
$sql = "INSERT INTO msg ( content ,user ,intime, pic, title)  
values
('{$content}','{$user}','{$time}','{$filename}','{$title}')";
$conn->query( $sql );
header("location:gbook-add.php");
?>