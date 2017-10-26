<div class="page-title shop-page-title product-page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-small">
                <nav class="woocommerce-breadcrumb breadcrumbs">
                    <a href="<?php echo SITE_ROOT ?>">Trang chủ</a> <span class="divider">&#47;</span> 
                    <a href="<?php echo Helper::getPermalink('product') ?>">Shop</a> <span class="divider">&#47;</span> 
                </nav>
            </div>
        </div><!-- .flex-left -->

    </div><!-- flex-row -->
</div><!-- .page-title -->

<main id="main" class="">
    <div class="row" >
        <div class="col small-12 large-12"  ><div class="col-inner"  >
                <div class="container section-title-container" >
                    <h3 class="section-title section-title-bold-center"><b></b>
                        <span class="section-title-main" style="color:rgb(236, 0, 0);">
                            <i class="icon-play" ></i><?php echo $this->title ?></span><b></b></h3>
                </div>
                <div class="row large-columns-5 medium-columns- small-columns-2 row-small has-shadow row-box-shadow-1 row-box-shadow-1-hover">
                    <?php
                    $productController = $this->loadController('product');
                    $productController->loop($this->arrMulti);
                    ?>
                </div>
                <div class="container section-title-container" >
                    <h3 class="section-title section-title-bold-center"><b></b>
                        <b></b></h3>
                </div>
                <?php if ($this->arrMulti && $this->countPage > 1): ?>
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers nav-pagination links text-center">
                            <?php if ($this->page > 1 && $this->page <= $this->countPage): ?>
                                <li><a href="<?php echo Helper::getPermalink('backend/' . $this->module, "page=" . ($this->page - 1)) ?>">
                                        <i class="icon-angle-left"></i><</a>
                                </li>
                            <?php endif; ?>
                            <?php
                            for ($i = 1; $i <= $this->countPage; $i++):
                                if ($this->page == $i):
                                    ?>
                                    <li><span class="page-number current"><?php echo $i ?></span></li>
                                <?php else: ?>
                                    <li><a lass="page-number <?php echo $current ?>" href="<?php echo Helper::getPermalink($this->module, "page={$i}") ?>"><?php echo $i ?></a></li>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($this->page < $this->countPage): ?>
                                <li><a  class="next page-number" href="<?php echo Helper::getPermalink($this->module, "page=" . ($this->page + 1)) ?>"><i class="icon-angle-right"></i></a></li>
                                    <?php endif; ?>
                            <!--                        <li>
                                                        <span class="page-number current">1</span></li><li>
                                                        <a class="page-number" href="http://linhshop.com.vn/shop/page/2/">2</a></li>
                            
                                                    <li><a class="page-number" href="http://linhshop.com.vn/shop/page/4/">4</a></li>
                                                    <li><a class="page-number" href="http://linhshop.com.vn/shop/page/5/">5</a></li>
                                                    <li><a class="next page-number" href="http://linhshop.com.vn/shop/page/2/">
                                                            <i class="icon-angle-right"></i></a>
                                                    </li>-->
                        </ul>
                    </nav>
                <?php endif; ?>

            </div>
        </div>

    </div>
</main><!-- #main -->