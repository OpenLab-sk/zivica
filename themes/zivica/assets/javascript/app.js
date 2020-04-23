$(() => {
    $('#layout-content').fadeIn(250);

    $('.fade-out-on-click').click(function () {
        $('#layout-content').fadeOut(200);
    })

    $('input').keydown(function () {
        $(this).removeClass('invalid');
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
        if (!$(this).hasClass('disabled'))
            submitForm();
    })

    $('#decline-terms').click(function () {
        $('#terms-container').animate({
            top: '100vh'
        }, 200, function () {
            $('#terms-container').hide();
        });
    })

    $('.terms-wrapper').on('scroll', function () {
        checkIfTermsWereScrolled_orAreTotallyVisible()
    });


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
            window.location = `${urlOnSuccess}/${data.uuid}`;
        },
        error: function () {
            $('#accept-terms').text('potvrdiť a odoslať');
            alert('Nastala chyba. Skúste to prosím neskôr');
        }
    });
}

function openTerms() {
    $('#terms-container').show().animate({
        top: '0'
    }, 250, function () {
        checkIfTermsWereScrolled_orAreTotallyVisible()
    });
}

function checkIfTermsWereScrolled_orAreTotallyVisible() {
    if ($('.terms-wrapper .bottom').offset().top <= $('.terms-wrapper').offset().top + $('.terms-wrapper').height() + 50)
        $('#accept-terms').css('opacity', '1').removeClass('disabled');

}
