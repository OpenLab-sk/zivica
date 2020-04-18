$(() => {
    $('input#time').keydown(function (e) {
        allowedKeys = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 16, 186, 32, 8];
        arrowsKeys = [37, 38, 39, 40];

        value = $(this).val();

        // Do not block arrows
        if (arrowsKeys.includes(e.keyCode))
            return;

        // Check if user entered valid time
        if (value.substr(0, 2) > 23 || value.charAt(3) >= 6)
            $(this).addClass('invalid');

        // If user pressed invalid key
        if (!allowedKeys.includes(e.keyCode))
            e.preventDefault();

        // If user pressed BACKSPACE
        if (e.keyCode == 8)
            return;

        // If user pressed key, but time is allready 4 characters long, then let user use only backspace
        if (value.length > 4 && e.keyCode !== 8) {
            e.preventDefault();
            return;
        }

        // If user pressed space or semicolon
        if (e.keyCode == 32 || e.keyCode == 186) {
            e.preventDefault();

            if (value.length == 1) {
                $(this).val('0' + value + ':');

            } else if (value.length == 2) {
                $(this).val(value + ':');
            }

            return;
        }

        // Insert semicolon if first part of time is full
        if (value.length == 2)
            $(this).val(value + ':');
    })

    $('input#seats').keypress(function (e) {
        if ($(this).val().charAt(0) >= 2 || $(this).val().length > 1) {
            $(this).addClass('invalid');
        }
    })
})
