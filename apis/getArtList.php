<?php
    header('Content-type:text/json');
    include_once 'db.php';
    $page = $_GET['page'];
    function json($code,$message="",$data=array(),$nums=""){  
        $result=array(  
        'code'=>$code,  
        'message'=>$message,  
        'data'=>$data,
        'total'=>$nums  
        );  
        //输出json  
        echo json_encode($result,JSON_UNESCAPED_UNICODE);  
        exit;  
    } 
    $pageCount = ($page-1)*10;
    $query = "select * from `arts` order by id desc limit $pageCount, 10";
    $nums = "select count(*) from arts";
    $total = mysql_query($nums);
    $res = mysql_fetch_array($total);
    $count = $res[0];

    $result = mysql_query($query);
    $dataArr = array();
    while($row = mysql_fetch_assoc($result)) {
        $row['content'] = iconv_substr($row['content'],0,10,'utf-8');
        $dataArr[]=$row;  
    }  
    echo json(200,'数据返回成功',$dataArr,$count); 
?>