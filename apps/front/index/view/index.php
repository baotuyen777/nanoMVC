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
                     <?php foreach ($this->arrSlider as $arrSlider):
                         ?>
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_<?php echo $arrSlider->id ?>">
                        <div class="img-inner image-cover dark" style="padding-top:40%;">
                            <img width="1920" height="825" 
                                 src="<?php echo TIMTHUMB_LINK . $arrSlider->image . '&h=500&w=1000' ?>" 
                                 class="attachment-original size-original" alt="<?php echo $arrSlider->name ?>"
                                 srcset="<?php echo TIMTHUMB_LINK . $arrSlider->image . '&h=500&w=1000' ?>" 
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
                                <?php
                                $productController = $this->loadModule('product');
                                $productController->loop($this->arrProductHot);
                                ?>
                            </div>
                            <div class="row align-center"  id="row-1086632122">
                                <div class="col small-12 large-12"  ><div class="col-inner text-center"  >
                                        <a class="button secondary is-larger"  href="<?php echo Helper::getPermalink('product/news')?>">
                                            <span>XEM THÊM ...</span>
                                            <i class="icon-play" ></i></a>

                                    </div></div>
                            </div>
                            <div class="container section-title-container" ><h3 class="section-title section-title-bold-center"><b></b>
                                    <span class="section-title-main" >sản phẩm mới</span><b></b></h3></div><!-- .section-title -->
                            <div class="row large-columns-4 medium-columns- small-columns-2 row-small has-shadow row-box-shadow-1 row-box-shadow-1-hover">
                                <?php
                                $productController->loop($this->arrProductNew);
                                ?>
                            </div>
                        </div>
                    </div>
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
