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
        submitForm();
    })

    $('#decline-terms').click(function () {
        $('#terms-container').animate({
            top: '100vh'
        }, 200, function () {
            $('#terms-container').hide();
        });
    })
})

function submitForm() {
    var url = $('form').attr('data-url'),
        method = $('form').attr('method'),
        formData = $('form').serialize();

    $.ajax({
        url: url,
        type: method,
        data: formData,
        success: function (data) {
            window.location = $('form').attr('data-url-on-success');
        },
        error: function () {
            alert('Nastala chyba. Skúste to prosím neskôr');
        }
    });
}

function openTerms() {
    $('#terms-container').show().animate({
        top: '0'
    }, 250);
}
