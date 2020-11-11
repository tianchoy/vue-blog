<?php
    header('Content-type:text/json');
    include_once 'db.php';
    $content = $_POST['content'];

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
        $query = "insert into `say` (`id`,`content`,`time`) values (NULL,'$content',now())";
        if(mysql_query($query)){
            echo json(200,'发布成功');
        }else{
            echo json(201,'发布失败'),mysql_error();
        }
    }else{
        echo json(202,'说说内容不可为空'),mysql_error();
    }
?>