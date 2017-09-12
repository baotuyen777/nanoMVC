<?php
$arrPm = array(
    1 => 'Thanh toán khi giao hàng',
    2 => 'Thanh toán qua ngaân hàng'
);
$arrPs = array(
    1 => 'Pending',
    2 => 'Done'
);
$obj = $this->arrSingle;
?>
<div class="container">
    <h1>Detail</h1>
    <div class="notice">

    </div>
    <form class="form_ajax form-horizontal" method="post" enctype="multipart/form-data"
          action="<?php echo Helper::getPermalink('backend/' . $this->module . '/update/') . $this->arrSingle->id ?>" 
          data-url_list="<?php echo Helper::getPermalink('backend/' . $this->module) ?>"
          >
        <table class="table">

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
                    <th scope="row">Tổng</th>
                    <td><span class="woocommerce-Price-amount amount"><?php echo number_format($obj->total) ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
                </tr>
                <tr>
                    <th scope="row">Phương thức thanh toán</th>
                    <td>
                          <select>
                            <?php foreach ($arrPm as $k => $v): 
                                $selected=$k==$obj->payment_method ? 'selected' : '';
                                ?>
                            <option <?php echo $selected?>><?php echo $v ?></option>
                            <?php endforeach; ?>
                        </select>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td> 
                        <select>
                            <?php foreach ($arrPs as $k => $v): 
                                $selected=$k==$obj->payment_status ? 'selected' : '';
                                ?>
                            <option <?php echo $selected?>><?php echo $v ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

            </tfoot>
        </table>
      
        <div class="form-action">
            <a class="btn btn-default" href="<?php echo Helper::getPermalink('backend/' . $this->module) ?>" >Return</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div> <!-- /container -->

<div id="slideModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

                <div class="wrap_list_media">
                    <div class="function">
                        <a class="btn btn-success" href="<?php echo Helper::getPermalink('backend/' . $this->module . '/detail') ?>">Add</a>

                    </div>
                    <div class="list_media">

                    </div>
                    <hr/>
                    <ul class="pagination">

                    </ul>

                </div> <!-- /container -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" >Choose</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
    var updateSlideUrl = '<?php echo Helper::getPermalink('backend/' . $this->module) ?>/updateSlide';

//    $('.form_ajax').submit(function(e){
//        console.log();
//        data = $(this).serializeArray();
//        e.preventDefault();
//        jQuery.ajax({
//        type: "POST",
//        url: $(this).attr('action'),
////        data: {"page": 1},
//        success: function (result) {
//            console.log(result);
////            $('.list_media').append(listMedia);
//        }
//    });
//    });
</script>