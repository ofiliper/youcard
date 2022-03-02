if ($('.qr-code-generated').length > 0) {
    qrcode_generate()
    var imgQRCode = generate_download_btn()
}

$('.qr-btn').on('click', function (e) {
    imgQRCode.click()
})

function qrcode_generate() {
    $('.qr-code-generated').empty();
    $('.qr-code-generated').qrcode({ width: 250, height: 250, text: 'https://cardapin.com/' + $('.unique_url').val() });

}

function generate_download_btn() {
    var canvas = document.getElementsByTagName("canvas")[0];
    image = canvas.toDataURL("image/png", 1.0).replace("image/png", "image/octet-stream");
    var link = document.createElement('a');
    link.download = "qrcode.png";
    link.href = image;
    return link
}


$('.unique_url').on('keydown', function (e) {
    if ($(this).length > 0) {
        $('.find_url').attr('disabled', false)
    }
})

$(document).on('change focus', '.box_label .input', function (e) {
    $('.save_page').attr('disabled', false)
})

$('.find_url').on('click', function (e) {
    if ($('.unique_url').val().length > 0) {
        let url = $('.unique_url').val()
        $.ajax({
            url: site + 'config/uri',
            data: { url: url },
            type: "POST",
            success: function (data) {
                if (data == 1) {
                    swal.fire(lang.success, lang.success_uri, 'success').then(function () {
                        $('.alert_url').html('<a target="_blank" href="' + site + url +'"><i class="fas fa-external-link-alt"></i> Visit your page</a>')
                        qrcode_generate()
                        imgQRCode = generate_download_btn()
                    })
                } else if (data == 'user') {
                    swal.fire(lang.error, lang.error_uri, 'error')
                }
                $('.find_url').attr('disabled', true)
            }
        })
    }
})

$('.qr-free').on('click', function (e) {
    Swal.fire({
        title: lang.error,
        text: lang.is_premium,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: lang.want_premium,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = site + 'dashboard/premium'
        }
    })
})

function get_social_media(el) {
    let res = []
    let wpp = {}
    el.each(function (x, i) {
        let cur = {}
        if ($(i).val() != '') {
            if ($(i).data('type') == 'whatsapp') {
                if ($(i).hasClass('wpp_msg')) {
                    wpp.msg = $(i).val();
                } else {
                    wpp.phone = $(i).val();
                    cur.midia = $(i).data('type')
                    cur.c = wpp;
                    res.push(cur)
                }
            } else {
                cur.midia = $(i).data('type')
                cur.c = $(i).val()
                res.push(cur)
            }
        }
    })
    return res
}

$('.col-2-min input').on('change', function (e) {
    $('.save_media').attr('disabled', false)
    $(this).each(function (x, i) {
        if ($(i).val() != '') {
        } else {
            // $('.save_media').attr('disabled', true)
        }
    })
})

$('.save_media').on('click', function (e) {
    let social = get_social_media($('.col-2-min input'));
    $.ajax({
        url: site + 'config/social',
        type: "POST",
        data: { social },
        success: function (data) {
            swal.fire(lang.media.success, lang.media.content, 'success')
            $('.save_media').attr("disabled", true);
        }
    })
})

$(document).on('click', '.modal_icon', function (e) {
    e.preventDefault()
    $.ajax({
        url: site + 'config/modal',
        data: {},
        type: "POST",
        success: function (data) {
            $('.modal').html(data);
        }
    })
})

$('.modal-body button').on('click', function (e) {
    $('.modal-body button').each(function (x, i) {
        $(i).removeClass('active')
    })
    $(this).addClass('active')
})
let selected_icon = ''
$(document).on('click', '.icon-selector', function (e) {
    selected_icon = $(this)
})

$('.select-icon').on('click', function (e) {
    let ic, content = ''
    let icon = $(this).closest('.modal-content').find('.modal-body button')
    icon.each(function (x, i) {
        if ($(i).hasClass('active')) {
            $(i).removeClass('active')
            ic = $(i).val()
            content = $(i).html()
        }
    })
    $('.modal').modal('hide')
    selected_icon.val(ic)
    selected_icon.html(content)
    $('.save_page').attr("disabled", true);
})


$("#sortable").sortable({
    revert: true,
    opacity: .25,
});

