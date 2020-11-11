<?php
    header('Content-type:text/json');
    include_once 'db.php';
    $content = $_POST['content'];
    $id = $_POST['id'];
    function json($code,$message=""){  
        $result=array(  
          'code'=>$code,  
          'message'=>$message 
        );  
        //输出json  
        echo json_encode($result,JSON_UNESCAPED_UNICODE);  
        exit;  
    };
    if($content != ''){
        $query = "update `reply` set `repl_content`='$content',`repl_time`= now() where `r_id`='$id'";
        if(mysql_query($query)){
            echo json(200,'回复成功');
        }else{
            echo json(201,'回复失败'),mysql_error();
        }
    }else{
        echo json(202,'回复内容不可为空'),mysql_error();
    }