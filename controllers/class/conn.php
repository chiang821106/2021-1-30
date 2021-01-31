<?

require_once("mysqlilib.php");

$db['AS']=new StockDB('localhost:','root','','board')
or die("資料庫連線失敗".mysqli_connect_error());


?>