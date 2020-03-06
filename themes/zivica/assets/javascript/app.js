$(() => {
    $('.loading-screen').fadeOut();


    var initialHeaderContainerHeight = $('.header-container').height(),
        scrolled = false;

    $('.single-card.event-card').click(function () {
        window.location.href = window.location.href + 'event/' + $(this).attr('data-event-id');
    })

    $('.navbar #back').click(function () {
        window.location.href = 'http://localhost:8000/zivica';
    })

    $(window).scroll(function () {
        $('.text-wrapper').css('opacity', 1 - (window.pageYOffset / 100));

        if ($('.header-container').height() - window.pageYOffset <= 100) {
            if (scrolled == false) {
                $('.header-container').append(`
                    <div class="scrolled-header-container header-container"></div>
                `)

                $('.scrolled-header-container').css({
                    height: initialHeaderContainerHeight,
                    width: '100vw',
                    position: 'fixed',
                    left: '0',
                    top: -(initialHeaderContainerHeight - 100)

                });
            }

            scrolled = true;
        } else {
            if (scrolled == true) {
                $('.scrolled-header-container.header-container').remove()
                scrolled = false;
            }
        }
    })
})
