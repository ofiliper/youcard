$('.menu-icon').on('click', function (e) {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active')
        $('.menu').slideUp()
    } else {
        $(this).addClass('active')
        $('.menu').slideDown()
    }
})
$('.faq-box').on('click', function (e) {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active').find('p').hide()

    } else {

        $('.faq-box').each(function (i, v) {
            $(v).removeClass('active').find('p').hide()
        })

        $(this).addClass('active').find('p').show()

    }
})

