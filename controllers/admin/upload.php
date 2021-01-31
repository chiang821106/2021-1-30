<?php
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "../../public/uploads/".$_FILES['userImage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" />
<?php
}
}
}

require ("../class/conn.php");
$boardid = $_POST["boardid"];

//定義變數，儲存檔案上傳路徑，之後將變數寫進資料庫相應欄位即可
$file = "uploads/" . $_FILES["userImage"]["name"];
$sql = "UPDATE board SET boardimg = '$file' WHERE boardid = '$boardid'";
$db['AS']->query($sql);
$db['AS']->close();


?>