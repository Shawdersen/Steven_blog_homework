<?php
include('connect.php');
$id =      $_POST['id']  ;
$user =    $_POST['user'];
$content = $_POST['content'];
$title   = $_POST['title'];
$sql = "UPDATE msg SET USER='$user',CONTENT='$content',TITLE='$title' WHERE ID= $id  ";
// 更新数据
session_start();
if( !isset( $_SESSION['login']) ) {
   header("location:Tip.html");
}else{

$result = $conn->query($sql); 
if ($result === true) {
    echo "<script>alert('Congratulations,修改成功')</script>";
    $conn ->close();
    header("refresh:0;url=gbook-add.php"); 
}else{
  echo "修改失败";
}
  


}

     
?> 
