<?php
$obj = $this->obj;
$name = isset($obj->name) ? $obj->name : 'không tìm thấy';
?>
<div class="page-title shop-page-title product-page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-small">
                <nav class="woocommerce-breadcrumb breadcrumbs">
                    <a href="<?php echo SITE_ROOT ?>">Trang chủ</a> <span class="divider">&#47;</span> 
                    <a ><?php echo $name ?></a>
                </nav>
            </div>
        </div><!-- .flex-left -->

    </div><!-- flex-row -->
</div><!-- .page-title -->
<main id="main" class="">
    <div id="content" class="blog-wrapper blog-single page-wrapper">
        <div class="row row-large row-divided ">
            <?php
            if (!$obj) {
                echo "page not found";
                return;
            }
            $imgSrc = NO_IMAGE;
//if (property_exists($this->obj, 'image')) {
            if ($obj->image_id) {
                $imgSrc = $obj->image == '' ? NO_IMAGE : TIMTHUMB_LINK . $this->obj->image . '&h=200&w=400';
            }
//} 
            ?>
            <div class="large-9 col">
                <article id="post-2388" class="post-2388 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
                    <div class="article-inner has-shadow box-shadow-1">
                        <header class="entry-header">
                            <div class="entry-header-text entry-header-text-top  text-left">
                                <h1 class="entry-title"><?php echo $obj->name ?></h1>
                                <hr/>
                            </div><!-- .entry-header -->

                            <div class="text-center">
                                <img  src="<?php echo $imgSrc ?>" class="" alt="" ></a>
                            </div><!-- .entry-image -->
                        </header><!-- post-header -->
                        <div class="entry-content single-page">
                            <?php echo $obj->content ?>
                        </div><!-- .entry-content2 -->
                    </div><!-- .article-inner -->
                </article><!-- #-2388 -->

            </div> <!-- .large-9 -->

            <div class="post-sidebar large-3 col">
                <div id="secondary" class="widget-area " role="complementary">
                    <aside id="woocommerce_products-17" class="widget woocommerce widget_products"><h3 class="widget-title "><span>Sản phẩm mới</span></h3><div class="is-divider small"></div><ul class="product_list_widget">
                            <li>
                                <a href="http://linhshop.com.vn/shop/2518/">
                                    <img width="180" height="180" src="//linhshop.com.vn/wp-content/uploads/2017/09/775-180x180.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="//linhshop.com.vn/wp-content/uploads/2017/09/775-180x180.jpg 180w, //linhshop.com.vn/wp-content/uploads/2017/09/775-280x280.jpg 280w, //linhshop.com.vn/wp-content/uploads/2017/09/775-300x300.jpg 300w, //linhshop.com.vn/wp-content/uploads/2017/09/775-600x600.jpg 600w" sizes="(max-width: 180px) 100vw, 180px">		<span class="product-title"></span>
                                </a>
                                <del><span class="woocommerce-Price-amount amount">390.000<span class="woocommerce-Price-currencySymbol">₫</span></span></del> <ins><span class="woocommerce-Price-amount amount">350.000<span class="woocommerce-Price-currencySymbol">₫</span></span></ins></li>


                            <li>
                                <a href="http://linhshop.com.vn/shop/a779/">
                                    <img width="180" height="180" src="//linhshop.com.vn/wp-content/uploads/2017/09/779-180x180.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="//linhshop.com.vn/wp-content/uploads/2017/09/779-180x180.jpg 180w, //linhshop.com.vn/wp-content/uploads/2017/09/779-280x280.jpg 280w, //linhshop.com.vn/wp-content/uploads/2017/09/779-300x300.jpg 300w, //linhshop.com.vn/wp-content/uploads/2017/09/779-600x600.jpg 600w" sizes="(max-width: 180px) 100vw, 180px">		<span class="product-title">A779</span>
                                </a>
                                <del><span class="woocommerce-Price-amount amount">350.000<span class="woocommerce-Price-currencySymbol">₫</span></span></del> <ins><span class="woocommerce-Price-amount amount">320.000<span class="woocommerce-Price-currencySymbol">₫</span></span></ins></li>

                            <li>
                                <a href="http://linhshop.com.vn/shop/a781/">
                                    <img width="180" height="180" src="//linhshop.com.vn/wp-content/uploads/2017/09/781-180x180.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="//linhshop.com.vn/wp-content/uploads/2017/09/781-180x180.jpg 180w, //linhshop.com.vn/wp-content/uploads/2017/09/781-280x280.jpg 280w, //linhshop.com.vn/wp-content/uploads/2017/09/781-400x400.jpg 400w, //linhshop.com.vn/wp-content/uploads/2017/09/781-768x768.jpg 768w, //linhshop.com.vn/wp-content/uploads/2017/09/781-800x800.jpg 800w, //linhshop.com.vn/wp-content/uploads/2017/09/781-300x300.jpg 300w, //linhshop.com.vn/wp-content/uploads/2017/09/781-600x600.jpg 600w, //linhshop.com.vn/wp-content/uploads/2017/09/781.jpg 960w" sizes="(max-width: 180px) 100vw, 180px">		<span class="product-title">A781</span>
                                </a>
                                <del><span class="woocommerce-Price-amount amount">350.000<span class="woocommerce-Price-currencySymbol">₫</span></span></del> <ins><span class="woocommerce-Price-amount amount">330.000<span class="woocommerce-Price-currencySymbol">₫</span></span></ins></li>
                        </ul>
                    </aside>
                </div><!-- #secondary -->
            </div><!-- .post-sidebar -->
        </div><!-- .row -->
    </div><!-- #content .page-wrapper -->
</main>