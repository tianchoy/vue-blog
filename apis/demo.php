<?php
    header('Content-type:text/json');
    include_once 'db.php';

    echo 'hello';

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

    interface Arts
    {
        public function search();
        public function addArt();
        public function delArt($id);
        public function changeArt($id);
    }

    class baseIndex implements Arts
    {
        public function search()
        {
            $query = "select * from `arts` order by id DESC limit 0,10";
            $res = mysql_query($query);
            $dataArr = array();
            while($row = mysql_fetch_assoc($res)) {
                $row['content'] = iconv_substr($row['content'],0,250,'utf-8');
                $dataArr[]=$row;  
            }  
            echo json(200,'数据返回成功',$dataArr);
        }
    }
?>