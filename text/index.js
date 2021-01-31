$(document).ready(function(){
    var data = []; //後台資料
    var user = []; //確認session身份
    var page = "";//判斷有幾頁資料

    $.ajax({ //驗證身份
        url:'ck_session.php',
        method:'post',
        async:false,
        success:(res)=>{
            user = JSON.parse(res);
        }
    })

    $.ajax({ //載入頁數
        url:'data.php',
        method:'post',
        data:{
            getPage:1
        },
        success:(res)=>{
            page = res;
            $('select[name="page"]').html(page);
        }
    })


    downLoad();

    $('.page select[name="page"]').on('change',function(){    
        let search = $('input[name="search"]').val();
        if(search == ""){
            downLoad();
            let pageNow = $('.page select[name="page"]').val();
            let page = parseInt(pageNow);
            
            $('#pageShow').html(page);

        }
    })

    $('nav input[name="page"]').on('keydown',function(e){
        let search = $('input[name="search"]').val();
        if(search == ""){
            if(e.which == 13){
                let getPage = $(this).val();
                if(getPage == ""){
                    alert('尚未填寫頁數');
                }else{
                    let patt = /^[0-9]+$/;
                    if(patt.test(getPage)){
                        getPage = parseInt(getPage);
                        let pageEnd = $('.page select[name="page"] option').last().val();
                        pageEnd = parseInt(pageEnd);
                        if(getPage > pageEnd){
                            page = pageEnd;
                            alert("已超出頁尾,將返回"+page+"頁");
                            $('nav input[name="page"]').val(page);
                        }else{
                            page = getPage;
                        }
                        $('.page select[name="page"]').val(page);
                        $('#pageShow').html(page);
                        downLoad();
                    }else{
                        alert('請輸入正整數');
                    }
                }
            }
        }
    })

    $('nav input[name="search"]').on('keydown',function(e){
        if(e.which == 13){
            $('button[name="schBtn"]').trigger('click');
        }
    })


    $('button#next').on('click',function(){
        let search = $('input[name="search"]').val();
        if(search == ""){
            let pageNow = $('.page select[name="page"]').val();
            let pageEnd = $('.page select[name="page"] option').last().val();
            if(pageNow < pageEnd){
                page = parseInt(pageNow)+1;
            }else{
                page = pageEnd;
            }
    
            $('.page select[name="page"]').val(page);
            $('#pageShow').html(page);
    
            downLoad();
        }
    })


    $('button#prev').on('click',function(){
        let search = $('input[name="search"]').val();
        if(search == ""){
            let pageNow = $('.page select[name="page"]').val();
            if(pageNow > 1){
                page = parseInt(pageNow)-1;
            }else{
                page = 1;
            }
    
            $('.page select[name="page"]').val(page);
            $('#pageShow').html(page);
    
            downLoad();
        }
    })


    $('button#head').on('click',function(){
        let search = $('input[name="search"]').val();
        if(search == ""){
            let page = 1;
    
            $('.page select[name="page"]').val(page);
            $('#pageShow').html(page);
    
            downLoad();
        }
    })

    $('button#end').on('click',function(){
        let search = $('input[name="search"]').val();
        if(search == ""){
            let page = $('.page select[name="page"] option').last().val();
    
            $('.page select[name="page"]').val(page);
            $('#pageShow').html(page);
    
            downLoad();
        }
    })


    $('button[name="schBtn"]').on('click',function(){
        let search = $(this).prev('input[name="search"]').val();
        let sort = $('select[name="sort"]').val();
        if(search == ""){
            history.go(0);
        }else{
            let dataModel={
                getPage:2,
                sort:sort,
                search:search
            }
            $.ajax({
                url:'data.php',
                method:'post',
                data:dataModel,
                success:(res)=>{
                    if( res != "Write Error2"){
                        data = JSON.parse(res)[0];
                        page = JSON.parse(res)[1];
                        $('select[name="page"]').html(page);
                        createTable();
                    }else{
                        alert('查無資料');
                    }
                }
            })
        }

        $('button[name="deschBtn"]').on('click',function(){
            history.go(0);
        })

        $('.page select[name="page"]').on('change',function(){    
            let search = $('input[name="search"]').val();
            
            if(search != ""){
                let page = $(this).val();
                let sort = $('select[name="sort"]').val();
                let dataModel={
                    page:page,
                    getPage:2,
                    sort:sort,
                    search:search
                }
                $.ajax({
                    url:'data.php',
                    method:'post',
                    data:dataModel,
                    success:(res)=>{
                        if( res != "Write Error2"){
                            data = JSON.parse(res)[0];
                            page = JSON.parse(res)[1];
                            $('select[name="page"]').html(page);
                            createTable();
                        }else{
                            alert('查無資料');
                        }
                    }
                })
            }else{
                downLoad();
            }
        })

        $('button#end').on('click',function(){
            let search = $('input[name="search"]').val();
            if(search != ""){
                let page = $('.page select[name="page"] option').last().val();
        
                $('.page select[name="page"]').val(page);
                $('#pageShow').html(page);

                let sort = $('select[name="sort"]').val();
                let dataModel={
                    page:page,
                    getPage:2,
                    sort:sort,
                    search:search
                }
                $.ajax({
                    url:'data.php',
                    method:'post',
                    data:dataModel,
                    success:(res)=>{
                        if( res != "Write Error2"){
                            data = JSON.parse(res)[0];
                            page = JSON.parse(res)[1];
                            $('select[name="page"]').html(page);
                            createTable();
                        }else{
                            alert('查無資料');
                        }
                    }
                })       
            }else{
                downLoad();
            }
        })

        $('button#head').on('click',function(){
            let search = $('input[name="search"]').val();
            if(search != ""){
                let page = 1;
        
                $('.page select[name="page"]').val(page);
                $('#pageShow').html(page);

                let sort = $('select[name="sort"]').val();
                let dataModel={
                    page:page,
                    getPage:2,
                    sort:sort,
                    search:search
                }
                $.ajax({
                    url:'data.php',
                    method:'post',
                    data:dataModel,
                    success:(res)=>{
                        if( res != "Write Error2"){
                            data = JSON.parse(res)[0];
                            page = JSON.parse(res)[1];
                            $('select[name="page"]').html(page);
                            createTable();
                        }else{
                            alert('查無資料');
                        }
                    }
                })       
            }else{
                downLoad();
            }
        })

        $('button#next').on('click',function(){
            let search = $('input[name="search"]').val();
            if(search != ""){
                let pageNow = $('.page select[name="page"]').val();
                let pageEnd = $('.page select[name="page"] option').last().val();
                if(pageNow < pageEnd){
                    page = parseInt(pageNow)+1;
                }else{
                    page = pageEnd;
                }
        
                $('.page select[name="page"]').val(page);
                $('#pageShow').html(page);

                let sort = $('select[name="sort"]').val();
                let dataModel={
                    page:page,
                    getPage:2,
                    sort:sort,
                    search:search
                }
                $.ajax({
                    url:'data.php',
                    method:'post',
                    data:dataModel,
                    success:(res)=>{
                        if( res != "Write Error2"){
                            data = JSON.parse(res)[0];
                            page = JSON.parse(res)[1];
                            $('select[name="page"]').html(page);
                            createTable();
                        }else{
                            alert('查無資料');
                        }
                    }
                })       
            }else{
                downLoad();
            }
        })

        $('button#prev').on('click',function(){
            let search = $('input[name="search"]').val();
            if(search != ""){
                let pageNow = $('.page select[name="page"]').val();
                if(pageNow > 1){
                    page = parseInt(pageNow)-1;
                }else{
                    page = 1;
                }
        
                $('.page select[name="page"]').val(page);
                $('#pageShow').html(page);

                let sort = $('select[name="sort"]').val();
                let dataModel={
                    page:page,
                    getPage:2,
                    sort:sort,
                    search:search
                }
                $.ajax({
                    url:'data.php',
                    method:'post',
                    data:dataModel,
                    success:(res)=>{
                        if( res != "Write Error2"){
                            data = JSON.parse(res)[0];
                            page = JSON.parse(res)[1];
                            $('select[name="page"]').html(page);
                            createTable();
                        }else{
                            alert('查無資料');
                        }
                    }
                })       
            }else{
                downLoad();
            }
        })

        $('nav input[name="page"]').on('keydown',function(e){
            let search = $('input[name="search"]').val();
            let getPage = $('nav input[name="page"]').val();
            if(search != ""){
                if(e.which == 13){
                    if(getPage == ""){
                        alert('尚未填寫頁數');
                    }else{
                        let patt = /^[0-9]+$/;
                        if(patt.test(getPage)){
                            getPage = parseInt(getPage);
                            let pageEnd = $('.page select[name="page"] option').last().val();
                            pageEnd = parseInt(pageEnd);
                            if(getPage > pageEnd){
                                page = pageEnd;
                                alert("已超出頁尾,將返回"+page+"頁");
                                $('nav input[name="page"]').val(page);
                            }else{
                                page = getPage;
                            }
                            $('.page select[name="page"]').val(page);
                            $('#pageShow').html(page);
                            
                            let sort = $('select[name="sort"]').val();
                            let dataModel={
                                page:page,
                                getPage:2,
                                sort:sort,
                                search:search
                            }
                            $.ajax({
                                url:'data.php',
                                method:'post',
                                data:dataModel,
                                success:(res)=>{
                                    if( res != "Write Error2"){
                                        data = JSON.parse(res)[0];
                                        page = JSON.parse(res)[1];
                                        $('select[name="page"]').html(page);
                                        createTable();
                                    }else{
                                        alert('查無資料');
                                    }
                                }
                            }) 
                        }else{
                            alert('請輸入正整數');
                        }    
                    }
                }
            }
        })

    })

    $('.addBtn').on('click',function(){
        let ck = "";
        let subject = $(this).parent().find('input[name="subject"]').val();
        let name = $(this).parent().find('input[name="name"]').val();
        let email = $(this).parent().find('input[name="email"]').val();
        let content = $('textarea[name="content"]').val();
        let gender = $(this).parent().find('input:radio[name="genderAdd"]:checked').val();
        
        let dataModel = {
            subject: subject,
            name : name,
            email : email,
            gender : gender,
            content : content
        };

        if(subject == ""){
            ck += "主旨尚未填寫\n";
        }
        if(name == ""){
            ck += "暱稱尚未填寫\n";
        }
        if(email == ""){
            ck += "信箱尚未填寫\n";
        }
        if(content == ""){
            ck += "內容尚未填寫\n"
        }
        if(ck !==""){
            alert(ck);
        }else{
            $.ajax({
                url:"Creat.php",
                type:"POST",
                data:dataModel,
                success:(res) => {
                    if(res != ""){
                        alert(res);
                    }else{
                        $(this).parent().find('input:radio[value="男"]').prop('checked',true);
                        $('textarea[name="content"]').val("");
                        $(this).parent().find('input[type="text"]').val("");
                        downLoad();
                    }
                },
                error:(err) => alert(err)                
            })
        }
})

    function downLoad(){
        $.ajax({
            url:'data.php',
            method:'post',
            data:{
                page:$('select[name="page"]').val()
            },
            async:false,
            success:(resData)=>{
                data = JSON.parse(resData);
                createTable(); 
            }
        })
    }

    function createTable(){
        var tb = '';

        for(let i=0;i<data.length;i++){
            tb += '<div class="row justify-content-center">';
            tb += '<table class="table table-dark table-striped show col-4 mb-2">';
            tb += '<tr><td id="subject" colspan="2">'+data[i]["guestSubject"]+'</td></tr>';
            tb += '<tr><td>暱稱</td>';
            tb += '<td id="name">'+data[i].guestName+'</td></tr>';
            tb += '<tr><td>信箱</td>';
            tb += '<td id="email">'+data[i].guestEmail+'</td></tr>';
            tb += '<tr><td>性別</td>';
            tb += '<td id="gender">'+data[i].guestGender+'</td>'
            tb += '<tr><td>留言內容</td>';
            tb += '<td><textarea id="content" class="contentText text-white" cols="35" rows="3" readonly>';
            tb += ''+data[i].guestContent+'</textarea></td></tr>';

            if(data[i].guestReply !=""){
                tb += '<tr><td>站長回覆</td>';
                tb += '<td><textarea class="contentReply text-white" cols="35" rows="3" readonly>';
                tb += ''+data[i].guestReply+'</textarea></td></tr>';
            }

            tb += '<tr class="replyWrite">';
            tb += '<td>站長回覆</td>';
            tb += '<td>';
            tb += '<textarea name="reply" cols="35" rows="5"></textarea>';
            tb += '<input type="hidden" name="id" value="'+data[i].guestID+'">';
            tb += '<input type="submit" name="replySubmit" value="送出">';
            tb += '</td></tr>';
            tb += '</table><br>'
            tb += '<div class="configBtn row justify-content-center mb-5">';

            if(user.login === "success"){
                if(data[i].guestReply == ""){
                    tb += '<button class="replyBtn btn btn-success col-1 me-3">回覆</button>';
                }
                tb += '<button class="editBtn btn btn-warning col-1 me-3">修改</button>';
                tb += '<button class="delBtn btn btn-danger col-1">刪除</button>';
                tb += '<input type="hidden" name="id" value="'+data[i].guestID+'">';
            }

            tb += '</div></div>';  
        }      
        $('.tableShow').html(tb);


        $(".replyWrite").hide();

        $('button.replyBtn').on('click',function(){
            if($(".replyWrite").length > 0){
                $('.replyWrite').hide();
            }
                $('button.replyBtn').show();
                $(this).hide();
                $(this).parent().parent().find('.replyWrite').show();
            })


            $('button.delBtn').on('click',function(){
                $.ajax({
                    url:'del.php',
                    method:'post',
                    data:{
                        id:$(this).next('input[name="id"]').val()
                    },
                    success:()=>{
                        downLoad();
                    }
                })
            })


            $('input[name="replySubmit"]').on('click',function(){
                let reply = $(this).parent().find('textarea').val();
        
                if(reply == ""){
                    alert("尚未填寫回覆內容");
                }else{
                    $.ajax({
                        url:'index.php',
                        method:'post',
                        data:{
                            reply:$(this).parent().find('textarea').val(),
                            id:$('input[name="id"]').val()
                        },
                        success:()=>{
                            $(this).parents('.replyWrite').hide();
                            
                            let showTable = '<tr>'
                                                +'<td>站長回覆</td>'
                                                +'<td><textarea class="contentReply text-white" cols="35" rows="3" readonly>'+reply+'</textarea></td>'
                                            +'</tr>';
                            $(this).parents('table.show').append(showTable);
                        }
                    })
                }
            })

            $('button.editBtn').on('click',function(){
                let table = $(this).parents('div.row').find('table.show');
                let subject = table.find('#subject').text();
                let name = table.find('#name').text();
                let email = table.find('#email').text();
                let gender = table.find('#gender').text();
                let content = table.find('#content').text();
                let id = $(this).parent().find('input[name="id"]').val();

        
                var showTable = '<div class="addChat row justify-content-center mb-5">'
                                    +'<table class="editTable table table-warning table-striped col-5">'
                                        +'<tr>'
                                            +'<td>主旨</td>'
                                            +'<td><input name="subject" type="text" size="20" value="'+subject+'"></td>'
                                            +'<td>暱稱</td>'
                                            +'<td><input name="name" type="text" size="20" value="'+name+'"></td>'
                                        +'</tr>'
                                        +'<tr>'
                                            +'<td>信箱</td>'
                                            +'<td><input name="email" type="text" size="20" value="'+email+'"></td>'
                                            +'<td>性別</td>'
                                            +'<td>';
                if(gender == "男"){
                    showTable += '男<input type="radio" name="gender" value="1" checked>'
                                +'女<input type="radio" name="gender" value="2">';
                }else if(gender == "女"){
                    showTable += '男<input type="radio" name="gender" value="1">'
                                    +'女<input type="radio" name="gender" value="2" checked>';
                }

                showTable +=       '</td>'
                                        +'</tr>'
                                        +'<tr>'
                                            +'<td>留言內容</td>'
                                            +'<td colspan="3">'
                                                +'<textarea readonly class="contentText" name="content" id="" cols="35" rows="3">'+content+'</textarea>'
                                            +'</td>'
                                        +'</tr>';
                if(table.find('.contentReply').text()){
                    var reply = table.find('.contentReply').text();
                    showTable +='<tr class="replyWrite">'
                                        +'<td>站長回覆</td>'
                                        +'<td colspan="3">'
                                                +'<textarea name="reply" cols="35" rows="5">'+reply+'</textarea>'
                                        +'</td>'
                                    +'</tr>';
                }
                showTable +=     '</table>'
                                    +'<button class="editBtn2 col- btn btn-warning text-center">修改</button>'
                                    +'<input type="hidden" name="id" value="'+id+'">'
                                +'</div>';
        
                $(this).parents('div.row').html(showTable);
        
                
                $('button.editBtn2').on('click',function(){
                    let table = $(this).prev('table.editTable');
                    let subject = table.find('input[name="subject"]').val();
                    let name = table.find('input[name="name"]').val();
                    let email = table.find('input[name="email"]').val();
                    let gender = table.find('input:radio[name="gender"]:checked').val();
                    let content = table.find('textarea[name="content"]').text();
                    let ck = "";
        
                    if(subject == ""){
                        ck += "主旨尚未填寫\n";
                    }
                    if(name == ""){
                        ck += "暱稱尚未填寫\n";
                    }
                    if(email == ""){
                        ck += "信箱尚未填寫\n";
                    }
                    if(gender == ""){
                        ck += "性別尚未選擇\n";
                    }
                    if(content == ""){
                        ck += "內容尚未填寫\n";
                    }
                    if(table.find('textarea[name="reply"]').text()){
                        var contentReply = table.find('textarea[name="reply"]').val();
                        if(contentReply == ""){
                            ck += "回覆內容尚未填寫\n";
                        }
                    }
        
                    if(ck != ""){
                        alert(ck);
                    }else{
                        $.ajax({
                            url:'edit.php',
                            method:'post',
                            data:{
                                subject:table.find('input[name="subject"]').val(),
                                name:table.find('input[name="name"]').val(),
                                email:table.find('input[name="email"]').val(),
                                gender:table.find('input:radio[name="gender"]:checked').val(),
                                reply:table.find('textarea[name="reply"]').val(),
                                id:$(this).next('input[name="id"]').val()
                            },
                            success:(res)=>{
                                if(res != ""){
                                    alert(res);
                                }else{
                                    downLoad();
                                }
                            }
                        })
                    }
                })
        
        
            })
    }
})