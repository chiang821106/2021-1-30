<?php


require '../../libs/Smarty.class.php';




$smarty = new Smarty;


$smarty->assign("rock","rock");
$smarty->display('../../views/index-file.html');

?>