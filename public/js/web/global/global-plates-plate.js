function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-10805779259/s4FDCObp3IMDELu2zKAo',
      'event_callback': callback
  });
  return false;
}
