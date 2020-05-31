const colors = ['#92CD00', '#CD9A00', '#00CD33', '#00AFCD', '#0079CD'];
$(() => {
    $('.statistics-wrapper-circle').click(function () {
        $(this).css({
            borderColor: colors[Math.floor(Math.random() * colors.length)]
        });

        //end function
    })
})
