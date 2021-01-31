<?php
session_start();

// $test = $_GET['logout'];
// echo $test;

// $logout = $_GET['logout'];
// $username = $_SESSION['loginMember'];
// echo $username;
//執行登出動作，刪除session
if (isset($_GET['logout']) && ($_GET['logout'] == "true")) {
    // echo $username;
    unset($_SESSION['loginMember']);
    unset($_SESSION['loginPassword']);
    echo "<script> alert('已經登出!');location.href='../../index.php';</script>";
    // header("Location:index.php");
}

