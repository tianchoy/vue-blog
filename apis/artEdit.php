<?php
    header('Content-type:text/json');
    include_once 'db.php';

    $id = $_POST['id'];
    $name = $_POST['title'];
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
    if($name != '' && $content != ''){
        $query = "update `arts` set `title`= '$name',`content`='$content',`time`=now() where `id`='$id' limit 1";
        if(mysql_query($query)){
            echo json(200,'恭喜，编辑成功');
        }else{
            echo json(201,'编辑失败！'),mysql_error();
        }
    }else{
        echo json(202,'标题或者内容不可为空'),mysql_error();
    }
?>