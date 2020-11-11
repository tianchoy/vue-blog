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
    $query = "select * from `reply` where `art_id`= $id order by r_id desc";
    $result = mysql_query($query);
    $dataArr = array();
    while($row = mysql_fetch_assoc($result)) {
        $dataArr[]=$row;  
    }  
    echo json(200,'数据返回成功',$dataArr); 
?>