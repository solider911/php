<?php

include_once "db/connect.php";

$sql_score = "SELECT * FROM chb_score";
$result_score = mysql_query($sql_score);
while($row_score = mysql_fetch_assoc($result_score)){
        print_r($row_score);
        echo "<br>";
}


