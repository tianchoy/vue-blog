<?php 
    header('Content-type:text/json');
    include_once 'db.php';
    $id = $_GET['id'];
    $query = "select * from `arts` where `id`='$id'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    $query = "update `arts` set `hits`=hits+1 where `id`='$id'";
    $result = mysql_query($query);
    echo json_encode($row,JSON_UNESCAPED_UNICODE); 
?>