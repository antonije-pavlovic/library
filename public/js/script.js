const main = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //mesage on login and register page
    $('.unregistered').hide();

    //sort description on home page
    $("p.card-text").text(function(index, currentText) {
        return currentText.substr(0, 50);
    });


    //cart
    (function(){

        $("#cart").on("click", function() {
            $(".shopping-cart").fadeToggle( "fast");
        });

    })();


/*********L O G I N***************/
    $('.login').on('click',() => {
        let username = $('.username').val();
        let password = $('.password').val();

        //regular expression

        $.ajax({
            url : '/login',
            method : 'post',
            dataType : 'json',
            data : {
                username,
                password
            },
            success(data){
                if(data.code === 200)
                    window.location.href = 'http://127.0.0.1:8000/';
                if(data.code === 422){
                    $('.unregistered').html('Sory, username or password is not ok');
                    $('.unregistered').show();
                }else
                    $('.unregistered').hide();
            },
            error(e){
                //console.log(e.status);
                if (e.status === 422){
                    $('.unregistered').html('Please fill in all fields');
                    $('.unregistered').show();
                }else{
                    $('.unregistered').hide();
                }
            }
        })
    });

    /********* R E G I S T E R *********/
    $('.register').on('click',() => {

        let name = $('.name').val();
        let username = $('.username').val();
        let password = $('.password').val();
        let email = $('.email').val();

        //regular expression

        $.ajax({
            url : '/register',
            method: 'post',
            dataType: 'json',
            data : {
                name,
                username,
                password,
                email
            },
            success(data) {
                console.log(data);
                jQuery("#exampleModal").modal('show');
            },
            error(e) {
                let elem = '';
                let errors = $.parseJSON(e.responseText);
                $.each(errors['errors'], function(index, value) {
                    elem += `<p style="color: red;"> ${value[0]} </p>`;
                  //  console.log(value[0]);
                });
                $('.registerErrors').html(elem);
            }
        })
    });

    /**********S U P P O R T**************/
    $('.sendMail').on('click', () => {
        let subject = $('#emailSubject').val();
        let text = $('#emailTxt').val();
        let email = $('#email').val();
        let username = $('#username').val();
        let userID = $('#userID').val();

        //regular expression
        $.ajax({
            url : '/support',
            method : 'post',
            dataType : 'json',
            data : {
                subject,
                text,
                email,
                username,
                userID
            },
            beforeSend: function() {
                alert('just wait for a second')
            },
            success(data){
                jQuery("#ignismyModal").modal('show');
                console.log(data);
            },
            error(e){
                console.log(e);
            }
        })
    });

    /**********S E A R C H  B Y  A U T H O R*********/
    $('.searchBtn').on('click',() => {

        let text = $('.searchTxt').val();
        if(!text)
            jQuery("#emptySearch").modal('show');
        else{
            $.ajax({
                url: '/search',
                method : 'get',
                dataType : 'json',
                data : {
                    text
                },
                success(data) {

                    //Pagination
                    let rows = data.data;
                    let numPerPage = 2;
                    let numOfPages =Math.ceil( rows.length / numPerPage);
                    let pagination = ' <ul class="pagination pagination-md">';
                    for(let i = 0 ; i < numOfPages ; i++) {
                        pagination += ` <li class="page-item paginationLink" data-page="${i+1}" 
                        data-author="${rows[i].authorID}" 
                        data-perpage="${numPerPage}">
                        <a class="page-link" >${i+1}</a></li>`
                    }
                    pagination += '</<ul>';
                    $('.paginationContainer').html(pagination);

                    //Render products
                    let elem = '';
                    for(let i = 0  ; i < rows.length ; i++) {
                        if(i > numPerPage)
                            break;
                        elem += `<div class="card col-lg-3 m-2  bg-light ">
                       <img src="${rows[i].picture}" class="card-img-top pt-2" alt="...">
                       <div class="card-body">
                           <h5 class="card-title">${rows[i].title}</h5>
                           <p class="card-text">${rows[i].description.substr(0, 50)}</p> ...
                       </div>
                       <div class="card-footer mb-2">
                           <a href="/moreInfo/${rows[i].bookID}" class="text-muted">More info</a>
                       </div>
                   </div>`;
                    }
                    $('.productContainer').html(elem);
                },
                error(err) {
                    console.log(err);
                }
            })
        }
    });

    $(document).on('click','.paginationLink', function() {
        let page = $(this).data('page');
        let authorID = $(this).data('author');
        let numPerPage = $(this).data('perpage');
        $.ajax({
            url : '/paginationSearch',
            method : 'get',
            dataType : 'json',
            data : {
                page,
                authorID,
                numPerPage
            },
            success(data){
                //render books - pagination
                let elem = '';
                for(let i = 0 ; i < data.length ; i ++){
                    elem += `<div class="card col-lg-3 m-2  bg-light ">
                       <img src="${data[i].picture}" class="card-img-top pt-2" alt="...">
                       <div class="card-body">
                           <h5 class="card-title">${data[i].title}</h5>
                           <p class="card-text">${data[i].description.substr(0, 50)}</p> ...
                       </div>
                       <div class="card-footer mb-2">
                           <a href="/moreInfo/${data[i].bookID}" class="text-muted">More info</a>
                       </div>
                   </div>`;
                }
                $('.productContainer').html(elem);
            },
            error(err){
                console.log(err);
            }
        })
    });

    /**********F I L T E R  B Y  C A T E G O R Y*********/
    $(document).on('click','.categoryFilter', function () {
        let catID = $(this).data('id');

        $.ajax({
            url : '/categoryFilter',
            method : 'get',
            dataType : 'json',
            data : {
                catID
            },
            success(data) {
                //pagination container
                let numPerPage = 2;
                let numOfPages =Math.ceil( data.length / numPerPage);
                let pagination = ' <ul class="pagination pagination-md">';
                for(let i = 0 ; i < numOfPages ; i++) {
                    pagination += ` <li class="page-item paginationCategory" data-page="${i+1}" 
                        data-cat="${data[i].cat_id}" 
                        data-perpage="${numPerPage}">
                        <a class="page-link" >${i+1}</a></li>`
                }
                pagination += '</<ul>';
                $('.paginationContainer').html(pagination);

                //render books
                let elem = '';
                for(let i = 0  ; i < data.length ; i++) {
                    if(i > numPerPage)
                        break;
                    elem += `<div class="card col-lg-3 m-2  bg-light ">
                       <img src="${data[i].picture}" class="card-img-top pt-2" alt="...">
                       <div class="card-body">
                           <h5 class="card-title">${data[i].title}</h5>
                           <p class="card-text">${data[i].description.substr(0, 50)}</p> ...
                       </div>
                       <div class="card-footer mb-2">
                           <a href="/moreInfo/${data[i].bookID}" class="text-muted">More info</a>
                       </div>
                   </div>`;
                }
                $('.productContainer').html(elem);
            },
            error(err){
                console.log(err);
            }
        })
    });

    $(document).on('click','.paginationCategory',function () {
        let page = $(this).data('page');
        let catID = $(this).data('cat');
        let numPerPage = $(this).data('perpage');

        $.ajax({
            url : '/paginatinCategory',
            method : 'get',
            dataType : 'json',
            data : {
                page,
                catID,
                numPerPage
            },
            success(data){
                console.log(data);
                let elem = '';
                for(let i = 0 ; i < data.length ; i ++){
                    elem += `<div class="card col-lg-3 m-2  bg-light ">
                       <img src="${data[i].picture}" class="card-img-top pt-2" alt="...">
                       <div class="card-body">
                           <h5 class="card-title">${data[i].title}</h5>
                           <p class="card-text">${data[i].description.substr(0, 50)}</p> ...
                       </div>
                       <div class="card-footer mb-2">
                           <a href="/moreInfo/${data[i].bookID}" class="text-muted">More info</a>
                       </div>
                   </div>`;
                }
                $('.productContainer').html(elem);
            },
            error(err){
                console.log(err);
            }
        })
    });

    /******** A D D  T O  C A R T *********/
    $('.addToCart').on('click',function () {
        let uid = $(this).data('uid');
        let pid = $(this).data('pid');

        $.ajax({
            url : '/addToCart',
            method : 'post',
            dataType : 'json',
            data : {
                uid,
                pid
            },
            success(data) {
                if(data)
                    alert('uspesno ste ubacili prozivod'); //sad nesto da uradi redirect ili tako nesto
                else
                    alert('popusio si ga')
            },
            error(err){
                console.log(err);
            }
        })
    });

    /**********R E M O V E  P R O D U C T  F R O M  C A R T **************/
    $('.removeProduct').on('click',function() {
        let bookID = $(this).data('id');
        let userID = $(this).data('uid');
        let sumPrice = $('b.sumPrice').text();
        let bookPrice =$(this).data('price');

        $.ajax({
            url : '/removeFromCart',
            method : 'post',
            dataType : 'json',
            data : {
                bookID,
                userID
            },
            success(data){
                if(data){
                    $(`i.removeProduct[data-id=${bookID}]`).fadeOut(300, function() { $(`i.removeProduct[data-id=${bookID}]`).parents()[3].remove();});
                    let newSum = (sumPrice - bookPrice);
                    $('.sumPrice').html(newSum)
                }
               else
                   alert('greska')
            },
            error(err){
                console.log(err);
            }
        })
    });

    /********B U Y  P R O D U C T S********/
    $('.buyProducts').on('click', function () {
        let userID = $(this).data('uid');
        $.ajax({
            url : '/buy',
            method : 'post',
            dataType : 'json',
            data : {
                userID
            },
            success(data) {
                if(data === 200)
                    alert('You order was successful');
                else
                    console.log('nesto nije ok');
            },
            error(err){
                console.log(err);
            }
        })
    })

};
document.addEventListener('DOMContentLoaded', main());

