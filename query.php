

<?php
include('connect.php');
$keywords = $_POST['keywords'];
$sql = "SELECT * FROM MSG  where CONTENT like '%$keywords%' " ;
$mysqli_result = $conn->query($sql);
$row = $mysqli_result->fetch_array( MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查询结果</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-min.css">
</head>
<body>
    <article class="post-publish">
        <div class="wrap">
            <header class="entry-header">
                <h1 class="entry-title">
                 <?php 
                        echo  $row['TITLE'];
                        ?></a>
                    <div class="entry-meta">
                        <span class="posted-on">
                        	 <?php 
                        echo date("Y-m-d H:i:s", $row['intime']);
                        ?>
                        </span>
                        <span class="byline">
                        	 <?php 
                        echo $row['USER'];
                        ?>
                        </span>
                    </div>
            </header>
    
            <div class="entry-content">
                <p>
                	<?php 
                        echo $row['CONTENT'];
                        ?>
                </p>
                <figure class="wblock-image">
                	<?php  if($row['pic'] <> ''){
                        echo "<img src='uploads/{$row['pic']}'/>";
                    }  ?>
                </figure>
    
            </div>
        </div>
    </article>
</body>
</html>

