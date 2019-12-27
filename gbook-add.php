<?php
//error_reporting(0);
session_start();
include('connect.php');
include('page.php');


//分页器
date_default_timezone_set('Asia/Shanghai');
$sql = "SELECT COUNT(*) AS NUM FROM msg";
$mysqli_result = $conn->query($sql);
$row = $mysqli_result->fetch_array(MYSQLI_ASSOC);
$dataTotal = $row['NUM'];
$pageNum = 5 ;
$page_object = new page($dataTotal,$pageNum);
//调出内容，显示出来
$sql = "SELECT * FROM msg ORDER BY id DESC LIMIT {$page_object->offset},{$pageNum}  ";
$mysqli_result = $conn->query($sql);
if ($mysqli_result === false) {
    echo "SQL is wrong ";
    exit;
}
$rows = [];
while ($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-min.css">
    <title>萧德璋的个人博客</title>
</head>
<script type="text/javascript" src="js/main.js">
</script>

<body>
    <div class="page">
        <nav class="bar">
            <ul class="bar-info">
                <li>
                    <?php
                   if ( isset($_SESSION['login'])) {
                       echo "Landing successfully";

                   }else{
                    echo "Not log in";
                   }


                    ?>
                </li>
            </ul>
            <ul class="bar-use">
                <li>
                    <div class="search">
                        <form method="post" action="query.php">
                             <input type="text" placeholder="输入查询内容" name="keywords">
                        <img src="img/查询.png">
                        <button type="submit" id="search-submit">查询</button>
                        </form>
                       
                    </div>
                </li>
            </ul>
        </nav>
        <header class="masthead">
            <div class="site-brand">
                <div class="container">
                    <img src="img/b.png">
                    <h1>Hello World !</h1>
                </div>
            </div>
            <nav class="site-navigation">
                <ul>
                    <li>
                        <a href="javascript:change()">发表文章</a>
                    </li>
                </ul>
            </nav>
            <!-- ---------发表--------------- -->
            <div class="input">
                <div class="post-publish-input">
                    <div class="wrap" id="input-wrap">
                        <form action="save.php" method="post" enctype="multipart/form-data">
                            
                        
                        <div class="unname">
                            <input type="text" name="title" placeholder="title">
                        </div>
                        <div class="unname">
                            <input type="text" name="user" placeholder="username">
                        </div>
                        <div class="unname">
                            <input type="text" name="content" placeholder="content" id="content">
                        </div>
                        <div class="unname">
                            <input type="file" name="file1" />
                        </div>

                        <div class="unname" id="submit">
                            <button type="submit">发表</button>
                        </div> </form>
                    </div>
                </div>

            </div>
        </header>
        <!-- -----------内容------------------- -->
         <?php
        foreach ($rows as $row) {
            ?> 
        <article class="post-publish">
            <div class="wrap">
                <header class="entry-header">
                    <h1 class="entry-title">
 <?php 
                        echo $row['TITLE'];
                        ?>
                    </h1>
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
                    <p> <?php
                        echo $row['CONTENT'];
                        ?></p>
                    <figure class="wblock-image">
                        <?php  if($row['pic'] <> ''){
                        echo "<img src='uploads/{$row['pic']}'/>";
                    }  ?>
                    </figure>

                </div>

                <footer class="entry-footer">
                    <div class="comments-link">
                    <a onclick='return confirm("sure to delete ?")' href='delete.php?id=
                    <?php echo $row['ID'];?>'>撤除本条</a>
                    </div> 
                    <div class="edit-link"><a class="post-edit-link" href='update.php?id=<?php echo $row['ID'];?>'>修改文章</a>
                    </div>
                </footer>
            </div>
        </article>
                <?php

    }
    ?>
    <div class="pageTool">
    <div class="pageTool-container"><?php
        $page_object->show();
        ?>
    </div>
        
    </div>
        <!-- -----------尾部------------------- -->
        <footer class="site-info">
            <p>  Proudly powered by Steven.Shaw</p>
            <p>  <a href="https://wordpress.org/themes/relativity">Relativity</a> by Wordpress </p>
        </footer>
    </div>
</body>

</html>