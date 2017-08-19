<?php
if ($this->arrProduct):
    foreach ($this->arrProduct as $product):
        ?>
        <div class="col" >
            <div class="col-inner">
                <div class="badge-container absolute left top z-1">
                    <div class="callout badge badge-circle">
                        <div class="badge-inner secondary on-sale">
                            <span class="onsale">-<?php echo $product->sale ?>%</span></div></div>
                </div>
                <div class="product-small box has-hover box-normal box-text-bottom">
                    <div class="box-image" >
                        <div class="" >
                            <a href="<?php echo Helper::getPermalink('product/' . $product->id) ?>">
                                <img width="400" height="400" src="<?php echo TIMTHUMB_LINK . $product->image . '&h=400&w=400' ?>" 
                                     class="attachment-medium size-medium wp-post-image" alt="" 
                                     srcset="<?php echo TIMTHUMB_LINK . $product->image . '&h=400&w=400' ?>" sizes="(max-width: 400px) 100vw, 400px" />									
                            </a>
                        </div>

                        <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                        </div>
                    </div><!-- box-image -->

                    <div class="box-text text-center" >
                        <div class="title-wrapper"><p class="name product-title">
                                <a href="<?php echo Helper::getPermalink('product/' . $product->id) ?>">
                                    <?php echo $product->name ?></a></p>
                        </div>
                        <div class="price-wrapper">
                            <span class="price">
                                <?php if ($product->sale > 0): ?>
                                    <del>
                                        <span class="woocommerce-Price-amount amount">
                                            <?php echo number_format($product->price) ?>
                                            <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                        </span>
                                    </del> 
                                <?php endif; ?>
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <?php echo number_format($product->price - ($product->sale * $product->price) / 100) ?>
                                        <span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                </ins>
                            </span>
                        </div>
                    </div><!-- box-text -->
                </div><!-- box -->
            </div><!-- .col-inner -->
        </div><!-- col -->
        <?php
    endforeach;
endif;
?>