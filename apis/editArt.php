<?php
    header('Content-type:text/json');
    include_once 'db.php';
    function json($code,$message="",$data=array()){  
        $result=array(  
        'code'=>$code,  
        'message'=>$message,  
        'data'=>$data   
        );  
        //输出json  
        echo json_encode($result,JSON_UNESCAPED_UNICODE);  
        exit;  
    } 
    $id = $_GET['id'];
    $query = "select * from `arts` where `id`='$id'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    echo json(200,'查询成功',$row);
?>