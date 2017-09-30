<ul class="nav header-nav header-bottom-nav nav-left  nav-divided nav-size-medium nav-spacing-xlarge nav-uppercase">
    <li id="menu-item-338" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-96 current_page_item active  menu-item-338">
        <a href="<?php echo SITE_ROOT ?>" class="nav-top-link">Trang Chủ</a>
    </li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page">
        <a href="<?php echo Helper::getPermalink('post/detail/gioi-thieu') ?>" class="nav-top-link">Giới Thiệu</a></li>
    <li id="menu-item-538" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-538 has-dropdown">
        <a href="<?php echo Helper::getPermalink('product') ?>" class="nav-top-link">SẢN PHẨM<i class="icon-angle-down" ></i></a>
        <ul class='nav-dropdown nav-dropdown-simple'>
            <?php 
            foreach ($this->arrProductCat as $cat):?>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat">
                    <a href="<?php echo Helper::getPermalink('product/cat/' . $cat->slug) ?>"><?php echo $cat->name ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li id="menu-item-1310" class="menu-item menu-item-type-post_type menu-item-object-page ">
        <a href="<?php echo Helper::getPermalink('post/detail/khuyen-mai') ?>" class="nav-top-link">Khuyến Mãi</a></li>
    <li id="menu-item-339" class="menu-item menu-item-type-post_type menu-item-object-page">
        <a href="<?php echo Helper::getPermalink('post/detail/lien-he') ?>" class="nav-top-link">Liên hệ</a></li>
</ul>