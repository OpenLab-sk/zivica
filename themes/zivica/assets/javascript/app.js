$(() => {
    // Forms -----------------------------------


    $('#new-driver').click(function (e) {
        e.preventDefault();
        showForm('.main-content-wrapper');
    })

    $('#back--form-hide').click(function (e) {
        e.preventDefault();
        hideForm('.main-content-wrapper');
    })

    // $('.card--with-footer .footer').click(function () {
    //     $('.main-content-wrapper').fadeOut(100);
    // });


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
                if ($(this).context.checked == false) {
                    $(this).addClass('invalid');
                    $(this).next().css('color', 'red');
                } else {
                    $(this).removeClass('invalid');
                    $(this).next().css('color', '');
                }

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
        // setTimeout(function () {
        //     $('.form--show-on-submit').fadeOut(300, function () {
        //         $('.back').click();
        //     })
        // }, 1000);
    });
}

function formOnError() {
    $('.form--hide-on-success').fadeOut(150, function () {
        $('.form--show-on-submit h2').text('Chyba')
        $('.form--show-on-submit').fadeIn(100)
        // setTimeout(function () {
        //     $('.form--show-on-submit').fadeOut(300, function () {
        //         $('.back').click();
        //     })
        // }, 2000);
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
    }, 100, function () {
        $(this).hide();
        $('.back.arrow-back-black').hide();
        $('.back.arrow-back-white').fadeIn(80);
        $('form').show();
        $('.form-saved').hide();
    });

    $('input').val('');
    location.reload();
}
