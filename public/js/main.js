jQuery('.form_ajax').submit(function (e) {
    e.preventDefault();
    var form = jQuery(this);
    callAjaxForm(form, function (result) {
        toastr.success('Thanh cong!');
        form.find('button').removeClass('loading');
    });

});
jQuery('.formAddToCart').submit(function (e) {
    e.preventDefault();
    var form = jQuery(this);
    callAjaxForm(form, function (result) {
        toastr.success('Thanh cong!');
        form.find('button').removeClass('loading');
        console.log(result)
        
    });

});
function callAjaxForm(form, success) {
    var data = form.serializeArray();
    jQuery.ajax({
        type: "POST",
        url: form.attr('action'),
        data: {data},
        beforeSend: function () {
            form.find('button').addClass('loading');
        },
        success
    });
}
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
