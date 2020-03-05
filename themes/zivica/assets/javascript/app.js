$(() => {
    $('.loading-screen').fadeOut();

    $('.single-card.event-card').click(function () {
        window.location.href = window.location.href + 'event/' + $(this).attr('data-event-id');
    })
})
