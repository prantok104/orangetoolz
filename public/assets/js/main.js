(function ($) {
    "use strict";
    jQuery(document).ready(function () {
        $('.select2').select2();  // select2 js
        $('#menu').slicknav({
            prependTo: '#menu2'
        }); // drawer js
    });
}(jQuery))
