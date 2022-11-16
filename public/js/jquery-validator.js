$(document).ready(function() {


    $('.numbersOnly').keypress(function(e) {
        var verified = (e.which == 8 || e.which == undefined || e.which == 0) ? null : String.fromCharCode(e.which).match(/[^0-9]/);
        if (verified) { e.preventDefault(); }
    });

    $(".numeric_not_allow").keyup(function count() {
        $(this).parent('div').find('.error_f').remove();
    });

    $(".numeric_not_allow").focusout(function() {
        var value = this.value;
        var is_numeric = $.isNumeric(value);
        $(this).parent("div").find(".error_f").remove();
        if (is_numeric == true) {
            console.log($(this))
            $(this).after('<span class="error_f" >Please enter only numbers and alphabets</span>');
        }
    });
    
    $( ".txtOnly" ).keypress(function(e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });


    jQuery.validator.addMethod("alpha", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    }, "Please enter only alphabet");

    jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[\w.]+$/i.test(value);
    }, "Please enter only numbers and alphabets");

    jQuery.validator.addMethod("password_check", function(value, element) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
    }, "password must contain at least 8 characters, at least one number and both lower and uppercase letters and special characters");

    jQuery.validator.addMethod("email_check", function(value, element) {
        return this.optional(element) || /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
    }, "Please enter a valid email address");


    $("#reg-form").validate({
        errorElement: 'span',
        rules: {
            "firstNamenew": {
                required: true,
                alphanumeric: true,
                maxlength: 20
            },
            "lastName": {
                required: true,
                alphanumeric: true,
                maxlength: 20
            },
            "gender": {
                required: true,
            },
            "email": {
                required: true,
                email_check: true,
                email: true,
                remote: {
                    type: 'post',
                    url: 'api/customer/checkEmail',
                    data: {
                        email: function() {
                            return $("#r_email").val();
                        }
                    },
                }
            },
            "month": {
                required: true,
            },
            "day": {
                required: true,
            },
            "year": {
                required: true,
            },
            "year": {
                required: true,
            },
            "password": {
                required: true,
                password_check: true,
            },
            "re_password": {
                required: true,
                equalTo: "#password"
            },

        },
        messages: {
            email: {
                remote: "Email is already been taken!"
            },
            re_password: {
                equalTo: "Confirm password is same as password",
            }
        },
        errorPlacement: function(error, element) {
            let $element_parent = element.parent();

            $element_parent.find(".error_f").remove();

            if ($(element).attr('type') == 'radio') {
                $element_parent.parent().append(error);
            } else if ( $(element).data('intl-tel-input-id') !== undefined ) {
                $element_parent.parent().append(error);
            } else {
                $element_parent.append(error);
            }
        },
    });



    $("#updateProfile").validate({
        errorElement: 'span',
        rules: {
            "customers_firstname": {
                required: true,
                alphanumeric: true,
                maxlength: 20
            },
            "customers_lastname": {
                required: true,
                alphanumeric: true,
                maxlength: 20
            },
            "gender": {
                required: true,
            },
            "marry_status": {
                required: true,
            },
            "month": {
                required: true,
            },
            "day": {
                required: true,
            },
            "year": {
                required: true,
            },
            "year": {
                required: true,
            },
            "phone": {
                required: true,
            },

        },
        messages: {
            email: {
                remote: "Email is already been taken!"
            }
        },
        errorPlacement: function(error, element) {
            if ($(element).attr('type') == 'radio') {
                element.parent().parent().append(error);
            } else {
                element.parent().append(error);
            }
        },
    });

});