$('.add_field button').on('click', function (e) {
    e.preventDefault()
    $.ajax({
        url: site + 'admin/template',
        data: { action: $(this).val() },
        type: 'POST',
        beforeSend: function () {
            $('.group').append('<span class="temp-load"><img width="30" src="' + site + '/assets/img/loading.gif" /></span>')
            $('html,body').animate({ scrollTop: $(document).height() + $(window).height() });
        },
        success: function (data) {
            $(".box-drag").draggable({
                containment: "parent",
                connectToSortable: "#sortable",
                revert: "invalid"
            });

            setTimeout(() => {
                $('.temp-load').fadeOut(100)
                $('html,body').animate({ scrollTop: $(document).height() + $(window).height() });
                $('.group').append(data)
            }, 500);

        }
    })
})

$(document).on('click', '.save_page', function (e) {
    let content = []
    $('.box').each(function (x, i) {
        console.log()
        if ($(i).hasClass('box')) {
            let el = validate_el($(i));
            content.push(el)
        }
    })
    $.ajax({
        url: site + 'admin/save_page',
        type: "POST",
        data: { content },
        success: function (data) {
            swal.fire(lang.page.success, lang.page.content, 'success')
            $('.save_page').attr("disabled", true);
        }
    })
})

function validate_el(el) {
    let res = {}
    if (el.hasClass('bio')) {
        res.type = 'bio'
        res.title = el.find('input')[0].value
        res.content = el.find('input')[1].value
    }
    if (el.hasClass('box_icon')) {
        res.type = 'icon'
        res.icon = el.find('.icon-selector').val()
        res.content = el.find('input').val()
    }
    if (el.hasClass('box_button')) {
        res.type = 'button'
        res.title = $(el.find('input')[0]).val()
        res.content = $(el.find('input')[1]).val()
    }
    if (el.hasClass('box_textarea')) {
        res.type = 'text'
        $(el.find('.text-options button')).each(function (x, i) {
            if ($(i).hasClass('active')) {
                res.align = $(i).val()
            }
        })
        res.content = el.find('textarea').val()
    }
    if (el.hasClass('box_title')) {

        res.type = 'title'
        $(el.find('.text-options button')).each(function (x, i) {
            if ($(i).hasClass('active')) {
                res.align = $(i).val()
            }
        })
        res.content = el.find('input').val()
    }
    return res
}

$(document).on('click', '.text-options button', function (e) {
    e.preventDefault()
    let el = $(this).closest('.text-options')

    $(el[0].children).each((i, x) => {
        $(x).removeClass('active')
    });

    $(this).addClass('active')
})

$(document).on('click', '.delete_widget', function (e) {
    let el = $(this).closest('.box').fadeOut().remove()
})


$(document).on('click', '.box_label', function (e) {
    if ($(this).find('input').length > 0) {
        $(this).find('input').focus()
        if($(window).width() < 600){
            let inputvalue = $(this).find('input').val() 
            $(this).find('input').val( '' )
            $(this).find('input').val(inputvalue )
        }
    }
    if ($(this).find('textarea').length > 0) {
        $(this).find('textarea').focus()
        if($(window).width() < 600){
            let inputvalue = $(this).find('textarea').val() 
            $(this).find('textarea').val( '' )
            $(this).find('textarea').val(inputvalue )
        }
    }
})

$(document).on('focus', '.input', function (e) {
    if ($(this).closest('.box_label').length > 0) {
        $(this).closest('.box_label').find('label').addClass('active');
    }
})

$(document).on('blur', '.input', function (e) {
    if ($(this).closest('.box_label').length > 0) {
        if ($(this).val().length == 0) {
            $(this).closest('.box_label').find('label').removeClass('active');
        }
    }
})



