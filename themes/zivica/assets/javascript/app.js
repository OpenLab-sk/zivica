$(() => {
    $('.loading-screen').fadeOut();

    $('.single-card.event-card').click(function () {
        window.location.href = window.location.href + 'event/' + $(this).attr('data-event-id');
    })

    $(window).scroll(function () {
        $('.text-wrapper').css('opacity', 1 - (window.pageYOffset / 100));

        if ($('.header-container').height() - window.pageYOffset <= 100) {

        } else {

        }
    })
})
