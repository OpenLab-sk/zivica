$(() => {
    $('.loading-screen').fadeOut();


    var initialHeaderContainerHeight = $('.header-container').height(),
        scrolled = false,
        addDriverVisible = false;

    $('.single-card.event-card').click(function () {
        window.location.href = window.location.href + 'event/' + $(this).attr('data-event-id');
    })

    $('.navbar #back').click(function () {
        window.location.href = 'http://localhost:8000/zivica';
    })

    $('#newDriverButton').click(function (e) {
        e.preventDefault();
        $('.sign-in-as-driver-wrapper').fadeIn();
        $('.sign-in-as-driver').animate({
            bottom: '-10px'
        });
        addDriverVisible = true;
    })

    $('div.sign-in-as-driver-wrapper').click(function (e) {
        if (e.target == e.currentTarget) {
            $('.sign-in-as-driver-wrapper').fadeOut();
            $('.sign-in-as-driver').animate({
                bottom: '-150vh'
            });

            addDriverVisible = false;
        }
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
