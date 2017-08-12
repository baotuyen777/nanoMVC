
<?php
if (empty($this->arrSingle)) {
    die('san pham ko ton tai');
}
$obj = $this->arrSingle;
$imgSrc = NO_IMAGE;
//var_dump(Session::get('cart'));
?>
<div class="page-title shop-page-title product-page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-small">
                <nav class="woocommerce-breadcrumb breadcrumbs">
                    <a href="<?php echo SITE_ROOT ?>">Trang chủ</a> <span class="divider">&#47;</span> 
                    <a href="<?php echo Helper::getPermalink('product') ?>">Shop</a> <span class="divider">&#47;</span> 
                    <a ><?php echo $obj->name ?></a>
                </nav>
            </div>
        </div><!-- .flex-left -->
        <div class="flex-col medium-text-center">
            <!--            <ul class="next-prev-thumbs is-small ">         
                            <li class="prod-dropdown has-dropdown">
                                <a href="<?php echo Helper::getPermalink('product') ?>" rel="next" class="button icon is-outline circle">
                                    <i class="icon-angle-right" ></i> 
                                </a>
                                <div class="nav-dropdown">
                                    <a title="Váy trắng be" href="<?php echo Helper::getPermalink('product') ?>">
                                        <img width="180" height="180" 
                                             src="<?php echo $imgSrc ?>" 
                                             class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" 
                                             sizes="(max-width: 180px) 100vw, 180px" />
                                    </a>
                                </div>
                            </li>
                        </ul>	   -->
        </div><!-- .flex-right -->
    </div><!-- flex-row -->
</div><!-- .page-title -->

<main id="main" class="">

    <div class="shop-container">
        <div id="product-2224" class="post-2224 product type-product status-publish has-post-thumbnail product_cat-vay-bau product_cat-thoi-trang-nam first instock shipping-taxable purchasable product-type-simple">
            <div class="product-container">
                <div class="product-main">
                    <div class="row content-row mb-0">

                        <div class="product-gallery large-6 col">
                            <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                                <figure class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half"
                                        data-flickity-options='{
                                        "cellAlign": "center",
                                        "wrapAround": true,
                                        "autoPlay": false,
                                        "prevNextButtons":true,
                                        "adaptiveHeight": true,
                                        "imagesLoaded": true,
                                        "lazyLoad": 1,
                                        "dragThreshold" : 15,
                                        "pageDots": false,
                                        "rightToLeft": false       }'>
                                            <?php
                                            foreach ($this->arrSlider as $arrSlider):
                                                $imgSrc = TIMTHUMB_LINK . $arrSlider->image . '&h=600&w=800';
                                                ?>
                                        <div data-thumb="<?php echo $imgSrc ?>" 
                                             class="first slide woocommerce-product-gallery__image">
                                            <a href="<?php echo $imgSrc ?>">
                                                <img width="600" height="600" src="<?php echo $imgSrc ?>"
                                                     sizes="(max-width: 600px) 100vw, 600px" />
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </figure>
                                <div class="image-tools absolute bottom left z-3">
                                    <a href="#product-zoom" class="zoom-button button is-outline circle icon tooltip hide-for-small" title="Zoom">
                                        <i class ="icon-expand" ></i>    
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="product-info summary col-fit col entry-summary product-summary form-flat">
                            <h1 class="product-title entry-title"><?php echo $obj->name ?></h1>
                            <div class="is-divider small"></div>
                            <div class="price-wrapper">
                                <p class="price product-page-price ">
                                    <span class="woocommerce-Price-amount amount"><?php echo $obj->price ?>
                                        <span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                </p>
                            </div>
                            <form class="cart form_ajax" method="post" enctype='multipart/form-data' 
                                  action="<?php echo Helper::getPermalink('cart/add') ?>"
                                  >
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus button is-form">    
                                    <input type="number" class="input-text qty text" step="1" min="1" max="9999" name="quantity" value="1" title="SL"
                                           size="4" pattern="[0-9]*" inputmode="numeric" />
                                    <input type="hidden" name="productId" value="<?php echo $obj->id ?>"/>
                                    <input type="button" value="+" class="plus button is-form">  
                                </div>
                                <button type="submit" name="add-to-cart" value="2224" class="single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>
                            </form>
                            <div class="product_meta">
                                <span class="posted_in">Danh mục:  
                                    <a href="<?= Helper::getPermalink('product/cat/' . $obj->cat_id) ?>" rel="tag">
                                        <?php echo $obj->cat_name ?></a></span>
                            </div>
                            <div class="social-icons share-icons share-row relative icon-style-outline " >
                                <a href="//www.facebook.com/sharer.php?u=<?php echo Helper::getPermalink('product/' . $obj->id) ?>" data-label="Facebook" onclick="window.open(this.href, this.title, 'width=500,height=500,top=300px,left=300px');  return false;" rel="nofollow" target="_blank" class="icon button circle is-outline tooltip facebook" title="Share on Facebook"><i class="icon-facebook" ></i></a>
                                <a href="//twitter.com/share?url=<?php echo Helper::getPermalink('product/' . $obj->id) ?>" onclick="window.open(this.href, this.title, 'width=500,height=500,top=300px,left=300px');  return false;" rel="nofollow" target="_blank" class="icon button circle is-outline tooltip twitter" title="Share on Twitter"><i class="icon-twitter" ></i></a>
                                <a href="//plus.google.com/share?url=<?php echo Helper::getPermalink('product/' . $obj->id) ?>" target="_blank" class="icon button circle is-outline tooltip google-plus" onclick="window.open(this.href, this.title, 'width=500,height=500,top=300px,left=300px');  return false;" rel="nofollow" title="Share on Google+"><i class="icon-google-plus" ></i></a>
                                <a href="//www.linkedin.com/shareArticle?mini=true&url=<?php echo Helper::getPermalink('product/' . $obj->id) ?>" onclick="window.open(this.href, this.title, 'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" class="icon button circle is-outline tooltip linkedin" title="Share on LinkedIn"><i class="icon-linkedin" ></i></a>
                            </div>
                        </div><!-- .summary -->

                    </div><!-- .row -->
                </div><!-- .product-main -->

                <div class="product-footer">
                    <div class="container">

                        <div class="woocommerce-tabs tabbed-content">
                            <ul class="product-tabs nav small-nav-collapse tabs nav nav-uppercase nav-tabs nav-normal nav-left">
                                <li class="description_tab  active">
                                    <a href="#tab-description">Mô tả chi tiết</a>
                                </li>
                                <li class="reviews_tab  ">
                                    <a href="#tab-reviews">Bình luận</a>
                                </li>
                            </ul>
                            <div class="tab-panels">
                                <div class="panel entry-content active" id="tab-description">
                                    <p>
                                        <?php echo $obj->content ?>
                                    </p>
                                </div>
                                <div class="panel entry-content " id="tab-reviews">
                                    <div class="row" id="reviews">
                                        <div class="col large-12" id="comments">
                                        </div>

                                    </div>
                                </div>
                            </div><!-- .tab-panels -->
                        </div><!-- .tabbed-content -->
                        <div class="related related-products-wrapper product-section">
                            <h3 class="product-section-title product-section-title-related pt-half pb-half uppercase">
                                Có thể bạn thích    
                            </h3>
                            <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                <?php
                                $controller = new productController($this->app, $this->module);
                                $controller->loop($this->arrProductRelated);
                                ?>
                            </div>
                        </div>
                    </div><!-- container -->
                </div><!-- product-footer -->
            </div><!-- .product-container -->
        </div>
    </div><!-- shop container -->
</main><!-- #main -->