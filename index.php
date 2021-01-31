<?php


require 'controllers/class/conn.php';
require 'controllers/class/class_page.php';
require 'libs/Smarty.class.php';


$num_pages = 1;
// //若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
    $num_pages = $_GET['page'];
    if ($num_pages < 1) {
        $num_pages = 1;
    }
}

// //預設頁數
$pageRow_records = 5;


$page_obj = new Page($db['AS'], $num_pages, $pageRow_records, "boardid", "FROM", "board")
    or die("分頁讀取失敗");
$db['AS']->query($page_obj->_SQL);
$page_p = $page_obj->PrintSelectOption();
$rows_total = $db['AS']->_num_rows;
$page_end = $page_obj->_TotalPages;

if ($num_pages > $page_end) {
    $num_pages = $page_end;
}

$row_start = ( $num_pages -1 ) * $pageRow_records;
$row_end = $row_start + $pageRow_records;

$sql = "SELECT * FROM board ORDER BY boardtime DESC LIMIT $row_start, $row_end";
$db['AS']->query($sql);

// // //本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
// $startRow_records = ($num_pages - 1) * $pageRow_records;

// // //未加限制顯示筆數的SQL敘述句
// $query_RecBoard = "SELECT * FROM board ORDER BY boardtime DESC";
// // //加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
// $query_limit_RecBoard = $query_RecBoard . " LIMIT {$startRow_records}, {$pageRow_records}";
// // //以加上限制顯示筆數的SQL敘述句查詢資料到 $RecBoard 中
// $db['AS']->query($query_limit_RecBoard);
// // //以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_RecBoard 中
// // $all_RecBoard = $db['AS']->query($query_RecBoard);
// // //計算總筆數
// // $total_records = $all_RecBoard->num_rows;
// // //計算總頁數=(總筆數/每頁筆數)後無條件進位。
// // $total_pages = ceil($total_records / $pageRow_records);





$smarty = new Smarty;

$smarty->assign("page", $num_pages);
$smarty->assign("page_p", $page_p);
$smarty->assign("page_end", $page_end);

for ($i = 0; $i < $pageRow_records; $i++) {
    $db['AS']->next_record();
    $row[$i] = $db['AS']->record;
}
$smarty->assign("row", $row);



$sex[1] = '男';
$sex[2] = '女';
// $sex[3] = '人妖';
$smarty->assign("sex",$sex);
// $smarty->assign("re",);
$smarty->display('index.html');