const deliveryDay = document.querySelector('.thanks-delivery-day')
const form = document.querySelector('.thanks-delivery-hidden-form')
console.log(deliveryDay)

let fd = new FormData(form)
let action = form.getAttribute('action')
let method = form.getAttribute('method')

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
                window.location.href = data.link
            } else {
                console.log( data.message)
            }
        } else if (data.status == 500) {
            // Spinner OFF
            console.log(data)
            deliveryDay.innerHTML = data.message+'.'
        }
    },
    error: function (a, b, c) {
        // Spinner OFF
        console.log('error')
    }
});

var callback = function () {
  if (typeof(url) != 'undefined') {
    window.location = url;
  }
};
gtag('event', 'conversion', {
    'send_to': 'AW-10805779259/-VV7CIHKiYQDELu2zKAo', 'value': amount,
    'currency': 'EUR',
    'transaction_id': '',
    'event_callback': callback
});

fbq('track', 'Purchase', {
  'value': amount,
  'currency': 'EUR'
})
