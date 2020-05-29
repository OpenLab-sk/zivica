$(() => {
    $('#layout-content').fadeIn(250);
    setCardMinHeight();

    $('.fade-out-on-click').click(function (e) {
        $('#layout-content').fadeOut(200);
    })

    $('input').keydown(function () {
        $(this).removeClass('invalid');
    })

    $('.line-wrapper').mouseover(function (e) {
        if ($(this).attr('data-tooltip')) {
            const tooltip = $(this).attr('data-tooltip');

            $(this).prepend(`
                <div class="icon-tooltip" >
                    <p>${tooltip}</p>
                </div>
            `);
        }
    })

    $('.line-wrapper').mouseleave(function () {
        $('.icon-tooltip').remove();
    })

    $('.icon-tooltip').mouseenter(function () {
        $(this).remove();
    })

    $('#show-terms').click(function () {
        $('form input').each(function () {
            if ($(this).attr('data-validation') == 'required' && $(this).val() == '') {
                $(this).addClass('invalid');
            }
        })

        if ($('.invalid').length) {
            return;

        } else {
            openTerms();
        }
    });

    $('#accept-terms').click(function () {

        $('form input').each(function () {
            if ($(this).attr('data-validation') == 'required' && $(this).val() == '') {
                $(this).addClass('invalid');
            }
        })

        if ($('.invalid').length) {
            return;

        } else {
            if (!$(this).hasClass('disabled'))
                submitForm();
        }
    })

    $('#decline-terms').click(function () {
        $('.form-container').fadeIn();
        $('#terms-container').animate({
            top: '100vh'
        }, 200, function () {
            $('#terms-container').hide();
        });
    })

    $('.terms-wrapper').on('scroll', function () {
        checkIfTermsWereScrolled_orAreTotallyVisible()
    });

    $(window).resize(function () {
        setCardMinHeight();
    })
})

function submitForm() {
    $('#accept-terms').text('odosielam...');

    var url = $('form').attr('data-url'),
        method = $('form').attr('method'),
        formData = $('form').serialize();

    $.ajax({
        url: url,
        type: method,
        data: formData,
        success: function (data) {
            var urlOnSuccess = $('form').attr('data-url-on-success');

            if (data.uuid) {
                window.location = `${urlOnSuccess}/${data.uuid}`;
            } else {
                window.location = urlOnSuccess;
            }
        },
        error: function () {
            $('#accept-terms').text('potvrdiť a odoslať');
            alert('Nastala chyba. Skúste to prosím neskôr');
        }
    });
}

function openTerms() {
    $('.form-container').fadeOut();
    $('#terms-container').show().animate({
        top: '0'
    }, 250, function () {
        window.scrollTo(0, 0);
        checkIfTermsWereScrolled_orAreTotallyVisible()
    });
}

function checkIfTermsWereScrolled_orAreTotallyVisible() {
    if ($('.terms-wrapper .bottom').offset().top <= $('.terms-wrapper').offset().top + $('.terms-wrapper').height() + 50)
        $('#accept-terms').css('opacity', '1').removeClass('disabled');

}

function setCardMinHeight() {
    var minHeight = 0;
    $('.zivica-card').each(function () {

        if ($(this).outerHeight() > minHeight)
            minHeight = $(this).outerHeight();

    });

    $('.zivica-card').each(function () {
        $(this).css('min-height', minHeight);
    });
}
