<main id="main" class="">
    <div class="checkout-page-title page-title">
        <div class="page-title-inner flex-row medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                    <a href="http://linhshop.com.vn/cart/" class="current">Shopping Cart</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right" ></i></span>
                    <a href="http://linhshop.com.vn/checkout/" class="hide-for-small">Checkout details</a>
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
            <div class="woocommerce row row-large row-divided">
                <div class="col large-12 pb-0 ">



                    <div class="cart-wrapper sm-touch-scroll">


                        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-name" colspan="3">Sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $arrCart = Session::get('cart');
                                if (!empty($arrCart)):
                                    foreach ($arrCart['data'] as $product):
//                                        $total += ($product->price - $product->price * $product->sale / 100) * $product->quantity
                                        ?>
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            <td class="product-remove">
                                                <a href="<?php echo Helper::getPermalink('cart/del/' . $product->id) ?>" class="remove" aria-label="Xóa sản phẩm này" data-product_id="2224" data-product_sku="">&times;</a> </td>
                                            <td class="product-thumbnail">
                                                <a href="<?php echo Helper::getPermalink('product/' . $product->id) ?>">
                                                    <img width="180" height="180" src="<?php echo TIMTHUMB_LINK . $product->image ?>" 
                                                         class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" 
                                                         />
                                                </a>
                                            </td>

                                            <td class="product-name" data-title="Sản phẩm">
                                                <a href="<?php echo Helper::getPermalink('product/' . $product->id) ?>"><?= $product->name ?></a> </td>

                                            <td class="product-price" data-title="Giá">
                                                <span class="woocommerce-Price-amount amount">
                                                    <?= number_format($product->price - $product->price * $product->sale / 100) ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </td>

                                            <td class="product-quantity" data-title="Số lượng">
                                                <div class="quantity buttons_added">
                                                    <form action="<?php echo Helper::getPermalink('cart/add') ?>" method="post" class="form_ajax">
                                                        <input type="button" value="-" class="minus button is-form">
                                                        <input type="number" class="input-text qty text" step="1" min="0" max="9999" 
                                                               name="quantity" value="<?php echo $product->quantity ?>" title="SL" size="4"
                                                               pattern="[0-9]*" inputmode="numeric" />
                                                        <input type="button" value="+" class="plus button is-form"> 
                                                        &nbsp;
                                                        <input type="hidden" name="productId" value="<?php echo $product->id ?>"/>
                                                        <input type="submit" class="button primary mt-0 pull-right small" name="update_cart" value="Cập nhật" />
                                                    </form>
                                                </div>
                                            </td>

                                            <td class="product-subtotal" data-title="Tổng tiền">
                                                <span class="woocommerce-Price-amount amount"><?php echo $product->total ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                                <tr class="order-total">
                                    <th colspan="6">Tổng tiền
                                        <strong>
                                            <span class="woocommerce-Price-amount amount pull-right">
                                                <?= ($arrCart['total']) ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong> 
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="6" class="actions clear">

                                        <div class="continue-shopping pull-left text-left">
                                            <a class="button-continue-shopping button primary is-outline" href="<?php echo SITE_ROOT ?>">
                                                &#8592; Tiếp tục mua hàng    </a>
                                            <a href="<?php echo Helper::getPermalink('cart/checkout') ?>" class="checkout-button button alt wc-forward">
                                                Tiến hành đặt hàng</a>    
                                        </div>



                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

                <!--                <div class="cart-collaterals large-5 col pb-0">
                                    <div class="cart-sidebar col-inner ">
                                        <div class="cart_totals ">
                
                                            <table cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="product-name" colspan="2" style="border-width:3px;">Tổng giỏ hàng</th>
                                                    </tr>
                                                </thead>
                                            </table>
                
                                            <h2>Tổng giỏ hàng</h2>
                
                                            <table cellspacing="0" class="shop_table shop_table_responsive">
                
                                                <tr class="cart-subtotal">
                                                    <th>Tạm tính</th>
                                                    <td data-title="Tạm tính"><span class="woocommerce-Price-amount amount">360.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </td>
                                                </tr>
                
                
                
                
                
                                                <tr class="order-total">
                                                    <th>Tổng tiền</th>
                                                    <td data-title="Tổng tiền"><strong><span class="woocommerce-Price-amount amount">360.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong> </td>
                                                </tr>
                
                
                                            </table>
                
                                            <div class="wc-proceed-to-checkout">
                
                                                <a href="http://linhshop.com.vn/checkout/" class="checkout-button button alt wc-forward">
                                                    Tiến hành đặt hàng</a>
                                            </div>
                
                
                                        </div>
                                                                <form class="checkout_coupon mb-0" method="post">
                                                                    <div class="coupon">
                                                                        <h3 class="widget-title"><i class="icon-tag" ></i> Mã ưu đãi</h3>
                                                                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã ưu đãi" />
                                                                        <input type="submit" class="is-form expand" name="apply_coupon" value="Áp dụng mã ưu đãi" />
                                        
                                                                    </div>
                                                                </form>
                                        <div class="cart-sidebar-content relative"></div>
                                    </div>
                                </div>-->
            </div>
            <div class="cart-footer-content after-cart-content relative"></div>
        </div>
    </div>


</main>
<!-- #main -->
