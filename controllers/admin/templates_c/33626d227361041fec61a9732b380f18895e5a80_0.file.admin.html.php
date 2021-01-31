<?php
/* Smarty version 3.1.36, created on 2021-01-25 16:50:31
  from 'C:\xampp\htdocs\PHP\2021-1-25-test\views\admin.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600e86579e3160_60212347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33626d227361041fec61a9732b380f18895e5a80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\2021-1-25-test\\views\\admin.html',
      1 => 1611564626,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600e86579e3160_60212347 (Smarty_Internal_Template $_smarty_tpl) {
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
            <strong class="header">留言版後台</strong>
        </div>

        <table border="0" align="center" cellpadding="4" cellspacing="0"
            class="table table-success table-striped container" style="max-width:1200px;">
            <div class="row">
                <tr>
                    <td class="col">
                        <a href="../../controllers/index/logout.php?logout=true" class="btn btn-success" id="logout"
                            style="height:45px;line-height:30px;">管理員登出</p>
                    </td>

                    <td class="col" style="font-size:20px;position:relative;">
                        <!-- <p align="left" style="">目前資料筆數：<?php echo '<?php ';?>
echo $total_records; <?php echo '?>';?>
</p> -->
                    </td>


                    <td align="right" class="col">

                        <div class="page btn btn-info">
                            <form action="../../controllers/admin/admin.php" method="get">
                                選擇分頁:<select name="page" onchange="submit()" value="<?php echo '<?=';?>
$page<?php echo '?>';?>
"><?php echo $_smarty_tpl->tpl_vars['page_p']->value;?>
</select>
                            </form>
                        </div>

                    </td>
                </tr>
            </div>
        </table>
    </header>

    <!-- 頁中-Smarty -->
    <!-- <content>
        <table border="0" align="center" class="table table-primary table-striped" style="max-width:1200px;"
            cellpadding="4" cellspacing="0">
            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['row']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['row']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <tr>

                <?php if ($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardsex"] == '男') {?>
                <td width="60" align="center">
                    <img src="images/male.gif" width="49" height="49" alt="">
                    <span><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardname"];?>
</span>
                </td>
                <?php } else { ?>
                <td width="60" align="center">
                    <img src="images/female.gif" width="49" height="49" alt="">
                    <span><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardname"];?>
</sapn>
                </td>
                <?php }?>

                <td width="60" align="center">
                    主題:
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardsubject"];?>
</td>
                <td>內容:</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardcontent"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardtime"];?>
</td>
                <td>
                    <a class="btn btn-dark" href="adminfix.php?id=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardid"];?>
">修改</a>
                    <a class="btn btn-danger" href="admindel.php?id=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardid"];?>
">刪除</a>
                </td>
                <?php if ($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["checked"] == 1) {?>
                <td>
                    <button align="right" class="btn btn-light checked" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardid"];?>
">
                        <img src="images/love.gif" alt="已讀愛心" width="35" height="35">
                    </button>
                </td>
                <?php } else { ?>
                <td>

                    <button align="right" class="btn btn-light check" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['i']->value]["boardid"];?>
">
                        <img src="images/unlove.gif" alt="no讀愛心" width="35" height="35">
                    </button>

                </td>
                <?php }?>
            </tr>
            <?php }
}
?>
        </table>
    </content> -->
    <!-- 頁中-動態表單 -->
    <content>
        <table border="0" align="center" class="table table-primary table-striped" style="max-width:1200px;">
            <!-- <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">序號</th>
                    <th scope="col">姓名</th>
                    <th scope="col">性別</th>
                    <th scope="col">主題</th>
                    <th scope="col">內容</th>
                    <th scope="col">時間</th>
                    <th scope="col">狀態</th>
                </tr>
            </thead> -->
            <tbody id="employeeTable">
                <!-- <tr class="text-center">
                    <td>1</td>
                    <td class="td1">today</td>
                    <td class="td2">XXX</td>
                    <td>1：全部權限</td>
                    <input type="hidden" class="inputVal">
                    <td>
                        <a class="btn btn-success text-white myModifyBtn">修改</a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>2</td>
                    <td class="td1">tonight</td>
                    <td class="td2">XXX</td>
                    <td>2：訂單管理 </td>
                    <td>
                        <a class="btn btn-success text-white myModifyBtn">修改</a>
                        <a class="btn btn-danger text-white myDeleteBtn">刪除</a>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </content>

    <!-- 修改對話盒 -->
    <div class="container">
        <div class="modal fade" id="myModifyModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header" style="background:linear-gradient(red,yellow);">
                        <span class="text-dark" style="font-size:36px;">修改</span>
                    </div>

                    <form role="form" id="editFormID"name="editFormID">
                        <div class="modal-body">
                           <input type="hidden"name="id"id="id">
                             
                            <div class="form-group form-inline ">
                                <label for="boardname" class="col-3">姓名:</label>
                                <input type="text" class="form-control col-8" id="boardname" value=""
                                >
                            </div>
              
                            <div class="form-group form-inline ">
                                <label for="boardsex" class="col-3">性別:</label>
                                <select class="form-control col-8" id="boardsex" required>
                                    <option value="" style="display:none">請選擇</option>
                                    <option value="男">男</option>
                                    <option value="女">女</option>
                                </select>
                                <input type="hidden" value="" id="inputVal">
                            </div>

                            <div class="form-group form-inline ">
                                <label for="boardsubject" class="col-3">主題:</label>
                                <input type="text" class="form-control col-8" id="boardsubject" value=""
                                >
                            </div>
                            <div class="form-group form-inline ">
                                <label for="boardcontent" class="col-3">內容:</label>
                                <textarea class="form-control col-8" name="boardcontent" id="boardcontent" cols="30" rows="10"></textarea>
                            </div>
                            
                            <div class="modalBtn">
                                <button type="submit" class="btn btn-primary" id="modifyOkBtn">確認</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php }
}
