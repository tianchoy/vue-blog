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
    $type = $_GET['type'];
    $query = "delete from `$type` where `id`= '$id'";
    if(mysql_query($query)){
        echo json(200,'删除成功');
    }else{
        echo json(201,'删除失败');
    }
?>