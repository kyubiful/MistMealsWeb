const plates = document.querySelectorAll('.plate_form');
const button = document.querySelectorAll('.plato-btn');
// let modal = document.querySelector('.plates-modal');
// let modalName = document.querySelector('.plates-modal-info-name');
// let modalPrice = document.querySelector('.plates-modal-info-price');
const menuCartNumber = document.querySelector('.menu-cart-btn p');
const numberPlates = document.querySelector('.platos-count-content .platos-count-number');

for(let i = 0; i < plates.length; i++){

    plates[i].addEventListener('submit', (e) => {

        e.preventDefault();

        let form = plates[i];

        let fd = new FormData(form);
        let method = form.getAttribute('method');
        let action = form.getAttribute('action');

        // modal.classList.remove('active');

        // Spinner ON

        button[i].disabled = true;
        button[i].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';


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
                        button.innerHTML = data.message;
                    }
                } else if (data.status == 500) {
                    // Spinner OFF
                    button[i].innerHTML = '';
                    button[i].disabled = true;
                    // modal.classList.add('active');
                    button[i].classList.add('active');
                    // modalName.innerHTML = data.itemQuantity+'x '+data.infoName;
                    // modalPrice.innerHTML = '<b>'+data.itemQuantity*data.infoPrice+'€</b>';
                    menuCartNumber.innerHTML = parseInt(menuCartNumber.innerHTML)+parseInt(data.itemQuantity);
                    numberPlates.innerHTML = parseInt(numberPlates.innerHTML)+parseInt(data.itemQuantity);
                    setTimeout(() => {
                        button[i].classList.remove('active');
                        button[i].disabled = false;
                        button[i].innerHTML = 'Añadir'
                    }, 1500);
                }
            },
            error: function (a, b, c) {
                // Spinner OFF
                button[i].innerHTML = 'Error!';
                button[i].disabled = false;
            }
        });

    });
}


const plates_menu = document.querySelectorAll('.plate_form_menu');
const button_menu = document.querySelectorAll('.plato-menu-btn');
const plates_menu_remove = document.querySelectorAll('.plate_form_menu_remove');
const button_menu_remove = document.querySelectorAll('.plato-menu-btn-remove');



for(let i = 0; i < plates_menu.length; i++){

    plates_menu[i].addEventListener('submit', (e) => {

        e.preventDefault();

        let form = plates_menu[i];

        let fd = new FormData(form);
        let method = form.getAttribute('method');
        let action = form.getAttribute('action');

        // modal.classList.remove('active');

        // Spinner ON

        button_menu[i].disabled = true;
        button_menu[i].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width: 10px; height: 10px;"></span> Cargando...';


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
                        button_menu.innerHTML = data.message;
                    }
                } else if (data.status == 500) {
                    // Spinner OFF
                    button_menu[i].disabled = true;
                    // modal.classList.add('active');
                    button_menu_remove[i].classList.add('active');
                    // modalName.innerHTML = data.itemQuantity+'x '+data.infoName;
                    // modalPrice.innerHTML = '<b>'+data.itemQuantity*data.infoPrice+'€</b>';
                    menuCartNumber.innerHTML = parseInt(menuCartNumber.innerHTML)+parseInt(data.itemQuantity);
                    numberPlates.innerHTML = parseInt(numberPlates.innerHTML)+parseInt(data.itemQuantity);
                    setTimeout(() => {
                        button_menu[i].disabled = false;
                        button_menu[i].innerHTML = '<span>+</span> Añadir';
                    }, 500);
                }
            },
            error: function (a, b, c) {
                // Spinner OFF
                button_menu[i].innerHTML = 'Error!';
                button_menu[i].disabled = false;
            }
        });

    });
}

for(let i = 0; i < plates_menu_remove.length; i++){

    plates_menu_remove[i].addEventListener('submit', (e) => {

        e.preventDefault();

        let form = plates_menu_remove[i];

        let fd = new FormData(form);
        let method = form.getAttribute('method');
        let action = form.getAttribute('action');

        // modal.classList.remove('active');

        // Spinner ON

        button_menu_remove[i].disabled = true;
        button_menu_remove[i].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width: 10px; height: 10px;"></span> Cargando...';


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
                        button_menu.innerHTML = data.message;
                    }
                } else if (data.status == 500) {
                    // Spinner OFF
                    button_menu_remove[i].disabled = true;
                    // modal.classList.add('active');
                    button_menu_remove[i].classList.remove('active');
                    // modalName.innerHTML = data.itemQuantity+'x '+data.infoName;
                    // modalPrice.innerHTML = '<b>'+data.itemQuantity*data.infoPrice+'€</b>';
                    menuCartNumber.innerHTML = parseInt(menuCartNumber.innerHTML)-parseInt(data.itemQuantity);
                    numberPlates.innerHTML = parseInt(numberPlates.innerHTML)-parseInt(data.itemQuantity);
                    setTimeout(() => {
                        button_menu_remove[i].disabled = false;
                        button_menu_remove[i].innerHTML = '<span>-</span> Quitar';
                    }, 500);
                }
            },
            error: function (a, b, c) {
                // Spinner OFF
                button_menu_remove[i].innerHTML = 'Error!';
                button_menu_remove[i].disabled = false;
            }
        });

    });
}

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
