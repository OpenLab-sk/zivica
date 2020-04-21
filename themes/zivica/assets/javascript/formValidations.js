$(() => {
    $('input').keydown(function (e) {
        $(this).removeClass('invalid');
    });


    // ===========================================================================
    // =============================     Checkbox     ============================
    // ===========================================================================

    $('input#gdpr').click(function () {
        if ($(this).context.checked == false) {
            $(this).addClass('invalid');
            $(this).next().css('color', 'red');
        } else {
            $(this).removeClass('invalid');
            $(this).next().css('color', '');
        }
    })

    // ===========================================================================
    // ============================     Seats form     ===========================
    // ===========================================================================

    $('input#seats').keyup(function (e) {
        if ($(this).val() > 10) {
            $(this).addClass('invalid');
        }
    })

    // ===========================================================================
    // ============================     Email form     ===========================
    // ===========================================================================

    $('input#email').focusout(function () {
        value = $(this).val();

        if (!value.includes('@')) {
            $(this).addClass('invalid');
        } else {
            value = value.split('@');

            if (!value[1].includes('.')) {
                $(this).addClass('invalid');
            }
        }
    })

    // ===========================================================================
    // ============================     Date form     ============================
    // ===========================================================================

    $('input#time').keyup(function (e) {
        value = $(this).val();

        if (value[3] > 5 || value.substring(0, 2) > 23)
            $(this).addClass('invalid');
    });

    $('input#time').keypress(function (e) {
        value = $(this).val();
    });

    $('input#time').keyup(function (e) {
        if (value.length == 2 && e.keyCode !== 8 && !value.includes(':')) {
            $(this).val(value + ':');
        }
    });

    $('input#time').keydown(function (e) {
        allowedKeys = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 16, 186, 32, 8];
        arrowsKeys = [37, 38, 39, 40];
        value = $(this).val();

        if (arrowsKeys.includes(e.keyCode))
            return;

        if (e.keyCode == 8)
            return;

        if (value.length > 4)
            e.preventDefault();

        if (!allowedKeys.includes(e.keyCode))
            e.preventDefault();

        if (e.keyCode == 186 && !value.length == 1) {
            e.preventDefault();
        } else if (e.keyCode == 186 && value.length == 1) {
            $(this).val(0 + value);
        }

        if (e.keyCode == 186) {
            e.preventDefault();
            return;
        }


        if (e.keyCode == 32) {
            e.preventDefault();

            if (!value.includes(':') && value.length < 2)
                $(this).val('0' + value + ':');

            if (!value.includes(':') && value.length == 2)
                $(this).val(value + ':');
        }

        if (value.includes(':')) {
            value = value.split(':');

            if (value[1].length > 1) {
                e.preventDefault();
            }
        }

    });

    $('input#time').focusout(function () {
        value = $(this).val();

        if (value.includes(':')) {
            splittedValue = value.split(':');

            if (splittedValue[1].length < 2) {
                $(this).val(value + '0');
            }
        }

        if (value.length < 4) {
            $(this).addClass('invalid');
        }
    })
})
