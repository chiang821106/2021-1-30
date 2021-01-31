<?php
    session_start();
    require 'class/mysqlilib.php';
    require 'class/class_page.php';
    
    $page = 1;//當前頁數;
    if(isset($_POST["page"])){
        $page = filter_var(addslashes($_POST["page"]),FILTER_SANITIZE_STRING);
        if($page < 1){
            $page = 1;
        }
    }

    $row_max = 5;//一次顯示幾筆資料

    if(isset($_POST["search"]) && isset($_POST["sort"])){//若使用搜尋功能
        // $page = 1;
        $sort = filter_var(addslashes($_POST["sort"]),FILTER_SANITIZE_STRING);
        $sort = "guest".$sort;
        $search = filter_var(addslashes($_POST["search"]),FILTER_SANITIZE_STRING);
        $page_obj=new Page($db['AS'],$page,$row_max,"*","FROM guest","WHERE $sort LIKE '%$search%'");
        // $sql = "SELECT * FROM guest WHERE $sort LIKE '%$search%' ORDER BY guestTime DESC LIMIT $row_start, $row_max";
    }else{
        $page_obj=new Page($db['AS'],$page,$row_max,"*","FROM guest","");
        // $sql = "SELECT * FROM guest ORDER BY guestTime DESC LIMIT $row_start, $row_max";
    }

    if(isset($_POST["getPage"])){ //判斷是否由搜尋計算筆數
        $getPage = $_POST["getPage"];
        if($getPage == 2){
            $page_obj=new Page($db['AS'],$page,$row_max,"*","FROM guest","WHERE $sort LIKE '%$search%'");
        }
    }

    $db['AS']->query($page_obj->_SQL);
    $page_p = $page_obj->PrintSelectOption();
    $rows_total = $db['AS']->_num_rows;
    $page_end = $page_obj->_TotalPages;

    if($page > $page_end){
        $page = $page_end;
    }

    $row_start = ($page-1)*$row_max;//資料從第幾筆開始

    if(isset($_POST["search"]) && isset($_POST["sort"])){
        $sql = "SELECT * FROM guest WHERE $sort LIKE '%$search%' ORDER BY guestTime DESC LIMIT $row_start, $row_max";
    }else{
        $sql = "SELECT * FROM guest ORDER BY guestTime DESC LIMIT $row_start, $row_max";
    }

    $db['AS']->query($sql);
    
    if($db['AS']->_num_rows > 0){
        for($i=0; $i<$db['AS']->_num_rows; $i++){
            $db['AS']->next_record();
            $row[$i]=$db['AS']->record;
        }

        if(isset($_POST["getPage"])){
            if($_POST["getPage"] == 1){
                echo $page_p;
            }
            if($_POST["getPage"] == 2){
                $json[0] = $row;
                $json[1] = $page_p;
                echo json_encode($json,JSON_UNESCAPED_UNICODE); 
            }
        }else{
            echo json_encode($row,JSON_UNESCAPED_UNICODE);
        }
    }else{
        echo "查無資料";
    }
?>
