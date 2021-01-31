<?php 

$i = count($_FILES['fileUpload']['name']);
for ($j=0;$j<$i;$j++){
    if($_FILES['fileUpload']['error'][$j] == 0){

        $sourcePath = $_FILES['fileUpload']['tmp_name'][$j];
        $targetPath = "../../fileUpload/".$_FILES['fileUpload']['name'][$j];

        if(move_uploaded_file($sourcePath,$targetPath)){
            // echo $_FILES['fileUpload']['name'][$j]."上傳成功!<br/>";
            echo "<script> alert('上傳成功!');location.href='admin-file.php';</script>";
        }else{
            echo $_FILES['fileUpload']['name'][$j]."上傳失敗!<br/>";
        }
    }
}
