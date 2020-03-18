$(() => {
    $('.loading-screen').fadeOut();

    // Forms -----------------------------------
    $('input').keydown(function () {
        $(this).removeClass('invalid');
    })

    $('#new-driver').click(function (e) {
        e.preventDefault();
        showForm('.main-content-wrapper');
    })

    $('#back--form-hide').click(function (e) {
        e.preventDefault();
        hideForm('.main-content-wrapper');
    })

    $('.card--with-footer .footer').click(function () {
        $('.main-content-wrapper').fadeOut(100);
    });

    $('input#time').keydown(function (e) {
        console.log(e.keyCode);

        allowedKeys = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 16, 186, 32, 8];
        value = $(this).val();

        if (!allowedKeys.includes(e.keyCode)) {
            e.preventDefault();
        };

        if (e.keyCode == 8) {
            return;
        }

        if (value.length > 4 && e.keyCode !== 8) {
            e.preventDefault();
            return;
        }

        if (e.keyCode == 32 || e.keyCode == 186) {
            e.preventDefault();
            console.log(value + value.length)
            if (value.length == 1) {
                $(this).val('0' + value + ':');

            } else if (value.length == 2) {
                $(this).val(value + ':');
            }

            return;
        }

        if (value.length == 2) {
            $(this).val(value + ':');
        }
    })

    $('.mark-as-solved').click(function () {
        url = $(this).attr('data-url');

        $.ajax({
            url: url,
            type: 'post',
            data: null,
            success: function (data) {},
            error: function () {}
        });
    });

    $('#submit-form').click(function () {
        $('form input').each(function () {
            if ($(this).attr('type') == 'checkbox') {


                // FIX Checkbox



            } else if ($(this).attr('data-validation') == 'required' && $(this).val() == '') {
                $(this).addClass('invalid');
            }
        })

        if ($('.invalid').length) {
            return;
        }

        var url = $('form').attr('data-url'),
            method = $('form').attr('method'),
            formData = $('form').serialize();

        console.log(url);
        console.log(method);
        console.log(formData);

        $.ajax({
            url: url,
            type: method,
            data: formData,
            success: function (data) {
                formOnSuccess();
            },
            error: function () {
                formOnError();
            }
        });
    })
})

function formOnSuccess() {
    $('.form--hide-on-success').fadeOut(150, function () {
        $('.form--show-on-submit').fadeIn(100)
        setTimeout(function () {
            $('.form--show-on-submit').fadeOut(300, function () {
                $('.back').click();
            })
        }, 1000);
    });
}

function formOnError() {
    $('.form--hide-on-success').fadeOut(150, function () {
        $('.form--show-on-submit h2').text('Chyba')
        $('.form--show-on-submit').fadeIn(100)
        setTimeout(function () {
            $('.form--show-on-submit').fadeOut(300, function () {
                $('.back').click();
            })
        }, 2000);
    });
}


function showForm(defaultElement) {
    $('.form--hide-on-success').show();
    $('.slided-form-wrapper').show().animate({
            left: '0'
        }, 150,
        function () {
            $(defaultElement).hide();
        });

    $('.back.arrow-back-white').hide();
    $('.back.arrow-back-black').fadeIn(100);
}

function hideForm(defaultElement) {
    $(defaultElement).show();
    $('.slided-form-wrapper').animate({
        left: '100vw'
    }, 150, function () {
        $(this).hide();
        $('.back.arrow-back-black').hide();
        $('.back.arrow-back-white').fadeIn(100);
        $('form').show();
        $('.form-saved').hide();
    });

    $('input').val('');
    location.reload();
}
