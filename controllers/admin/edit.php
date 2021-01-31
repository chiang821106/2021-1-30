<?php

require "../class/conn.php";

$sex[1] = '男';
$sex[2] = '女';
$sex_str=$sex[$boardsex];

    //  過濾
    //  FILTER_SANITIZE_NUMBER_INT  删除所有字符，除了数字和 +-
    //  FILTER_SANITIZE_STRING      去除标签，去除或编码特殊字符。

    $boardid = filter_var($_POST['boardid'], FILTER_SANITIZE_ADD_SLASHES);
    $boardname = filter_var($_POST["boardname"], FILTER_SANITIZE_ADD_SLASHES);
    $boardsex = filter_var($_POST["boardsex"], FILTER_SANITIZE_ADD_SLASHES);
    $boardsubject = filter_var($_POST["boardsubject"], FILTER_SANITIZE_ADD_SLASHES);
    $boardcontent = filter_var($_POST["boardcontent"], FILTER_SANITIZE_ADD_SLASHES);


    if ($boardsex == "1" || $boardsex == "2") {
        $query_update = "UPDATE board SET boardname='$boardname', boardsex='$boardsex', boardsubject='$boardsubject', boardcontent='$boardcontent', boardtime=NOW() WHERE boardid='$boardid'";
        $db['AS']->query($query_update);
        $db['AS']->close();
    } else {
        echo false;
    }