$(document).on('change', '.upload-file input', function (e) {

    var type, url

    if ($(this).hasClass('profile-input')) {
        url = site + 'files/send?i=profile'
        type = 'perfil'
    }

    if ($(this).hasClass('cover-input')) {
        url = site + 'files/send?i=cover'
        type = 'capa'
    }

    e.preventDefault();
    var targetInput = $(this)
    var property = $(this)[0].files[0];
    var img_name = property.name;
    var image_size = property.size;
    var img_extension = img_name.split('.').pop().toLowerCase();
    var form_data = new FormData()

    if (jQuery.inArray(img_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {

        Swal.fire('Ops!', lang.invalid_format, 'warning')
        return;
    }

    if (image_size > 2000000) {
        Swal.fire('Ops!', lang.invalid_size, 'warning')
        return;

    } else {

        form_data.append('file', property)

        $.ajax({
            url: url,
            method: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {



            },
            success: function (data) {

                // console.log(data)
                var res = JSON.parse(data)

                if (res.state == 2) {
                    Swal.fire(
                        'Ops!',
                        res.msg,
                        'warning'
                    )
                }
                if (res.state == 3) {
                    Swal.fire(
                        'Ops!',
                        'Ocorreu um erro no resize da imagem',
                        'warning'
                    )
                }
                if (res.img != '') {

                    var profileImg = targetInput.closest('.img-type').find('.display')
                    var txt = profileImg.hasClass('display-cover') ? ' ' + lang.delete_btn : ''
                    var getImg = site + 'assets/upload/' + res.img
                    profileImg.find('.temp').val(res.img)

                    profileImg.css({
                        'background-image': 'url(' + getImg + ')',
                    })
                    var removeBtn = targetInput.closest('.upload-file').html('<span class="del-img"><i class="fas fa-trash"></i>' + txt + '</span>')

                }

            },
            error: function (data) {
                var res = JSON.parse(data)

                if (res.state == 2) {
                    Swal.fire(
                        'Ops!',
                        res.msg,
                        'warning'
                    )
                }
                if (res.state == 3) {
                    Swal.fire(
                        'Ops!',
                        'Ocorreu um erro no resize da imagem',
                        'warning'
                    )
                }
            }

        })

    }

});

$(document).on('click', '.del-img', function (e) {
    var container = $(this).closest('.img-type')
    var el = container.find('.temp')
    var type = (el.hasClass('temp-profile')) ? 'profile' : 'cover';
    var elImg = el.val();

    Swal.fire({
        title: lang.attention_delete,
        text: lang.confirm_delete,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: lang.confirm_delete_btn,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                data: { elImg, type },
                url: site + 'files/remove',
                type: 'POST',
                success: (data) => {
                    var res = JSON.parse(data)
                    container.closest('.img').find('.' + type).html(res.res)
                }
            })
        }
    })
})

$('.options_label, .options_label input').on('change', function (e) {
    $('.save_config').removeAttr("disabled");
})

$('.save_config').on('click', function (e) {
    let el = {
        title: $('.title_font').val(),
        text: $('.text_font').val(),
        title_color: $('.title_color').val(),
        button: $('.button_color').val(),
        icon: $('.icon_color').val()
    }
    $.ajax({
        url: site + 'admin/save_config',
        data: { el },
        type: "POST",
        success: function (data) {
            swal.fire(lang.config.success, lang.config.content, 'success')
            $('.save_config').attr("disabled", true);
        }
    })
})
$(document).on('change', '.user_name, .user_pass', function (e) {
    $('.save_account').attr('disabled', false)
})
$(document).on('click', '.save_account', function (e) {
    var name = $('.user_name').val()
    var pass = $('.user_pass').val().length >= 4 ? $('.user_pass').val() : null
    if (name != '') {
        $.ajax({

            url: site + 'config/update',
            data: { name, pass },
            type: 'POST',
            success: function (data) {
                var res = JSON.parse(data)
                if (res.res) {
                    Swal.fire({
                        title: lang.account.success,
                        text: lang.account.content,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: lang.account.confirm
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = site + '/dashboard'
                        }
                    })
                }
            }
        })
    } else {
        swal.fire('Atenção!', 'Preencha corretamente todos os dados!', 'warning');
    }
})

$('.delete_account_btn').on('click', function (e) {
    Swal.fire({
        title: lang.delete_account,
        text: lang.delete_acc_confirm,
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: lang.account.confirm,
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            // location.href = site + '/dashboard'
            Swal.fire({
                title: lang.type_password,
                input: 'password',
                inputLabel: 'Password',
                inputPlaceholder: lang.type_password,
                inputAttributes: {
                    maxlength: 10,
                    autocapitalize: 'off',
                    autocorrect: 'off'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let pass = result.value
                    $.ajax({
                        url: site + 'config/delete',
                        data: { pass },
                        type: "POST",
                        success: function (data) {
                            let res = JSON.parse(data)
                            if (res.res) {
                                swal.fire(lang.success_delete_title, lang.success_delete, 'success')
                                    .then(function () {
                                        window.location.reload()
                                    })

                            } else {
                                swal.fire(lang.wrong_pass_title, lang.wrong_pass, 'error')
                            }
                        }
                    })
                }
            })
        }
    })
})

$('.menu_btn').on('click', function (e) {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active')
        $('.sidebar').removeClass('active')
    } else {
        $(this).addClass('active')
        $('.sidebar').addClass('active')
    }
})
$('.widget_btn').on('click', function (e) {
    $('.widgets').addClass('widgets_active')
})
$('.close_widgets').on('click', function (e) {
    $('.widgets').removeClass('widgets_active')
})

$('.add_field button').on('click', function (e) {
    $('.widgets').removeClass('widgets_active')
})