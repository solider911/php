<?php
date_default_timezone_set(PRC);

//include_once "db/connect.php";
//$sql_score = "SELECT * FROM chb_score";
//$result_score = mysql_query($sql_score);
//while($row_score = mysql_fetch_assoc($result_score)){
//        print_r($row_score);
//        echo "<br>";
//}

//printf("ASCII：%o", 5);
//printf("<span style='color: #%X%X%X'>HELLO</span>", 65, 127, 145);
//echo "<br>";

//echo file_get_contents("http://www.baidu.com");


// 文件上传

echo <<<_END
    <html>
    <head>
        <title>
            PHP Form Upload
        </title>
    </head>
    <body>
        <form method='post' action='prac0207.php' enctype='multipart/form-data'>
        Select File:<input type='file' name='filename' size='50'>
        <input type='submit' value='Upload'>
        </form>
_END;

if($_FILES){
    $name = $_FILES['filename']['name'];
    move_uploaded_file($_FILES['filename']['tmp_name'], $name);
    echo "Upload image";
}

echo "</body></html>";