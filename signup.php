<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作

    $name    =$_POST['name'];//post获取表单里的name
    $pwd     =$_POST['password'];//post获取表单里的password
    echo  $pwd;
    include('connect.php');//链接数据库
    $sql="insert into admin(id,user,pwd) values (null,'$name', '$pwd' )  ";
    $result = $conn->query($sql);
    if ( $result === true ){
        echo "<script>alert('Congratulations,注册成功')</script>";
        header("refresh:0;url=login.html"); 
     }else{
        echo "I AM SORRY,THERE IS SOMETHING WRONG";
     }


?>