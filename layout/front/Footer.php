<footer id="footer" class="footer-wrapper">
    <div class="footer-widgets footer footer-2 ">
        <div class="row large-columns-4 mb-0">

            <div id="text-9" class="col pb-0 widget widget_text">
                <h3 class="widget-title">THÔNG TIN LIÊN HỆ</h3>
                <div class="is-divider small"></div>
                <div class="textwidget">
                    <header class="panel-head">
                        <h3 class="heading"></h3>
                    </header>
                    <section class="panel-body">
                        <ul class="uk-list list-info">
                            <li class="location">Số 1 Hoàng Cầu &#8211; Phường ô Chợ Dừa &#8211; Đống Đa &#8211; Hà Nội ( nhìn ra đèn xanh đèn đỏ hoàng cầu &#8211; ô chợ dừa)</li>
                            <li class="phone">Điện thoại: 01694142008</li>
                            <li class="hotline">Hotline: 01694142008</li>
                        </ul>
                    </section>
                </div>
            </div>

            <div id="text-13" class="col pb-0 widget widget_text">
                <h3 class="widget-title">HỖ TRỢ</h3>
                <div class="is-divider small"></div>
                <div class="textwidget">
                    <div class="textwidget">
                        <div class="support-item">
                            <div class="pull-left skype"></div>
                            <div class="name">Mr Tú</div>
                            <div class="hotline">Hotline: 01694.142.008</div>
                        </div>
                        <div class="support-item"></div>
                    </div>
                </div>
            </div>
            <div id="text-10" class="col pb-0 widget widget_text">
                <h3 class="widget-title">KẾT NỐI VỚI CHÚNG TÔI</h3><div class="is-divider small"></div>			
                <div class="fb-page" data-href="https://www.facebook.com/pg/Choxanh247-1993578137586376/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pg/Choxanh247-1993578137586376/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pg/Choxanh247-1993578137586376/">Choxanh247</a></blockquote></div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end footer 2 -->

    <div class="absolute-footer light medium-text-center small-text-center">
        <div class="container clearfix">

            <div class="footer-primary ">
                <div class="copyright-footer">
                    Copyright 2017 &copy; <strong>Choxanh247.com</strong>
                </div>
            </div>
            <!-- .left -->
        </div>
        <!-- .container -->
    </div>
    <!-- .absolute-footer -->
    <a href="#top" class="back-to-top button invert plain is-outline hide-for-medium icon circle fixed bottom z-1" id="top-link"><i class="icon-angle-up" ></i></a>

</footer>
<!-- .footer-wrapper -->

</div>
<!-- #wrapper -->
<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                        <form method="get" class="searchform" action="<?php echo Helper::getPermalink('product/search') ?>" role="search">
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <input type="search" class="search-field mb-0" name="s" value="" placeholder="Tìm kiếm sản phẩm..." />
                                </div>
                                <!-- .flex-col -->
                                <div class="flex-col">
                                    <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                                <!-- .flex-col -->
                            </div>
                            <!-- .flex-row -->
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>
                </div>
            </li>
            <li id="menu-item-338" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-96 current_page_item active  menu-item-338">
                <a href="<?php echo SITE_ROOT ?>" class="nav-top-link">Trang Chủ</a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                <a href="<?php echo Helper::getPermalink('post/detail/gioi-thieu') ?>" class="nav-top-link">Giới Thiệu</a>
            </li>
            <li>
                <a href="<?php echo Helper::getPermalink('product') ?>" class="nav-top-link">SẢN PHẨM</a>
                <ul class='children'>
                    <?php foreach ($this->arrProductCat as $cat): ?>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat">
                            <a href="<?php echo Helper::getPermalink('product/cat/' . $cat->slug) ?>">
                                <?php echo $cat->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li id="menu-item-1310" class="menu-item menu-item-type-post_type menu-item-object-page ">
                <a href="<?php echo Helper::getPermalink('page/promotion') ?>" class="nav-top-link">Khuyến Mãi</a>
            </li>
            <li class="">
                <a href="<?php echo Helper::getPermalink('page/contact') ?>" class="nav-top-link">Liên hệ</a>
            </li>
            <!--            <li class="account-item has-icon menu-item">
                            <a href="http://linhshop.com.vn/my-account/"
                               class="nav-top-link nav-top-not-logged-in">
                                <span class="header-account-title">
                                    Đăng nhập  </span>
                            </a> .account-login-link 
                        </li>-->
            <li class="html custom html_topbar_right">
                <img class="alignnone size-full wp-image-1260" src="<?php echo SITE_ROOT ?>public/img/phone9x.gif" alt="" width="20" height="20">&nbsp;
                <strong style="font-size: 17px;padding: 5px;">Hotline</strong> :<span style="font-size: 140%; color: #ed1c24;">
                    <strong>&nbsp;<a href="tel:01694142008" style="color : white;font-size: 15px;">0169.404.5475</a></strong></span>
            </li>
            <li class="html custom html_top_right_text">
                <div class="company uk-hidden-small" style="width: 518px;">
                    <h2 class="title">Chuyên sỉ lẻ các loại quần áo, giá cả hợp lý </h2>
                    <h3 class="subtitle">60 Thịnh Quang, Đống Đa, HN</h3>
                </div>
            </li>
        </ul>
    </div>
    <!-- inner -->
