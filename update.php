

<?php
    include('connect.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM msg WHERE ID= $id ";
    $mysqli_result = $conn->query($sql); 
    if ($mysqli_result === false) {
    echo "SQL is wrong ";
    exit;
}      
    $row = $mysqli_result->fetch_array(MYSQLI_ASSOC) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-min.css">
    <title>修改内容</title>
</head>
<body>
    <div class="input" style="display:block">
        <div class="post-publish-input">
            <div class="wrap" id="input-wrap">
                <form action="update-add.php"  method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['ID']   ;   ?>">
                <div class="unname">
                    <input type="text" name="title"  value=  "<?php echo $row['TITLE']   ;   ?>">
                </div>
                <div class="unname">
                    <input type="text" name="user"   value=  "<?php echo $row['USER']   ;   ?>" >
                </div>
                <div class="unname">
                    <input type="text" name="content" value=  "<?php echo $row['CONTENT']   ;   ?>" id="content">
                </div>
                <div class="unname" id="submit"> 
                     <input type="submit" name="submit" value="点击修改">
                </div></form>
            </div>
        </div>

</body>
</html>












