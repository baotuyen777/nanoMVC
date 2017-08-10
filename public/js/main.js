console.log(222)
jQuery('.form_ajax').submit(function (e) {
    e.preventDefault();
    data = jQuery(this).serializeArray();
    var form = jQuery(this);
    jQuery.ajax({
        type: "POST",
        url: jQuery(this).attr('action'),
        data: {data},
        success: function (result) {
            console.log(result);
            toastr.info('Are you the 6 fingered man?');
//            
//            if (result.status) {
//                setTimeout(window.location.href = form.data('url_list'), 3000);
//            }
        }

    });
});
