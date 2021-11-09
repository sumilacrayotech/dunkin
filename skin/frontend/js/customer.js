$( document ).ready(function() {
    $("#create_account").validate
    ({
        rules: {
            first_name: 'required',
            last_name: 'required',
            phone: 'required',
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            password_confirm : {
                minlength : 6,
                equalTo : "#password_new"
            }
        },
        messages: {
            first_name: 'This field is required',
            last_name: 'This field is required',
            email: 'Enter a valid email',
            password: {
                minlength: 'Password must be at least 6 characters long'
            }
        }
    });
});

function showChangePassword()
{
    if($('#change_password').is(':checked')) {
        $('#change_password_section').show();
    }else{
        $('#change_password_section').hide();
    }
}

function showChangeEmail()
{
    if($('#change_email').is(':checked')) {
        $('#change_email_section').show();
    }else{
        $('#change_email_section').hide();
    }
}