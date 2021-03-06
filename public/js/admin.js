const main = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 /********R E G I S T E R  N E W  U S E R*********/
    $('.registerNewUser').on('click',() => {
        let name = $('#name').val();
        let username = $('#username').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let active = $('#active').val();
        let role = $('#role').val();
        //console.log({name,username,email,password,active,role})

        //regExr
        $.ajax({
            url : '/addUser',
            method : 'post',
            dataType : 'json',
            data : {
                name,
                username,
                email,
                password,
                active,
                role
            },
            success(data) {
                if(data){
                    jQuery('#addUser').modal('show');
                    $("#form").trigger('reset');
                }
            },
            error(err) {
                let elem = '';
                let errors = $.parseJSON(err.responseText);
                $.each(errors['errors'], function(index, value) {
                    elem += `<p style="color: red;"> ${value[0]} </p>`;
                    //  console.log(value[0]);
                });
                $('.addUserErrors').html(elem);
            }
        })
    });

/********D E L E T E  U S E R*******/
    $('.deleteUser').on('click', function () {
        let id = $(this).data('uid');

        $.ajax({
            url : `/deleteUser/${id}`,
            method : 'get',
            dataType : 'json',
            data : {},
            success(data) {
                if(data){
                    $(`button.deleteUser[data-uid=${id}]`).fadeOut(300, function() {  $(`button.deleteUser[data-uid=${id}]`).parents()[1].remove();});
                }
            },
            error(err) {
                console.log(err);
            }
        })
    });

/*********U P D A T E  U S E R**************/
    $('.updateUser').on('click',function () {
        let userID = $(this).data('uid');
        let name = $('#name').val();
        let username = $('#username').val();
        let email = $('#email').val();
        let active = $('#active').val();
        let role = $('#role').val();

        $.ajax({
            url : `/updateUser/${userID}`,
            method : 'post',
            dataType : 'json',
            data : {
                name,
                username,
                email,
                active,
                role
            },
            success(data) {
                if(data == 200)
                    jQuery('#updateSuccesfull').modal('show');
            },
            error(err) {
               console.log(err);
            }
        })
    });

   /********SEARCH BY DATE ACTIVITY*******/
   $('.activityDate').on('click',() => {
       let from = $('.from').val();
       let to = $('.to').val();
       if(from && to){
           $.ajax({
               url : '/activityDate',
               method : 'post',
               dataType : 'json',
               data : {
                   from,
                   to
               },
               success(data) {
                   console.log(data);
                   if(data){
                       let elem = '';
                       elem += `<h5>All activities in between ${from} and ${to} / <a href="/renderActivity">Load all activity</a></h5>`;
                       elem +=  ` <div class="table-wrapper-scroll-y my-custom-scrollbar">
                   <table class="table mt-3">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                        </tr>
                        </thead>
                        <tbody>`;
                       for(let i = 0 ; i < data.length ; i++){
                           elem += `<tr>
                            <th scope="row">${ i + 1}</th>
                            <td>${data[i].user_id}</td>
                            <td>${data[i].activity}</td>
                            <td>${data[i].date}</td>
                            <td>${data[i].time}</td>
                        </tr>`
                       }
                       elem += ` </tbody>
                            </table>
                        </div>
                        <span class="mt-3">Get export in <a href="/activityCSV">CSV (all data from database)</a></span>`;

                       $('.activityContainer').html(elem);
                   }else{
                       alert(data)
                   }
               },
               error(err){
                   console.log(err);
               }
           })
       }else{
           alert('Choose the start and end date')
       }
   });

    /***********D E L E T E  B O O K************/
    $('.deleteBook').on('click',function () {
        let bookID = $(this).data('pid');

        $.ajax({
            url : '/deleteBook/' + bookID,
            method : 'post',
            dataType : 'json',
            data : {},
            success(data){
                if(data)
                    $(`button.deleteBook[data-pid=${bookID}]`).fadeOut(300, () => $(`button.deleteBook[data-pid=${bookID}]`).parents()[1].remove());
            },
            error(err){
                console.log(err);
            }
        })
    });

    /*************A D D  C A T E G O R Y*************/
    $('.addCategory').on('click',function () {
        let name = $('.categoryName').val();
        $.ajax({
            url : '/addCategory',
            method : 'post',
            dataType : 'json',
            data : {
                name
            },
            success(data){
                if(data){
                    alert('Successfully added')
                    window.location.href = "/admin";
                }

            },
            error(err){
                console.log(err);
            }
        })
    });
    /************D E L E T E  C A T E G O R Y*******/
    $('.deleteCategory').on('click',function () {
        let catID = $(this).data('pid');

        $.ajax({
            url : '/deleteCategory/'+ catID,
            method : 'get',
            dataType : 'json',
            data : {},
            success(data) {
                if(data)
                    $(`button.deleteCategory[data-pid=${catID}]`).fadeOut(300, () => $(`button.deleteCategory[data-pid=${catID}]`).parents()[1].remove());
            },error(err){
                console.log(err);
            }
        })
    });
    /*****U P D A T E  C A T E G O R Y*******/
    $('.updateCategory').on('click',function () {
        let catID = $(this).data('pid');
        let name = $('.categoryUpdateName').val();
        //console.log(name);
        $.ajax({
            url : '/updateCategory',
            method : 'post',
            dataType: 'json',
            data :{
                name,
                catID
            },success(data) {
                if(data){
                    alert('Successfully updated');
                    window.location.href = "/admin";
                }

            },
            error(err){
                console.log(err);
            }
        })
    })
    /*******A D D  AU T H O R*******/
    $('.addAuthor').on('click',function () {
        let name = $('.authorName').val();
        $.ajax({
            url : '/addAuthor',
            method : 'post',
            dataType : 'json',
            data : {
                name
            },
            success(data){
                if(data){
                    alert('Successfully added')
                    window.location.href = "/admin";
                }
            },
            error(err){
                console.log(err);
            }
        })
    });
    /************D E L E T E  A U T H O R*******/
    $('.deleteAuthor').on('click',function () {
        let authorID = $(this).data('pid');

        $.ajax({
            url : '/deleteAuthor/'+ authorID,
            method : 'get',
            dataType : 'json',
            data : {},
            success(data) {
                if(data)
                    $(`button.deleteAuthor[data-pid=${authorID}]`).fadeOut(300, () => $(`button.deleteAuthor[data-pid=${authorID}]`).parents()[1].remove());
            },error(err){
                console.log(err);
            }
        })
    });

    /*****U P D A T E  A U T H O R*******/
    $('.updateAuthor').on('click',function () {
        let authorID = $(this).data('pid');
        let name = $('.authorName').val();
        //console.log(name);
        $.ajax({
            url : '/updateAuthor',
            method : 'post',
            dataType: 'json',
            data :{
                name,
                authorID
            },success(data) {
                if(data){
                    alert('Successfully updated');
                    window.location.href = "/admin";
                }
            },
            error(err){
                console.log(err);
            }
        })
    })
};
document.addEventListener('DOMCoalertntentLoaded',main());