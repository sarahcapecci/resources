var btn = jQuery.fn.button.noConflict() // reverts $.fn.button to jqueryui btn
jQuery.fn.btn = btn // assigns bootstrap button functionality to $.fn.btn