<?php
/* Smarty version 3.1.36, created on 2021-01-29 17:58:57
  from 'C:\xampp\htdocs\PHP\2021-1-29\views\admin-file.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6013dc616b6391_42566784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bdb70c896c1f421e979919faadff8f5f75fda42' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\2021-1-29\\views\\admin-file.html',
      1 => 1611914336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6013dc616b6391_42566784 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言版後台管理區</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../../public/js/admin.js"><?php echo '</script'; ?>
>
</head>

<body>
    <!-- 頁首 -->
    <header>
        <div align="center">
            <img class="bear" src="../../public/images/小熊維尼.gif" alt="" width="49" height="69">

            <strong class="header">後台檔案專區</strong>

        </div>

        <table border="0" align="center" cellpadding="4" cellspacing="0"
            class="table table-success table-striped container" style="max-width:1200px;">
            <div class="row">
                <tr>
                    <td class="col">
                        <a href="../../controllers/index/logout.php?logout=true" class="btn btn-success" id="logout"
                            style="height:45px;line-height:30px;">管理員登出</p>
                        <a href="../../controllers/admin/admin.php" class="btn btn-primary" id="logout"
                            style="height:45px;line-height:30px;">回管理專區</p>
                    </td>

                    <td class="text-left">
                        <?php ob_start();
if (!(isset($_SESSION['username'])) || !(isset($_SESSION['password']))) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

                        <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['username']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
~您好:</p>
                        <?php ob_start();
}
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>

                    </td>
                    
                    <td>
                        <button class="btn btn-dark myuploadBtn">檔案上傳</button>
                    </td>

                    <td class="col" style="font-size:20px;position:relative;">
                        <!-- <p align="left" style="">目前資料筆數：<?php echo '<?php ';?>
echo $total_records; <?php echo '?>';?>
</p> -->
                    </td>

                   
                </tr>
            </div>
        </table>
    </header>

    <!-- 檔案資料區 -->
    <content>
        <table border="0" align="center" class="table table-primary table-striped" style="max-width:1200px;">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">檔案資料區~</th>
                    
                </tr>
            </thead>
            <tbody id="employeeTable1">
                <tr class="text-center">
                    <td>
                        <a class="sr-only" id="adownload" href="download.php?file=http://localhost/PHP/2021-1-29/fileUpload/測試文1.txt">檔案1-下載</a>
                        <button class="btn-success">點我修改檔案</button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        <a class="sr-only" id="adownload" href="download.php?file=http://localhost/PHP/2021-1-29/fileUpload/測試文2.txt">檔案2-下載</a>
                        <button class="btn-success">點我修改檔案</button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        <a class="sr-only" id="adownload" href="download.php?file=http://localhost/PHP/2021-1-29/fileUpload/chicken.jpg">檔案3-下載</a>
                        <button class="btn-success">點我修改檔案</button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        <a class="sr-only" id="adownload" href="download.php?file=http://localhost/PHP/2021-1-29/fileUpload/superman.jpg">檔案4-下載</a>
                        <button class="btn-success">點我修改檔案</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </content>

    <!-- 檔案上傳盒子 -->
    <div class="container">
        <div class="modal fade" id="myuploadModal" data-backdrop="static" data-keyboard="false" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header" style="background:linear-gradient(red,yellow);">
                        <h5 class="modal-title" id="staticBackdropLabel1">請選取要上傳的檔案</h5>
                    </div>

                    <form id="myupload" action="../../controllers/admin/myupload.php"method="post"enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="file" name="fileUpload[]"><br/>
                            <input type="file" name="fileUpload[]"><br/>
                            <input type="file" name="fileUpload[]"><br/>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary"id="myuploadOkBtn" value="上傳!">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html><?php }
}
