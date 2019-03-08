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
            success(data){
                if(data){
                    jQuery('#addUser').modal('show');
                    $("#form").trigger('reset');
                }
            },
            error(err){
                console.log(err);
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
    $('.updateUser').on('click',function (){
        let userID = $(this).data('uid');
        let name = $('#name').val();
        let username = $('#username').val();
        let email = $('#email').val();
        let password = $('#password').val();
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
                password,
                active,
                role
            },
            success(data){
                console.log(data);
            },
            error(err){
                console.log(err);
            }
        })
    })

};
document.addEventListener('DOMContentLoaded',main());