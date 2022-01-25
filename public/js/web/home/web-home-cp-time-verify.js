const verifyCPTimeButton = document.querySelector('.web-home-cp-time-verify-form-submit');
const verifyCPTimeMessage = document.querySelector('.web-home-cp-time-verify-message');
const verifyCPTimeForm = document.querySelector('.web-home-cp-time-verify-form');

verifyCPTimeForm.addEventListener('submit', (e) => {

    e.preventDefault();

    let form = verifyCPTimeForm;

    let fd = new FormData(form);
    let method = form.getAttribute('method');
    let action = form.getAttribute('action');

    // modal.classList.remove('active');

    // Spinner ON
    let buttonContent = verifyCPTimeButton.innerHTML;
    verifyCPTimeButton.disabled = true;
    verifyCPTimeButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';

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
                verifyCPTimeButton.innerHTML = '';
                verifyCPTimeButton.disabled = true;
                verifyCPTimeButton.classList.add('active');
                verifyCPTimeMessage.innerHTML = data.message;
                setTimeout(() => {
                    verifyCPTimeButton.classList.remove('active');
                    verifyCPTimeButton.disabled = false;
                    verifyCPTimeButton.innerHTML = buttonContent;
                }, 1500);
            }
        },
        error: function (a, b, c) {
            // Spinner OFF
            verifyCPTimeButton.innerHTML = 'Error!';
            verifyCPTimeButton.disabled = false;
        }
    });

});
