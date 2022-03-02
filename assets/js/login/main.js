$('.submit_login').on('click', function (e) {
    e.preventDefault();
    let email = $('.user_email').val()
    let pass = $('.user_pass').val()
    if (email != '') {
        $.ajax({
            url: site + 'auth/validate',
            type: 'POST',
            data: { email, pass },
            success: function (data) {
                let res = JSON.parse(data)
                console.log(res)
                if (res.res == 1) {
                    location.href = site + 'dashboard'
                } else if (res.res == 2) {
                    alert_msg(lang.email_confirm, true)
                } else {
                    alert_msg(lang.invalid_account, true)
                }
            }
        })
    }
})

$('.form_input form input').on('blur', function (e) {
    validate_form()
})

function alert_msg(msg, bool, validate = false) {

    let b = !bool ? 'success' : 'danger'
    let icon = !bool ? '<i class="fas fa-check"></i>' : '<i class="fas fa-exclamation-circle"></i>'
    $('.alert').html('<span class="' + b + '">' + icon + ' ' + msg + '</span>')

}

function validate_form() {
    let flag = false
    $('.form_input form input').each(function (x, i) {
        if ($(i).hasClass('_pass') && $(i).val().length > 0 && $(i).val().length < 6) {
            alert_msg(lang.strong_pass, true, true)
            flag = true;
        } else if ($(i).val() == '') {
            flag = true;
        }
    })
    if (!flag) {
        $('.alert').html('')
    }
    $('.submit_register').attr('disabled', flag);
}



function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

$('.submit_register').on('click', function (e) {

    e.preventDefault();

    let name = $('._name').val()
    let email = $('._email_1').val()
    let email2 = $('._email_2').val()
    let pass = $('._pass').val()


    if (name != '' && email != '' && pass != '') {

        if (email != email2) {
            alert_msg(lang.repeat_email, true)
        } else {
            if (pass.length < 6) {
                alert_msg(lang.strong_pass, true, true)
            } else {

                if (!validateEmail(email) && !validateEmail(email2)) {
                    alert_msg(lang.invalid_email, true, true)
                } else {
                    $.ajax({
                        url: site + 'auth/register',
                        data: { name, email, email2, pass },
                        type: 'POST',
                        beforeSend: function () {
                            $('.alert').html('<span class=""><img src="' + site + '/assets/img/loading.gif" /></span>')
                        },
                        success: function (data) {
                            let res = JSON.parse(data)
                            if (res.login == 1) {
                                $('.title').html('')
                                $('.form_input').html(lang.verify_email)
                            } else if (res.login == 0) {
                                alert_msg(lang.error, true, true)
                            } else {
                                alert_msg(lang.email_exists, true, true)
                            }
                        }
                    })
                }
            }
        }
    }
})


$('.recover_btn').on('click', function (e) {
    e.preventDefault();
    if ($('#recover').val() != '')
        recoverFromEmail($('#recover').val());
})

function recoverFromEmail(email) {

    $.ajax({
        url: site + "home/recover",
        type: "POST",
        async: true,
        data: {
            email,
        },
        beforeSend: function () {
            $(".alert").html(lang.wait).fadeIn()
        },
        success: function (data) {
            let res = JSON.parse(data)
            if (res.res) {
                setTimeout(function () {
                    $(".alert").html(lang.success)
                    $('.recover_btn').remove()
                }, 2000);
            } else {
                setTimeout(function () {
                    $(".alert").html(lang.error)
                    setTimeout(function () {
                        $(".alert").fadeOut();
                        location.reload(true);
                    }, 2000);
                }, 2500);

            }
        },
    })
}

if ($('.count-sec').length > 0) {
    var tempo = 5
    var count = setInterval(counter, 1000)
}
function counter(el, content) {
    if (tempo == 0) {
        clearInterval(count);
        window.location.href = site + "dashboard";
    } else {
        tempo--
        $('.count-sec').html(tempo)
    }
}


function changePass(pass1, pass2, email, tkn){

    $.ajax({
        url: site + "home/update",
        type: "POST",
        async: true,
        data: {
            pass1,
            pass2,
            email,
            tkn,
        },
        beforeSend: function() {
            $(".alert").html(lang.update_pass).fadeIn();
        },
        success: function(data) {
            let res = JSON.parse(data)
            if(res.login){
                setTimeout(function() {
                    $(".alert").html(lang.success)
                    setTimeout(function() {
                        $(".alert").fadeOut()
                        window.location.href = site + "login";
                    }, 1000);
                }, 2500);
            }else{
                setTimeout(function() {
                    $(".alert").html(lang.try_again)
                    setTimeout(function() {
                        $(".alert").fadeOut()
                        location.reload(true);
                    }, 1000);
                }, 2500);
            }
        },
    })
}

$('.submit_redefine').on('click', function (e) {
    e.preventDefault();
    if ($('#login-pass1').val().length >= 6) {
        if ($('#login-pass1').val() == $('#login-pass2').val()) {
            changePass($('#login-pass1').val(), $('#login-pass2').val(), $('#user-email').val(), $('#user-tk').val())
        } else {
            $(".alert").html(lang.error_pass)
            setTimeout(function () {
                $(".alert").fadeOut()
            }, 2500);
        }
    } else {
        $(".alert").html(lang.strong_pass)
        setTimeout(function () {
            $(".alert").fadeOut()
            location.reload(true);
        }, 2500);
    }
})

