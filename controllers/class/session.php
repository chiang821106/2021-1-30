<?php

session_start();
// 檢查是否存在session，否則導回留言版主畫面
if (!isset($_SESSION['loginMember']) || ($_SESSION['loginPassword'] == "")) {
    header("Location:../../index.php");
}
else{
    $guid = filter_var($_SESSION['loginMember'], FILTER_SANITIZE_STRING);
    $pguid = filter_var($_SESSION['loginPassword'], FILTER_SANITIZE_STRING);
    require_once("conn.php");
    $sql = "SELECT username,password FROM admin WHERE username = '$guid'";
    $result = $db['AS']->query($sql);
    $row_result = $result->fetch_assoc();
    $username = $row_result['username'];
    $password = $row_result['password'];
    $db['AS']->close();
    if ($username != $guid && $password != $pguid) {
        header("Location:index.php");
    } 
}
