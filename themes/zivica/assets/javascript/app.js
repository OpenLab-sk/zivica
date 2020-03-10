$(() => {
    $('.loading-screen').fadeOut();
    var addDriverVisible = false;

    $('.single-card.event-card').click(function () {
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

    $('.form-saved').click(function () {
        hideForm('.event-wrapper');
    });

    $('#submit-form').click(function () {
        $('form').submit();
    })

    $('form').submit(function (e) {
        e.preventDefault();

        url = $(this).attr('data-url');
        formData = $(this).serialize();

        console.log(url);

        $.ajax({
            url: url,
            type: 'post',
            data: formData,
            success: function (data) {
                $('form').hide();
                $('.form-saved').fadeIn();
            }
        });
    })
})

function showForm(defaultElement) {
    $('.form-wrapper').show().animate({
        left: '0'
    }, 150, function () {
        $(defaultElement).hide();
    });

    $('.back.arrow-back-white').hide();
    $('.back.arrow-back-black').fadeIn();
}

function hideForm(defaultElement) {
    $(defaultElement).show();
    $('.form-wrapper').animate({
        left: '100vw'
    }, 150, function () {
        $(this).hide();
        $('.back.arrow-back-black').hide();
        $('.back.arrow-back-white').fadeIn();
        $('form').show();
        $('.form-saved').hide();
    });
}