</div>
<!-- #mobile-menu -->
<div id="login-form-popup" class="lightbox-content mfp-hide">
    <!--    <div class="my-account-header page-title normal-title">
            <div class="page-title-inner flex-row  container">
                <div class="flex-col flex-grow medium-text-center">
                    <div class="text-center social-login">
                        <a href="http://linhshop.com.vn/wp-login.php?loginFacebook=1&redirect=http://linhshop.com.vn/"
                           class="button social-button large facebook circle"
                           onclick="window.location = 'http://linhshop.com.vn/wp-login.php?loginFacebook=1&redirect=' + window.location.href; return false;"><i class="icon-facebook"></i>
                            <span>Login with <strong>Facebook</strong></span></a>
                        <a class="button social-button large google-plus circle"
                           href="http://linhshop.com.vn/wp-login.php?loginGoogle=1&redirect=http://linhshop.com.vn/"
                           onclick="window.location = 'http://linhshop.com.vn/wp-login.php?loginGoogle=1&redirect=' + window.location.href; return false;">
                            <i class="icon-google-plus"></i>
                            <span>Login with <strong>Google</strong></span></a>
                    </div>
                </div> .flex-left 
            </div> flex-row 
        </div> .page-title -->
    <div class="account-container lightbox-inner">
        <div class="col2-set row row-divided row-large" id="customer_login">
            <!--<div class="col-1 large-6 col pb-0">-->
            <div class="account-login-inner">
                <h3 class="uppercase">Đăng nhập</h3>
                <form method="post" class="login">
                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label for="phone">Số điện thoại <span class="required">*</span>
                        </label>
                        <input type="number" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="phone" />
                    </p>
                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label for="password">Mật khẩu <span class="required">*</span>
                        </label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
                    </p>
                    <p class="form-row">
                        <input type="submit" formaction="<?php echo Helper::getPermalink('auth/login') ?>" class=" button" name="login" value="Đăng nhập" />
                        <input type="submit" formaction="<?php echo Helper::getPermalink('auth/register') ?>" class="btn-primary button" name="register" value="Đăng ký" />
                    </p>
                    <p class="lost_password">
                        <a href="<?php echo Helper::getPermalink('post/lien-he') ?>/lost-password/">Quên mật khẩu?</a>
                    </p>
                </form>
            </div>
            <!-- .login-inner -->


        </div>
        <!-- .row -->

    </div>
    <!-- .account-login-container -->

</div>
<!--<script type='text/javascript' src='http://linhshop.com.vn/wp-content/themes/flatsome/inc/extensions/flatsome-live-search/flatsome-live-search.js?ver=3.3.6'></script>-->
<script>
    var link_remove_cart = '<?php echo Helper::getPermalink('
    cart / del / ') ?>'
</script>
<script type='text/javascript' src='<?php echo SITE_ROOT ?>public/js/hoverIntent.min.js?ver=1.8.1'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var flatsomeVars = {
        "ajaxurl": "<?php echo SITE_ROOT ?>\/wp-admin\/admin-ajax.php",
        "rtl": "",
        "sticky_height": "86"
    };
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo SITE_ROOT ?>public/js/flatsome.js?ver=3.3.6'></script>
<!--<script type='text/javascript' src='<?php echo SITE_ROOT ?>public/js/woocommerce.js?ver=3.3.6'></script>-->
<!--<script type='text/javascript' src='http://linhshop.com.vn/wp-includes/js/wp-embed.min.js?ver=4.8'></script>-->

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?php echo SITE_ROOT ?>public/js/main.js"></script>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=1801390760137659';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>

</html>