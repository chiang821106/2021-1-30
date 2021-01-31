<?php
require_once("../class/conn.php");

// 執行刪除動作
    $boardid = filter_var($_POST['boardid'],FILTER_SANITIZE_ADD_SLASHES);
    $sql_query = "DELETE FROM board WHERE boardid=$boardid";
    $db['AS']->query($sql_query);
    $db['AS']->close();