<?php
    header('Content-type:text/json');
    include_once 'db.php';
    $id = $_POST['id'];
    $uname = $_POST['name'];
    $plcontent = $_POST['content'];
    function json($code,$message=""){  
        $result=array(  
          'code'=>$code,  
          'message'=>$message 
        );  
        //输出json  
        echo json_encode($result,JSON_UNESCAPED_UNICODE);  
        exit;  
    };
    if($uname != '' && $plcontent != ''){
        $query = "insert into `reply` (`r_id`,`art_id`,`name`,`pl_content`,`pl_time`) values (NULL,'$id','$uname','$plcontent',now())";
        if(mysql_query($query)){
            echo json(200,'恭喜你，评论成功!');
        }else{

            echo json(201,'再试试~'),mysql_error();
        }
    }else{
        echo json(202,'姓名或者内容不可为空!!'),mysql_error();
    }
?>