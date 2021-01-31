<?php

//啟用session
session_start();
// 如果沒有登入session值或是session值為空時，執行下列登入動作
if (!isset($_SESSION['loginMember']) || ($_SESSION['loginMember'] == "")) {
    if (isset($_POST['username']) && ($_POST['password'])) {
        require_once('../class/conn.php');
        // FILTER_SANITIZE_ADD_SLASHES 防單/雙引號
        //查詢admin資料表
        $username = filter_var($_POST['username'], FILTER_SANITIZE_ADD_SLASHES);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_ADD_SLASHES);
        $sql_query = sprintf("SELECT * FROM admin WHERE username='%s' AND password='%s'",$username,$password);
        $result = $db['AS']->query($sql_query);
        if (mysqli_num_rows($result) == 0) {
            $db['AS']->close();
            echo "<script> alert('帳號或密碼錯誤!');window.history.back();</script>";
        } else {
            //取出admin表中的username/password值
            $row_result = $result->fetch_assoc();
            $SQLusername = $row_result['username'];
            $SQLpassword = $row_result['password'];
            $db['AS']->close();
            //比對帳號密碼，若成功進入管理區/否則退回留言板主畫面
            if ($SQLusername == $username && $SQLpassword == $password) {
                $_SESSION['loginMember'] = $SQLusername;
                $_SESSION['loginPassword'] = $SQLpassword;
                //使用javasrcipt導向會員中心
                echo "<script> alert('主人您好!');location.href='../admin/admin.php';</script>";
            } else {
                // header("Location:index.php");
                echo "<script> alert('帳號或密碼錯誤!');window.history.back();</script>";
            }
        }
    }
} else {
    //若已經有登入session值，則前往管理區
    header("Location:index.php");
}
