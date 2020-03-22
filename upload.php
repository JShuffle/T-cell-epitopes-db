<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/9
 * Time: 13:29
 */
if ($_FILES["file"]["error"] > 0)
{
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    /*if (file_exists("upload/" . $_FILES["file"]["name"]))
    {
        echo $_FILES["file"]["name"] . " already exists. ";
    }
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "upload/" . $_FILES["file"]["name"]);
        echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    } */
}

$f= fopen($_FILES["file"]["tmp_name"], 'r');
$re=array();
while($data = fgetcsv($f)) {
    $re [] = $data;
}
//$result数组就是CVS的内容啦，把$result存到数据库就好。
fclose($f);

$servername = "localhost";
$username = "201828016715022";
$password = "5022";
$dbname = "201828016715022";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

if($re!=null){
    $count = count($re);
    for($i=0;$i<$count;$i++){
		$sqlString = '('."'".implode( "','", $re[$i] ) . "'".')'; //批量  
        $insertRows[]    = $sqlString; 
	}
    echo "行数".$count;
	$data1=implode(',',$insertRows);
    $sql = "INSERT INTO tcell(antigenname,ncbiid,epitopeseq,antigenseq) VALUES {$data1}";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
    echo "数据为空<br>";
}


$conn->close();

?>