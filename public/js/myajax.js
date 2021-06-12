$('#contactForm, #user-login').submit(function (e) {

    e.preventDefault();

    let fd = new FormData($(this)[0]);
    let method = $(this).attr('method');
    let action = $(this).attr('action');
    let $button = $(this).find('button[type=submit]');
    let beforeButtonText = $button.text();

    // Signup validation
    if ($("#password").length && $("#confirm-password").length) {

        let password = $("#password").val();
        let confirmPassword = $("#confirm-password").val();

        if (password != confirmPassword) {

            $button.html('Contraseñas diferentes!');
            return false;

        }

    }

    // Spinner ON
    $button.prop("disabled", true);
    $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

    $.ajax({
        data: fd,
        method: method,
        url: action,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.status == 200) {
                if (data.link != undefined) {
                    window.location.href = data.link;
                } else {
                    $button.html(data.message);
                }
            } else if (data.status == 500) {
                // Spinner OFF
                $button.html(data.message);
                $button.prop("disabled", false);
            }
        },
        error: function (a, b, c) {
            // Spinner OFF
            $button.html('Error!');
            $button.prop("disabled", false);
        }
    });

});

$('#sugerencia_form').submit(function (e) {

    e.preventDefault();

    let $that = $(this);

    grecaptcha.ready(function () {
        grecaptcha.execute('6LeNaqwaAAAAAMX7jdqCJ95neE44LikadkhwQZ8L', {action: 'submit'}).then(function (token) {

            console.log(token);

            let fd = new FormData($that[0]);
            let method = $that.attr('method');
            let action = $that.attr('action');
            let $button = $that.find('button[type=submit]');
            let beforeButtonText = $button.text();

            // Spinner ON
            $button.prop("disabled", true);
            $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

            fd.append('token', token);

            $.ajax({
                data: fd,
                method: method,
                url: action,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status == 200) {
                        if (data.link != undefined) {
                            window.location.href = data.link;
                        } else {
                            $button.html(data.message);
                        }
                    } else if (data.status == 500) {
                        // Spinner OFF
                        $button.html(data.message);
                        $button.prop("disabled", false);
                    }
                },
                error: function (a, b, c) {
                    // Spinner OFF
                    $button.html('Error!');
                    $button.prop("disabled", false);
                }
            });

        });
    });

});

$('#sendMenuMail').submit(function (e) {

    e.preventDefault();

    let fd = new FormData($(this)[0]);
    let method = $(this).attr('method');
    let action = $(this).attr('action');
    let $button = $(this).find('button[type=submit]');
    let beforeButtonText = $button.text();

    // Spinner ON
    $button.prop("disabled", true);
    $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

    $.ajax({
        data: fd,
        method: method,
        url: action,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.status == 200) {
                $button.html(data.message);
            } else if (data.status == 500) {
                // Spinner OFF
                $button.html(data.message);
                $button.prop("disabled", false);
            }
        },
        error: function (a, b, c) {
            // Spinner OFF
            $button.html('Error!');
            $button.prop("disabled", false);
        }
    });

});
