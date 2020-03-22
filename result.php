<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 16:33
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>T cell</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="front/bootstrap.css"  crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <div class="container">
        <a class="navbar-brand" href="index.php">TCED</a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <?php
            $search  = $_POST['search'];
            $keyword = $_POST['keyword'];


        $servername = "localhost";
        $username = "201828016715022";
        $password = "5022";
        $dbname = "201828016715022";

        // 创建连接
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }

        $sql="";

        if(mb_strlen($keyword)== 0 ){
            $sql = "SELECT id,antigenname,ncbiid,epitopeseq,antigenseq FROM tcell";
        }
        elseif ($search=='ALL'){
            $sql = "SELECT id,antigenname,ncbiid,epitopeseq,antigenseq FROM tcell WHERE antigenname='".$keyword."' OR ncbiid='".$keyword."'";
        }
        elseif ($search=='Antigen Name'){
            $sql = "SELECT id,antigenname,ncbiid,epitopeseq,antigenseq FROM tcell WHERE antigenname='".$keyword."'";
        }
        elseif ($search=='NCBI ID'){
            $sql = "SELECT id,antigenname,ncbiid,epitopeseq,antigenseq FROM tcell WHERE ncbiid='".$keyword."'";
        }
        if ($search=='Browse Data'){
            $sql = "SELECT id,antigenname,ncbiid,epitopeseq,antigenseq FROM tcell";
        }
        if(mb_strlen($sql)>0){
            $re = $conn->query($sql);
        }
        echo "<h3>Search for \"".$keyword."\" in \"".$search."\":".$re->num_rows."results"."</h3><br>";
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Antigen Name</th>
                    <th>NCBI ID</th>
                    <th>Epitope Sequence</th>
                    <th>Antigen Sequence</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm"  style="height: 520px;overflow-y: scroll;display: inline-block">
                <tbody>
                <?php
                if(mb_strlen($sql)>0){
                    $re = $conn->query($sql);
                    if ($re->num_rows > 0) {
                        // 输出数据
                        while($row = $re->fetch_assoc()) {
                            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["antigenname"]. "</td><td>" . $row["ncbiid"]. "</td><td>" . $row["epitopeseq"]. "</td><td>" . $row["antigenseq"]. "</td></tr>";
                        }
                    } else {
                        echo "0 结果";
                    }
                } else {
                    echo "0 结果";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Copyright @ 生信一拖三</span>
    </div>
</footer>
<style>
    html {
        position: relative;
        min-height: 100%;
    }
    body {
        margin-bottom: 60px; /* Margin bottom by footer height */
    }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px; /* Set the fixed height of the footer here */
        line-height: 60px; /* Vertically center the text there */
        background-color: #f5f5f5;
    }

</style><!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="front/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="front/popper.js" crossorigin="anonymous"></script>
<script src="front/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>

