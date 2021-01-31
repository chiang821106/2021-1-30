$(document).ready(function () {

    // 開啟管理員登入盒子並清空值
    $("#admin").click(function () {
        //呼叫對話框
        $("#adminModal").modal('show');
        // // 先清空各欄位的值
        $('#username').val("");
        $('#password').val("");
    });

    var employeeList = [
        // {
        //     boardname: "IamBoss",
        //     boardsex: "男",
        //     boardsubject: "可樂",
        //     boardcontent: "123",
        //     boardtime: Date(),
        //     checked: "1",
        //     boardid: "111",
        // } 
    ];

    //  生成列表
    function createTable() {

        // 先清除列表
        $('#employeeTable').empty();
        $.each(employeeList, function (key) {
            // 編號
            // number = key + 1;

            // 各欄位產生
            var td = "",
                tr = "";
            // 序號

            // td += '<td>' + number + '</td>';

            // 姓名

            td += '<td width="10%" class="td1 text-primary">' + employeeList[key].boardname + '</td>';

            // 大頭照
            switch (employeeList[key].boardimg) {
                case "":
                    td += '<td width="5%" class="td1 text-primary">' + '<img class="mypicture rounded-circle" src="public/images/user_picture.png"  width="49" height="49" alt="">' + '</td>';
                    break;
                default:
                    td += '<td width="5%" class="td1 text-primary">' + '<img class="mypicture rounded-circle" src="public/' + employeeList[key].boardimg + '"  width="49" height="49" alt="訪客照">' + '</td>';
                    break
            }


            // 性別

            switch (employeeList[key].boardsex) {

                case "男":
                    td += '<td width="5%" class="text-center">' + '<img src="public/images/male.gif"  width="49" height="49" alt="男"></td>';
                    break;
                case "女":
                    td += '<td width="5%" class="text-center">' + '<img src="public/images/female.gif" width="49" height="49" alt="女"></td>';
                    break;
                default:
                    break;
            }

            // 主題

            td += '<td class="td2 text-danger">' + employeeList[key].boardsubject + '</td>';

            // 內容

            td += '<td class="td4">' + '<textarea class="text-dark" style="font-size:24px;background:transparent;border-style:none;overflow:hidden;" cols="30" rows="2" disabled wrap={physical}/>' + employeeList[key].boardcontent + '</textarea>' + '</td>';
            // 時間

            td += '<td class="td2" style="font-size:14px;">' + employeeList[key].boardtime + '</td>';

            // 已讀狀態

            switch (employeeList[key].checked) {

                case "0":
                    td += '<td class="text-center">' + '<button class="btn btn-light">' + '<img src="public/images/unlove.gif"  width="35" height="35" alt="已讀">' + '</button>' + '</td>';
                    break;
                case "1":
                    td += '<td class="text-center">' + '<button class="btn btn-light">' + '<img src="public/images/love.gif" width="35" height="35" alt="未讀">' + '</button>' + '</td>';
                    break;
                default:
                    break;
            }

            // ID
            td += '<input type="hidden" class="inputVal" value="' + employeeList[key].boardid + '">';

            tr += '<tr class="text-center">' + td + '</tr>';
            td = "";

            // 抓表單顯示
            $('#employeeTable').append(tr);

            //開啟大頭照盒子
            $(".mypicture").click(function () {
                $("#mypicmodal").modal('show');
                var inputVal = "";
                // ID
                inputVal = $(this).parent().parent().children('input.inputVal').val();
                $('#inputVal').val(inputVal);
                // console.log(inputVal);
            });
        })
    };

    //先呼叫一次更新畫面
    // createTable();

    //向後端抓資料顯示頁面------------------------待php
    // //取得最新資料且更新

    

    // 先呼叫一次
    downloadAndUpateTable();

    function downloadAndUpateTable(query) {
        // $.get('controllers/admin/j-index.php', function (dataFromServer) {
        //     employeeList = dataFromServer; //將取得的字串改為陣列
        //     createTable();
        //     // var array = Object.keys(dataFromServer).map(function (_) {
        //     //     return dataFromServer[_];
        //     // });
        //     // employeeList = array; //將取得的字串改為陣列
        //     console.log(employeeList);
        //     createTable();
        // });


        jQuery.ajax({
            url: 'controllers/admin/j-index.php',
            method: 'get',
            data: {
                page: $('select[name="page"]').val(),
                s: query
            },
            success: function (data) {
                // var array = Object.keys(dataFromServer).map(function (_) {
                //     return dataFromServer[_];
                // });
                employeeList = data; //將取得的字串改為陣列
                // console.log(employeeList);
                createTable();
            }
        });
    }

    


    // // 搜尋監聽觸發更新
    // $('#search_text').keyup(function () {
    //     var search = $(this).val();
    //     // console.log(search);
    //     if (search != '') {
    //         downloadAndUpateTable(search);
    //     } else {
    //         downloadAndUpateTable();
    //     }
    // });

    $("#searchbtn").on("submit",function*(){
        alert("HI");
    })

    $("#searchbtn").click(function(){
        let search = $(this).prev('input[name="search_text"]').val();
        // console.log(search);
        if(search != ""){
            downloadAndUpateTable(search);
        }else{
            downloadAndUpateTable();
        }
    })
    


    // 開啟訪客留言盒子+傳遞資料到後端
    $("#myAddBtn").click(function () {
        //呼叫對話框
        $("#myAddModal").modal('show');
        // // 先清空各欄位的值
        $('#boardname').val("");
        $('#boardsex').val("");
        $('#boardsubject').val("");
        $('#boardcontent').val("");
    });

    // -------------新增 資料_對話框確認按鈕
    jQuery('#myAddOkBtn').click(function (e) {

        if (document.myForm.boardname.value != "" && document.myForm.boardsex.value != "" &&
            document.myForm.boardsubject.value != "" && document.myForm.boardcontent.value != ""
        ) {
            // 建立要輸入資料庫的值
            var dataToServer = {
                // 姓名
                boardname: $("#boardname").prop("value"),
                // 性別
                boardsex: $("#boardsex").prop("value"),
                // 主題
                boardsubject: $("#boardsubject").prop("value"),
                // 內容
                boardcontent: $("#boardcontent").prop("value"),
            };

            e.preventDefault();


            jQuery.ajax({
                url: 'controllers/index/post.php',
                method: 'post',
                data: dataToServer,
                success: function () {
                    // 呼叫更新畫面
                    downloadAndUpateTable();
                    //關掉對話框
                    $("#myAddModal").modal("hide");
                    alert('留言成功!');
                }
            })

        } else if (document.myForm.boardname.value == "") {
            alert("請輸入姓名!");
            return false;
        } else if (document.myForm.boardsex.value == "") {
            alert("請填選性別!");
            return false;
        } else if (document.myForm.boardsubject.value == "") {
            alert("請輸入主題!");
            return false;
        } else if (document.myForm.boardcontent.value == "") {
            alert("請輸入內容!");
            return false;
        } else {
            alert("您應該還有某個欄位未填唷!");
            return false;
        }
    })

    // 傳送大頭照資料到後端php
    $('#creatpic').on('submit', function (e) {
        // 紀錄要修改的資料

        // ID
        var boardid = $("#inputVal").val();


        e.preventDefault();

        var fd = new FormData(this);
        fd.append("boardid", boardid);
        // console.log(boardid);

        $.ajax({
            url: "controllers/admin/upload.php",
            type: "POST",
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                //呼叫產生畫面
                downloadAndUpateTable();
                $("#mypicmodal").modal("hide");
                alert('上傳成功!');
            },
            error: function () { }
        });
    });


})

// 上傳大頭照之前顯示照片
function readURL(input) {
    if (input.files && input.files[0]) {
        var uploadfb = input.getAttribute("targetID");

        var reader = new FileReader();

        reader.onload = function (e) {

            var img = document.getElementById(uploadfb);

            img.setAttribute("src", e.target.result)

        }
        reader.readAsDataURL(input.files[0]);
    }

}