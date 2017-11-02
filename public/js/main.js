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
        if (result.status) {
            var total = 0;
            var cart = result.cart;
            var cartHtml = '<ul class="woocommerce-mini-cart cart_list product_list_widget ">';
            for (let k in cart.data) {
                cartHtml += '<li class="woocommerce-mini-cart-item mini_cart_item">'
                        + '<a href="#" class="remove" onclick="removeCart(' + cart.data[k].id + ')" >×</a>'
                        + '<a href="' + cart.data[k].linkProduct + '">'
                        + '<img width="180" height="180" src="' + cart.data[k].linkImage + '" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" >' + cart.data[k].name + '&nbsp;</a>'
                        + '<span class="quantity">' + cart.data[k].quantity + ' × '
                        + '<span class="woocommerce-Price-amount amount">' + cart.data[k].priceSale
                        + '<span class="woocommerce-Price-currencySymbol">₫</span></span>'
                        + '</span>'
                        + '</li>';
            }
            cartHtml += '</ul>';
            cartHtml += '<p class="woocommerce-mini-cart__total total">'
                    + '<strong>Tạm tính:</strong>'
                    + '<span class="woocommerce-Price-amount amount cart_total">' + cart.total + '<span class="woocommerce-Price-currencySymbol">₫</span></span></p>';
            jQuery('.btn_cart').removeClass('hidden');
            jQuery('.cart_list').html(cartHtml);
        }
    }
    );
});
function removeCart(product_id) {
    jQuery.ajax({
        type: "POST",
        url: link_remove_cart + product_id,
        success: function () {
            location.reload();
        }
    });
}

function callAjaxForm(form, success) {
    var data = form.serializeArray();
    console.log(data)
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

//product
var quantity = parseInt(jQuery('.qty').val());
jQuery('.plus').click(function () {
    quantity++;
    jQuery('.qty').val(quantity);
});
jQuery('.minus').click(function () {
    quantity--;
    jQuery('.qty').val(quantity);
});