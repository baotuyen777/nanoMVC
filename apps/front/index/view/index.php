<?php ?>
<main id="main" class="">


    <div id="content" role="main" class="content-area">


        <div class="slider-wrapper relative " id="slider-328981565" >
            <div class="slider slider-nav-circle slider-nav-large slider-nav-light slider-style-normal"
                 data-flickity-options='{
                 "cellAlign": "center",
                 "imagesLoaded": true,
                 "lazyLoad": 1,
                 "freeScroll": false,
                 "wrapAround": true,
                 "autoPlay": 3000,
                 "pauseAutoPlayOnHover" : true,
                 "prevNextButtons": true,
                 "contain" : true,
                 "adaptiveHeight" : true,
                 "dragThreshold" : 5,
                 "percentPosition": true,
                 "pageDots": true,
                 "rightToLeft": false,
                 "draggable": true,
                 "selectedAttraction": 0.1,
                 "parallax" : 0,
                 "friction": 0.6        }'
                 >
                     <?php foreach ($this->arrSlider as $arrSlider): ?>
                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_<?php echo $arrSlider->id ?>">
                    <div class="img-inner image-cover dark" style="padding-top:40%;">
                        <img width="1920" height="825" 
                             src="<?php echo TIMTHUMB_LINK . Helper::get_image($arrSlider->image) . '&h=500&w=1000' ?>" 
                             class="attachment-original size-original" alt="<?php echo $arrSlider->name ?>"
                             srcset="<?php echo TIMTHUMB_LINK . Helper::get_image($arrSlider->image) . '&h=500&w=1000' ?>" 
                             sizes="(max-width: 1920px) 100vw, 1920px" />                
                    </div>
                </div>
                <?php endforeach; ?>
                <!--                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_2070270351">
                                    <div class="img-inner image-cover dark" style="padding-top:40%;">
                                        <img width="1920" height="825" src="http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1498016161_497.png" class="attachment-original size-original" alt="" 
                                             srcset="http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1498016161_497.png 1920w, http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1498016161_497-800x344.png 800w, http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1498016161_497-768x330.png 768w, http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1498016161_497-1400x602.png 1400w" 
                                             sizes="(max-width: 1920px) 100vw, 1920px" />                
                                    </div>
                                </div>-->

                <!--                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1310913623">
                                    <div class="img-inner image-cover dark" style="padding-top:40%;">
                                        <img width="1920" height="825" src="http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1495602691_79.png" class="attachment-original size-original" alt="" srcset="http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1495602691_79.png 1920w, http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1495602691_79-800x344.png 800w, http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1495602691_79-768x330.png 768w, http://linhshop.com.vn/wp-content/uploads/2017/07/sb_1495602691_79-1400x602.png 1400w" sizes="(max-width: 1920px) 100vw, 1920px" />                
                                    </div>
                
                                    <style scope="scope">
                
                                    </style>
                                </div>-->

            </div>

            <div class="loading-spin dark large centered"></div>

            <style scope="scope">
            </style>
        </div><!-- .ux-slider-wrapper -->


        <section class="section" id="">
            <div class="section-content relative">
                <div class="row"  id="service">
                    <div class="col medium-3 small-6 large-3"  ><div class="col-inner"  >
                            <div class="icon-box featured-box icon-box-left text-left is-small"  >
                                <div class="icon-box-img" style="width: 54px">
                                    <div class="icon">
                                        <div class="icon-inner" >
                                            <img width="50" height="50" src="<?php echo SITE_ROOT ?>/public/img/policies_icon_1.png" class="attachment-medium size-medium" alt="" />             </div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">
                                    <h4>Giao hàng tận nơi</h4>
                                    <p>Nhận hàng trong ngày</p>
                                </div>
                            </div><!-- .icon-box -->
                        </div></div>
                    <div class="col medium-3 small-6 large-3"  ><div class="col-inner"  >

                            <div class="icon-box featured-box icon-box-left text-left is-small"  >

                                <div class="icon-box-img" style="width: 54px">
                                    <div class="icon">
                                        <div class="icon-inner" >
                                            <img width="50" height="50" src="<?php echo SITE_ROOT ?>/public/img/policies_icon_2.png" class="attachment-medium size-medium" alt="" />             </div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">
                                    <h4>QUÀ TẶNG</h4>
                                    <p>Ưu đãi khách hàng thân thiết</p>
                                </div>
                            </div><!-- .icon-box -->


                        </div></div>
                    <div class="col medium-3 small-6 large-3"  ><div class="col-inner"  >

                            <div class="icon-box featured-box icon-box-left text-left is-small"  >

                                <div class="icon-box-img" style="width: 54px">
                                    <div class="icon">
                                        <div class="icon-inner" >
                                            <img width="50" height="50" src="<?php echo SITE_ROOT ?>/public/img/policies_icon_3.png" class="attachment-medium size-medium" alt="" />             </div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">



                                    <h4>BẢO ĐẢM CHẤT LƯỢNG</h4>
                                    <p>Sản phẩm đã dược kiểm định</p>
                                </div>
                            </div><!-- .icon-box -->


                        </div></div>
                    <div class="col medium-3 small-6 large-3"  ><div class="col-inner"  >

                            <div class="icon-box featured-box icon-box-left text-left is-small"  >

                                <div class="icon-box-img" style="width: 54px">
                                    <div class="icon">
                                        <div class="icon-inner" >
                                            <img width="50" height="50" src="<?php echo SITE_ROOT ?>/public/img/policies_icon_4.png" class="attachment-medium size-medium" alt="" />             </div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">



                                    <h3>HOTLINE: 0169.404.5475</h3>
                                    <p>Dịch vụ hỗ trợ bạn 24/7</p>
                                </div>
                            </div><!-- .icon-box -->


                        </div></div>
                </div>
                <!--product-->
                <div class="row"  id="row-573089214">
                    <div class="col small-12 large-12"  ><div class="col-inner"  >
                            <div class="container section-title-container" >
                                <h3 class="section-title section-title-bold-center"><b></b>
                                    <span class="section-title-main" style="color:rgb(236, 0, 0);">
                                        <i class="icon-play" ></i>Sản phẩm bán chạy</span><b></b></h3>
                            </div><!-- .section-title -->
                            <div class="row large-columns-4 medium-columns- small-columns-2 row-small has-shadow row-box-shadow-1 row-box-shadow-1-hover">
                                <?php foreach($this->arrHot as $arrSingleHot): ?>
                                <div class="col" >
                                    <div class="col-inner">
                                        <div class="badge-container absolute left top z-1">
                                            <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">-11%</span></div></div>
                                        </div>
                                        <div class="product-small box has-hover box-normal box-text-bottom">
                                            <div class="box-image" >
                                                <div class="" >
                                                    <a href="<?php echo Helper::getPermalink('product/'.$arrSingleHot->id)?>">
                                                        <img width="400" height="400" src="<?php echo TIMTHUMB_LINK . Helper::get_image($arrSingleHot->image) . '&h=400&w=400' ?>" 
                                                             class="attachment-medium size-medium wp-post-image" alt="" 
                                                             srcset="<?php echo TIMTHUMB_LINK . Helper::get_image($arrSingleHot->image) . '&h=400&w=400' ?>" sizes="(max-width: 400px) 100vw, 400px" />									</a>
                                                </div>
                                               
                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                </div>
                                            </div><!-- box-image -->

                                            <div class="box-text text-center" >
                                                <div class="title-wrapper"><p class="name product-title"><a href="http://linhshop.com.vn/shop/vay-suong-020298/">Vay suông 020298</a></p></div><div class="price-wrapper">
                                                    <span class="price"><del><span class="woocommerce-Price-amount amount">280.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">250.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                                                </div>							</div><!-- box-text -->
                                        </div><!-- box -->
                                    </div><!-- .col-inner -->
                                </div><!-- col -->
                                <?php endforeach; ?>
                            </div>
                            <div class="row align-center"  id="row-1086632122">
                                <div class="col small-12 large-12"  ><div class="col-inner text-center"  >
                                        <a class="button secondary is-larger"  >
                                            <span>XEM THÊM ...</span>
                                            <i class="icon-play" ></i></a>

                                    </div></div>

                                <style scope="scope">

                                </style>
                            </div>
                            <div class="container section-title-container" ><h3 class="section-title section-title-bold-center"><b></b><span class="section-title-main" >sản phẩm mới</span><b></b></h3></div><!-- .section-title -->


                            <div class="row large-columns-4 medium-columns- small-columns-2 row-small has-shadow row-box-shadow-1 row-box-shadow-1-hover">



                                <div class="product-small col has-hover post-1942 product type-product status-publish has-post-thumbnail product_cat-thoi-trang-nam first instock sale shipping-taxable purchasable product-type-simple">
                                    <div class="col-inner">

                                        <div class="badge-container absolute left top z-1">
                                            <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">-11%</span></div></div>
                                        </div>
                                        <div class="product-small box ">
                                            <div class="box-image">
                                                <div class="image-fade_in_back">
                                                    <a href="http://linhshop.com.vn/shop/vay-suong-020298/">
                                                        <img width="300" height="300" src="//linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-300x300.jpg 300w, //linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-280x280.jpg 280w, //linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-400x400.jpg 400w, //linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-180x180.jpg 180w, //linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" />				</a>
                                                </div>
                                                <div class="image-tools is-small top right show-on-hover">
                                                    <div class="wishlist-icon">
                                                        <button class="wishlist-button button is-outline circle icon">
                                                            <i class="icon-heart" ></i>      </button>
                                                        <div class="wishlist-popup dark">

                                                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1942">
                                                                <div class="yith-wcwl-add-button show" style="display:block">


                                                                    <a href="/?add_to_wishlist=1942" rel="nofollow" data-product-id="1942" data-product-type="simple" class="add_to_wishlist" >
                                                                        Add to Wishlist</a>
                                                                    <img src="http://linhshop.com.vn/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                                                </div>

                                                                <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                    <span class="feedback">Product added!</span>
                                                                    <a href="http://linhshop.com.vn/wishlist/" rel="nofollow">
                                                                        Browse Wishlist	        </a>
                                                                </div>

                                                                <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                    <span class="feedback">The product is already in the wishlist!</span>
                                                                    <a href="http://linhshop.com.vn/wishlist/" rel="nofollow">
                                                                        Browse Wishlist	        </a>
                                                                </div>

                                                                <div style="clear:both"></div>
                                                                <div class="yith-wcwl-wishlistaddresponse"></div>

                                                            </div>

                                                            <div class="clear"></div>      </div>
                                                    </div>
                                                </div>
                                                <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                </div>
                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                </div>
                                            </div><!-- box-image -->

                                            <div class="box-text box-text-products text-center grid-style-2">
                                                <div class="title-wrapper"><p class="name product-title"><a href="http://linhshop.com.vn/shop/vay-suong-020298/">Vay suông 020298</a></p></div><div class="price-wrapper">
                                                    <span class="price"><del><span class="woocommerce-Price-amount amount">280.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">250.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                                                </div>		</div><!-- box-text -->
                                        </div><!-- box -->
                                    </div><!-- .col-inner -->
                                </div><!-- col -->


                                <div class="product-small col has-hover post-1922 product type-product status-publish has-post-thumbnail product_cat-quan-bau product_cat-vay-bau  instock shipping-taxable purchasable product-type-simple">
                                    <div class="col-inner">

                                        <div class="badge-container absolute left top z-1">
                                        </div>
                                        <div class="product-small box ">
                                            <div class="box-image">
                                                <div class="image-fade_in_back">
                                                    <a href="http://linhshop.com.vn/shop/ao-thun-cesjours-2/">
                                                        <img width="300" height="300" src="//linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-300x300.jpg 300w, //linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-280x280.jpg 280w, //linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-400x400.jpg 400w, //linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-180x180.jpg 180w, //linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="http://linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-300x300.jpg 300w, http://linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-280x280.jpg 280w, http://linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-400x400.jpg 400w, http://linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600-180x180.jpg 180w, http://linhshop.com.vn/wp-content/uploads/2017/07/qm20_0018_thumb_600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" />				</a>
                                                </div>
                                                <div class="image-tools is-small top right show-on-hover">
                                                    <div class="wishlist-icon">
                                                        <button class="wishlist-button button is-outline circle icon">
                                                            <i class="icon-heart" ></i>      </button>
                                                        <div class="wishlist-popup dark">

                                                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1922">
                                                                <div class="yith-wcwl-add-button show" style="display:block">


                                                                    <a href="/?add_to_wishlist=1922" rel="nofollow" data-product-id="1922" data-product-type="simple" class="add_to_wishlist" >
                                                                        Add to Wishlist</a>
                                                                    <img src="http://linhshop.com.vn/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                                                </div>

                                                                <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                    <span class="feedback">Product added!</span>
                                                                    <a href="http://linhshop.com.vn/wishlist/" rel="nofollow">
                                                                        Browse Wishlist	        </a>
                                                                </div>

                                                                <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                    <span class="feedback">The product is already in the wishlist!</span>
                                                                    <a href="http://linhshop.com.vn/wishlist/" rel="nofollow">
                                                                        Browse Wishlist	        </a>
                                                                </div>

                                                                <div style="clear:both"></div>
                                                                <div class="yith-wcwl-wishlistaddresponse"></div>

                                                            </div>

                                                            <div class="clear"></div>      </div>
                                                    </div>
                                                </div>
                                                <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                </div>
                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                </div>
                                            </div><!-- box-image -->

                                            <div class="box-text box-text-products text-center grid-style-2">
                                                <div class="title-wrapper"><p class="name product-title"><a href="http://linhshop.com.vn/shop/ao-thun-cesjours-2/">ÁO THUN CESJOURS</a></p></div><div class="price-wrapper">
                                                    <span class="price"><span class="woocommerce-Price-amount amount">180.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                                                </div>		</div><!-- box-text -->
                                        </div><!-- box -->
                                    </div><!-- .col-inner -->
                                </div><!-- col -->


                                <div class="product-small col has-hover post-1912 product type-product status-publish has-post-thumbnail product_cat-do-lot product_cat-vay-bau  instock shipping-taxable purchasable product-type-simple">
                                    <div class="col-inner">

                                        <div class="badge-container absolute left top z-1">
                                        </div>
                                        <div class="product-small box ">
                                            <div class="box-image">
                                                <div class="image-fade_in_back">
                                                    <a href="http://linhshop.com.vn/shop/vay-ren-hoa-hong-noi/">
                                                        <img width="300" height="300" src="//linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-300x300.jpg 300w, //linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-280x280.jpg 280w, //linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-400x400.jpg 400w, //linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-180x180.jpg 180w, //linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="http://linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-300x300.jpg 300w, http://linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-280x280.jpg 280w, http://linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-400x400.jpg 400w, http://linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600-180x180.jpg 180w, http://linhshop.com.vn/wp-content/uploads/2017/07/qg01_0151_thumb_600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" />				</a>
                                                </div>
                                                <div class="image-tools is-small top right show-on-hover">
                                                    <div class="wishlist-icon">
                                                        <button class="wishlist-button button is-outline circle icon">
                                                            <i class="icon-heart" ></i>      </button>
                                                        <div class="wishlist-popup dark">

                                                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1912">
                                                                <div class="yith-wcwl-add-button show" style="display:block">


                                                                    <a href="/?add_to_wishlist=1912" rel="nofollow" data-product-id="1912" data-product-type="simple" class="add_to_wishlist" >
                                                                        Add to Wishlist</a>
                                                                    <img src="http://linhshop.com.vn/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                                                </div>

                                                                <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                    <span class="feedback">Product added!</span>
                                                                    <a href="http://linhshop.com.vn/wishlist/" rel="nofollow">
                                                                        Browse Wishlist	        </a>
                                                                </div>

                                                                <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                    <span class="feedback">The product is already in the wishlist!</span>
                                                                    <a href="http://linhshop.com.vn/wishlist/" rel="nofollow">
                                                                        Browse Wishlist	        </a>
                                                                </div>

                                                                <div style="clear:both"></div>
                                                                <div class="yith-wcwl-wishlistaddresponse"></div>

                                                            </div>

                                                            <div class="clear"></div>      </div>
                                                    </div>
                                                </div>
                                                <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                </div>
                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                </div>
                                            </div><!-- box-image -->

                                            <div class="box-text box-text-products text-center grid-style-2">
                                                <div class="title-wrapper"><p class="name product-title"><a href="http://linhshop.com.vn/shop/vay-ren-hoa-hong-noi/">VÁY REN HOA HỒNG NỔI</a></p></div><div class="price-wrapper">
                                                    <span class="price"><span class="woocommerce-Price-amount amount">400.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                                                </div>		</div><!-- box-text -->
                                        </div><!-- box -->
                                    </div><!-- .col-inner -->
                                </div><!-- col -->


                                <div class="product-small col has-hover post-1904 product type-product status-publish has-post-thumbnail product_cat-giay-dep-nu product_cat-vay-bau last instock shipping-taxable purchasable product-type-simple">
                                    <div class="col-inner">

                                        <div class="badge-container absolute left top z-1">
                                        </div>
                                        <div class="product-small box ">
                                            <div class="box-image">
                                                <div class="image-fade_in_back">
                                                    <a href="http://linhshop.com.vn/shop/quan-jean-dai-chan-rua/">
                                                        <img width="300" height="300" src="//linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-300x300.jpg 300w, //linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-280x280.jpg 280w, //linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-400x400.jpg 400w, //linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-180x180.jpg 180w, //linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="http://linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-300x300.jpg 300w, http://linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-280x280.jpg 280w, http://linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-400x400.jpg 400w, http://linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600-180x180.jpg 180w, http://linhshop.com.vn/wp-content/uploads/2017/07/qh40_0009_thumb_600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" />				</a>
                                                </div>
                                                <div class="image-tools is-small top right show-on-hover">
                                                    <div class="wishlist-icon">
                                                        <button class="wishlist-button button is-outline circle icon">
                                                            <i class="icon-heart" ></i>      </button>
                                                        <div class="wishlist-popup dark">

                                                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1904">
                                                                <div class="yith-wcwl-add-button show" style="display:block">


                                                                    <a href="/?add_to_wishlist=1904" rel="nofollow" data-product-id="1904" data-product-type="simple" class="add_to_wishlist" >
                                                                        Add to Wishlist</a>
                                                                    <img src="http://linhshop.com.vn/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                                                </div>

                                                                <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                    <span class="feedback">Product added!</span>
                                                                    <a href="http://linhshop.com.vn/wishlist/" rel="nofollow">
                                                                        Browse Wishlist	        </a>
                                                                </div>

                                                                <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                    <span class="feedback">The product is already in the wishlist!</span>
                                                                    <a href="http://linhshop.com.vn/wishlist/" rel="nofollow">
                                                                        Browse Wishlist	        </a>
                                                                </div>

                                                                <div style="clear:both"></div>
                                                                <div class="yith-wcwl-wishlistaddresponse"></div>

                                                            </div>

                                                            <div class="clear"></div>      </div>
                                                    </div>
                                                </div>
                                                <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                </div>
                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                </div>
                                            </div><!-- box-image -->

                                            <div class="box-text box-text-products text-center grid-style-2">
                                                <div class="title-wrapper"><p class="name product-title"><a href="http://linhshop.com.vn/shop/quan-jean-dai-chan-rua/">QUẦN JEAN DÀI CHÂN RUA</a></p></div><div class="price-wrapper">
                                                    <span class="price"><span class="woocommerce-Price-amount amount">130.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                                                </div>		</div><!-- box-text -->
                                        </div><!-- box -->
                                    </div><!-- .col-inner -->
                                </div><!-- col -->

                            </div>
                        </div></div>
                    <div class="col small-12 large-12"  ><div class="col-inner text-center"  >
                            <a class="button secondary is-larger"  >
                                <span>XEM THÊM ...</span>
                                <i class="icon-play" ></i></a>

                        </div></div>
                </div>
            </div><!-- .section-content -->


            <style scope="scope">

                #section_391201262 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>



    </div>



</main><!-- #main -->
