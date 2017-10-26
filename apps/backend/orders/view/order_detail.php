<?php
foreach ($this->arrMulti as $product):
    $imgSrc = $product->image == '' ? NO_IMAGE : TIMTHUMB_LINK . $product->image . '&h=50&w=100';
    ?>
    <img class="img-list" 
         src="<?= $imgSrc ?>"/>
    <span><?php echo $product->product_name ?>*<?php echo $product->quantity ?></span><br/><br/>
    <?php
endforeach;
