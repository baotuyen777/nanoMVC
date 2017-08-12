<main id="main" class="">



    <div class="checkout-page-title page-title">
        <div class="page-title-inner flex-row medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                    <a href="http://linhshop.com.vn/cart/" class="hide-for-small">Shopping Cart</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right" ></i></span>
                    <a href="http://linhshop.com.vn/checkout/" class="current">Checkout details</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right" ></i></span>
                    <a href="#" class="no-click hide-for-small">Order Complete</a>
                </nav>
            </div>
            <!-- .flex-left -->
        </div>
        <!-- flex-row -->
    </div>
    <!-- .page-title -->
    <div class="cart-container container page-wrapper page-checkout">
        <div class="woocommerce">

            <div class="woocommerce-info message-wrapper">
                <div class="message-container container medium-text-center">
                    Khách hàng cũ? <a href="#" class="showlogin">Click vào đây để đăng nhập</a> </div>
            </div>

            <!--            <div class="woocommerce-info message-wrapper">
                            <div class="message-container container medium-text-center">
                                <span class="widget-title"><i class="icon-tag"></i></span>Bạn có mã ưu đãi <a href="#" class="showcoupon">Nhấp vào đây để nhập mã</a>     </div>
                        </div>-->

            <!--            <form class="checkout_coupon has-border is-dashed" method="post" style="display:none">
                            <div class="coupon">
                                <div class="flex-row medium-flex-wrap">
                                    <div class="flex-col flex-grow">
                                        <input type="text" name="coupon_code" class="input-text" placeholder="Mã ưu đãi" id="coupon_code" value="" />
                                    </div>
                                    <div class="flex-col">
                                        <input type="submit" class="button expand" name="apply_coupon" value="Áp dụng mã ưu đãi" />
                                    </div>
                                </div> row 
                            </div> coupon 
                        </form>-->
            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="http://linhshop.com.vn/checkout/" enctype="multipart/form-data">
                <div class="row pt-0 ">
                    <div class="large-7 col  ">
                        <div id="customer_details">
                            <div class="clear">
                                <div class="woocommerce-billing-fields">
                                    <h3>Chi tiết đơn hàng</h3>
                                    <div class="woocommerce-billing-fields__field-wrapper">

                                        <p class="form-row form-row-wide validate-required" id="billing_last_name_field" data-priority="20">
                                            <label for="billing_last_name" class="">Họ tên <abbr class="required" title="bắc buộc">*</abbr>
                                            </label>
                                            <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name" />
                                        </p>
<!--                                        <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                                            <label for="billing_company" class="">Tên công ty</label>
                                            <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="" autocomplete="organization" />
                                        </p>-->

                                        <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                            <label for="billing_address_1" class="">Địa chỉ <abbr class="required" title="bắc buộc">*</abbr>
                                            </label>
                                            <input type="text" class="input-text " name="andress" id="billing_address_1" placeholder="Địa chỉ nhận hàng" value="" autocomplete="address-line1" />
                                        </p>

<!--                                        <p class="form-row form-row-first address-field validate-required" id="billing_city_field" data-priority="70">
    <label for="billing_city" class="">Quận/Huyện <abbr class="required" title="bắc buộc">*</abbr>
    </label>
    <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="" autocomplete="address-level2" />
</p>-->
                                        <p class="form-row form-row-wide address-field validate-state" id="billing_state_field" >
                                            <label for="billing_state" class="">Tỉnh/Thành phố</label>
                                            <select>
                                                <option>Hà Nội</option>
                                            </select>
                                        </p>


                                        <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                            <label for="billing_phone" class="">Số điện thoại <abbr class="required" title="bắc buộc">*</abbr>
                                            </label>
                                            <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel" />
                                        </p>
                                        <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                                            <label for="billing_email" class="">Địa chỉ email <abbr class="required" title="bắc buộc">*</abbr>
                                            </label>
                                            <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="" autocomplete="email username" />
                                        </p>
                                    </div>

                                </div>

                                <div class="woocommerce-account-fields">

                                    <p class="form-row form-row-wide create-account">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" type="checkbox" name="createaccount" value="1" /> <span>Tạo tài khoản?</span>
                                        </label>
                                    </p>

                                </div>
                            </div>
                            <div class="clear">
                                <div class="woocommerce-shipping-fields">
                                </div>
                                <div class="woocommerce-additional-fields">



                                    <h3>Thông tin thêm</h3>


                                    <div class="woocommerce-additional-fields__field-wrapper">
                                        <p class="form-row notes" id="order_comments_field" data-priority="">
                                            <label for="order_comments" class="">Ghi chú về đơn hàng</label>
                                            <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Ghi chú về đơn hàng, ví dụ: gọi điện trước khi giao hàng" rows="2" cols="5"></textarea>
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- large-7 -->

                    <div class="large-5 col">
                        <div class="col-inner has-border">
                            <div class="checkout-sidebar sm-touch-scroll">
                                <h3 id="order_review_heading">Đơn hàng của bạn</h3>

                                <div id="order_review" class="woocommerce-checkout-review-order">
                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    A700&nbsp; <strong class="product-quantity">&times; 1</strong> </td>
                                                <td class="product-total">
                                                    <span class="woocommerce-Price-amount amount">360.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Tạm tính</th>
                                                <td><span class="woocommerce-Price-amount amount">360.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </td>
                                            </tr>





                                            <tr class="order-total">
                                                <th>Tổng tiền</th>
                                                <td><strong><span class="woocommerce-Price-amount amount">360.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong> </td>
                                            </tr>


                                        </tfoot>
                                    </table>
                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_bacs">
                                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked='checked' data-order_button_text="" />

                                                <label for="payment_method_bacs">
                                                    Chuyển khoản ngân hàng trực tiếp </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>VCB: số 00123456789</p>
                                                    <p>Chi nhánh Thăng long</p>
                                                    <p>Chủ tài khoản:Bùi Văn Tuyên</p>

                                                </div>
                                            </li>
                                            <li class="wc_payment_method payment_method_cod">
                                                <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="" />

                                                <label for="payment_method_cod">
                                                    Thanh toán khi giao hàng </label>
                                                <div class="payment_box payment_method_cod" style="display:none;">
                                                    <p>Thanh toán bằng tiền mặt khi giao hàng.</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="form-row place-order">
                                            <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng" data-value="Đặt hàng" />

                                            <input type="hidden" id="_wpnonce" name="_wpnonce" value="a03fddb88f" />
                                            <input type="hidden" name="_wp_http_referer" value="/checkout/" />	
                                        </div>
                                    </div>
                                </div>
                                <div class="html-checkout-sidebar pt-half"></div>  			
                            </div>
                        </div>
                    </div><!-- large-5 -->

                </div><!-- row -->
            </form>

        </div>
    </div>


</main><!-- #main -->
