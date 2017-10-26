<?php
$arrPm = array(
    1 => 'Thanh toán khi giao hàng',
    2 => 'Thanh toán qua ngaân hàng'
);
$obj = $this->arrSingle;
?>
<main id="main" class="">
    <div class="checkout-page-title page-title">
        <div class="page-title-inner flex-row medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                    <a  class="hide-for-small">Giỏ hàng</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right" ></i></span>
                    <a  class="hide-for-small">Đặt hàng</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right" ></i></span>
                    <a href="#" class="no-click current">Hoàn thành đơn hàng</a>
                </nav>
            </div><!-- .flex-left -->
        </div><!-- flex-row -->
    </div><!-- .page-title -->
    <div class="cart-container container page-wrapper page-checkout">
        <div class="woocommerce">
            <div class="row">
                <div class="large-7 col">

                    <section class="woocommerce-order-details">

                        <h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>

                        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                            <thead>
                                <tr>
                                    <th class="woocommerce-table__product-name product-name">Sản phẩm</th>
                                    <th class="woocommerce-table__product-table product-total">Tổng tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($this->arrOrderDetail as $product): ?>
                                    <tr class="woocommerce-table__line-item order_item">
                                        <td class="woocommerce-table__product-name product-name">
                                            <a href="<?php echo Helper::getPermalink('product/' . $product->product_id) ?>"><?php echo $product->product_name ?></a> 
                                            <strong class="product-quantity">&times; <?php echo $product->quantity ?></strong>	</td>
                                        <td class="woocommerce-table__product-total product-total">
                                            <span class="woocommerce-Price-amount amount"><?php echo number_format(($product->price - $product->price * $product->sale / 100) * $product->quantity) ?>
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span></span>	</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th scope="row">Phương thức thanh toán</th>
                                    <td><?php echo $arrPm[$obj->payment_method] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tổng</th>
                                    <td><span class="woocommerce-Price-amount amount"><?php echo number_format($obj->total) ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </section>
                </div>
                <div class="large-5 col">
                    <div class="is-well col-inner entry-content">
                        <p class="success-color woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><strong>Đơn đặt hàng của bạn đã được nhận.</strong></p>

                        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                            <li class="woocommerce-order-overview__order order">
                                Mã đơn hàng: <strong>K3<?php echo $obj->id ?></strong>
                            </li>

                            <li class="woocommerce-order-overview__date date">
                                Ngày: <strong><?php echo $obj->date ?></strong>
                            </li>

                            <li class="woocommerce-order-overview__total total">
                                Tổng: <strong><span class="woocommerce-Price-amount amount"><?php echo number_format($obj->total) ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong>
                            </li>
                            <li class="woocommerce-order-overview__payment-method method">
                                Phương thức thanh toán: <strong><?php echo $arrPm[$obj->payment_method] ?></strong>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!</p>
    </div>
</main><!-- #main -->