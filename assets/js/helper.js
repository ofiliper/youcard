$('#basic').flagStrap({
    countries: {
        "BR": "Português",
        "US": "English",
        "ES": "Español",
    },
    labelMargin: "10px",
    scrollable: false,
    scrollableHeight: "350px",
    placeholder: false,
});

$('.select-lang select').on('change', function (e) {
    $.ajax({
        url: site + 'language/change',
        data: { lang: $(this).val() },
        type: 'POST',
        success: function (data) {
            window.location.reload()
        }
    })
})

if ($('.unique_url').length > 0) {
    $('.unique_url').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', { reverse: true });
}
if ($('.phone').length > 0) {
    $('.phone').mask('+000000000000000000000000000000000', { reverse: false });
}

let max = 320
let currentText
$(document).on('keyup', '.box_label textarea', function (e) {
    var count = $(this).closest('.box_label').find('.count')

    if ($(this).val().length >= max + 1) {
        e.preventDefault()
        $(this).val(currentText)
        count.addClass('count-alert')
    } else {
        currentText = $(this).val()
        count.removeClass('count-alert')
    }
    count.html($(this).val().length)
})


let max_len = 50
let inputText
$(document).on('keyup', '.box_label .input_len', function (e) {

    var count = $(this).closest('.box_label').find('.count')

    if ($(this).val().length >= max_len + 1) {
        e.preventDefault()
        $(this).val(inputText)
        count.addClass('count-alert')
    } else {
        inputText = $(this).val()
        count.removeClass('count-alert')
    }
    count.html($(this).val().length)
})