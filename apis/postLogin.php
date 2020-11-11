<?php
    header('Content-type:text/json');
    include_once 'db.php';

    $name = $_POST['name'];
    @$password= secret($_POST['password']);

    function secret($num){
        $num = md5($num);
        // $num = substr($num,0,24);
        // $num = $num .'c24d58ea';
        return $num;
    }

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
    $admin_login = 'tianchao';
    if($name != '' && $password != ''){
        $query = "select * from `register` where user='$name' and password='$password'";
        $res=mysql_query($query);
        $row=mysql_fetch_array($res);
        if($_POST['name']=$row['user'] and $_POST['password']=$row['password']){
            $_SESSION['user']=$name;
            echo json(200,'登录成功',$admin_login); 
            exit;
        }else{
            echo json(201,'登录失败',$dataArr); 
        }
        die;
    }else{
        echo json(202,'用户名或者密码不可为空'),mysql_error();
    }
?>