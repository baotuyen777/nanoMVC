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
            toastr.success('Thanh cong!');
//            
//            if (result.status) {
//                setTimeout(window.location.href = form.data('url_list'), 3000);
//            }
        }

    });
});
// menu
jQuery(document).ready(function () {
    //console.log('test')
    jQuery("#mega-menu-title").click(function () {
        jQuery("#mega_menu").toggleClass("active")
    })
    jQuery("body").click(function (evt) {
        var click_target = jQuery(evt.target)
        if (click_target.attr("id") != "mega-menu-title") {
            jQuery("#mega_menu.active").removeClass("active")
        }
    })
    jQuery("#mega_menu ul.sub-menu").each(function (i) {
        jQuery(this).css("margin-top", -i * 39 + "px")
        jQuery(this).siblings(".menu-image").css("margin-top", -i * 39 + "px")
        jQuery(this).children("li").each(function (index) {
            jQuery(this).children(".menu-image").css("margin-top", -index * 38 + "px")
        })
    })
})
