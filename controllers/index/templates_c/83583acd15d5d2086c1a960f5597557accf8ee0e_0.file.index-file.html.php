<?php
/* Smarty version 3.1.36, created on 2021-01-29 14:21:01
  from 'C:\xampp\htdocs\PHP\2021-1-29\views\index-file.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6013a94ded83a7_71700902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83583acd15d5d2086c1a960f5597557accf8ee0e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\2021-1-29\\views\\index-file.html',
      1 => 1611901260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6013a94ded83a7_71700902 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>留言版</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'><?php echo '</script'; ?>
>
    <!-- <?php echo '<script'; ?>
 src="../public/js/index.js"><?php echo '</script'; ?>
> -->

    <!-- 管理登入判斷 -->
    <?php echo '<script'; ?>
 language="javascript">
        function checkForm() {
            if (document.formPost.username.value == "" && document.formPost.password.value == "") {
                alert("請輸入帳號及密碼!");
                return false;
            }
            if (document.formPost.username.value == "") {
                alert("帳號忘了輸入唷~");
                return false;
            }
            if (document.formPost.password.value == "") {
                alert("密碼忘了輸入唷~");
                return false;
            }
        }
    <?php echo '</script'; ?>
>
</head>

<body>
    <!-- 頁首 -->
    <header>
        <div align="center">
            <img class="bear" src="../../public/images/pig.gif" alt="" width="49" height="69">
            <strong class="header">檔案專區</strong>
        </div>

        <table border="0" align="center" cellpadding="4" cellspacing="0"
            class="table table-success table-striped container" style="max-width:1200px;">
            <div class="row">
                <tr>
                    <td class="col">
                        <a href="../../index.php" class="btn btn-primary" id="logout"
                            style="height:45px;line-height:30px;">回管理專區</p>
                    </td>

    

                    <td class="col text-right">
                        <p>~~~訪客您好~這裡是檔案下載區~~~</p>
                    </td>
                </tr>
            </div>
        </table>
    </header>

    <!-- 檔案下載區 -->
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
                        <a class="sr-only" id="adownload"
                            href="../admin/download.php?file=http://localhost/PHP/2021-1-29/fileUpload/測試文1.txt">檔案1</a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        <a class="sr-only" id="adownload"
                            href="../admin/download.php?file=http://localhost/PHP/2021-1-29/fileUpload/測試文2.txt">檔案2</a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        <a class="sr-only" id="adownload"
                            href="../admin/download.php?file=http://localhost/PHP/2021-1-29/fileUpload/chicken.jpg">檔案3</a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        <a class="sr-only" id="adownload"
                            href="../admin/download.php?file=http://localhost/PHP/2021-1-29/fileUpload/superman.jpg">檔案4</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </content>

</body>

</html><?php }
}
