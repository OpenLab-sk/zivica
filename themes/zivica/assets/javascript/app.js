$(() => {
    $('.loading-screen').fadeOut();
    var addDriverVisible = false;

    $('.card--with-square').click(function () {
        window.location.href = window.location.href + 'event/' + $(this).attr('data-event-id');
    })

    $('#new-driver').click(function (e) {
        e.preventDefault();
        showForm('.event-wrapper');
        addDriverVisible = true;
    })

    $('.back').click(function (e) {
        if (addDriverVisible == true) {
            e.preventDefault();
            hideForm('.event-wrapper');
            addDriverVisible = false;
        } else {
            window.location.href = 'http://localhost:8000/zivica';
        }
    });

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

    $('.form-saved').click(function () {
        hideForm('.event-wrapper');
    });

    $('#submit-form').click(function () {
        $('form').submit();
    })

    $('form').submit(function (e) {
        e.preventDefault();

        var url = $(this).attr('data-url'),
            method = $(this).attr('method'),
            formData = $(this).serialize();

        $.ajax({
            url: url,
            type: method,
            data: formData,
            success: function (data) {
                // $('form').hide();
                // $('.form-saved').fadeIn();
                // $('.form-saved h2').text('Uložené');

                // setTimeout(function () {
                //     hideForm('.event-wrapper');
                // }, 1500)
            },
            error: function () {
                // $('form').hide();
                // $('.form-saved').fadeIn();
                // $('.form-saved h2').text('Chyba');
            }
        });
    })
})

function showForm(defaultElement) {
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
}
