<?php

$sex[1] = '男';
$sex[2] = '女';
$sex_str=$sex[$boardsex];



// 接收前端傳遞的值
$boardname = filter_var($_POST['boardname'],FILTER_SANITIZE_ADD_SLASHES);
$boardsex = filter_var($_POST['boardsex'],FILTER_SANITIZE_ADD_SLASHES);
$boardsubject = filter_var($_POST['boardsubject'],FILTER_SANITIZE_ADD_SLASHES);
$boardcontent = filter_var($_POST['boardcontent'],FILTER_SANITIZE_ADD_SLASHES);


require_once("../class/conn.php");

if($boardsex == "1" || $boardsex == "2"){
    $sql = "INSERT INTO board(boardname,boardsex,boardsubject,boardcontent,boardtime) VALUES ('$boardname','$boardsex','$boardsubject','$boardcontent',NOW())";
    $db['AS']->query($sql);
    $db['AS']->close();
}else{
    echo false;
}



// $query_insert = "INSERT INTO board (boardname ,boardsex ,boardsubject ,boardcontent,boardtime) VALUES (?, ?, ?, ?,NOW())";
// //預備語法
// $stmt = $db['AS']->prepare($query_insert);
// $stmt->bind_param(
//     "ssss",$boardname,$boardsex,$boardsubject,$boardcontent
// );
// $stmt->execute();
// $stmt->close();

?>

