$('.load').hide();
$.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var check= false;
            return this.optional(element) || regexp.test(value);
        },
        "Please check your input."
);

$('.forget').click(function(){
    $('.forgettab').toggle();
});

function register()
{
    $('.load').show();
}

$('.email').click(function(e){
    e.preventDefault();
    var email= $('.text').val();
    $.ajax({
        url: '/ajax/sendpassword/',
        type: "POST",
        data: {emailid: email},
         beforeSend: function() {
        $('.load').show();
        },
        success: function(result) {
             var result = JSON.parse(result);
             console.log('result');
             if (result['success']) {
                swal('success',result['success'],'success');
            }
             if (result['error']) {
                swal('Failed',result['error'],'error');
             }
            $('.load').hide();
        }
        });
});

$('#registerformtag, .loginformtag, #editformtag').validate({
    rules: {
            name: {
                required: true,
                minlength: 5,
                regex: /^[A-z]+\s?[A-z]+$/
            },
            phone: {
                required: true,
                minlength: 10,
                regex: /^(\+91|0)?[1-9]{1}\d{9}$/
            },
            gender: {
                required: true
            },
            email: {
                required: true,
                email: true,
                regex: /^[a-z\._0-9]+@[a-z]+\.[a-z].+\.?[a-z]?$/
            },
            username: {
                required: true,
                minlength: 5,
                regex: /^\w+_?\w*\S$/
            },
            password: {
                required: true,
                minlength: 5,
                regex: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{4,17}$/
            },
            confirmpassword:{
                required: true,
                minlength: 5,
                equalTo: '#password'
            }
    },
    messages: {
        name :{
        required: "This feild is required",
        minlength: "minimum length is 5 characters"
        },
        phone: {
            required: "This field is required",
            minlength: "minimum length is 10 characters"
        },
        gender: {
            required: "This field is required"
        },
        email: {
            required: "This field is required"
        },
        username: {
            required: "This field is required",
            minlength: "minimum length is 5 characters"
        },
        password: {
            required: "This field is required",
            minlength: "minimum length is 5 characters"
        },
        confirmpassword: {
            required: "This field is required",
            minlength: "minimum length is 5 characters"
        }
    },
    submitHandler: function(form) {
        form.submit();
    }
});
