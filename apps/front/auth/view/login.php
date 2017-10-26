<main class="container">
    <div class="account-login-inner">
        <h3 class="uppercase">Đăng nhập</h3>
        <div class="mes">
            <?php echo $this->mes ?>
        </div>
        <form method="post" class="login">
            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                <label for="phone">Số điện thoại <span class="required">*</span></label>
                <input type="number" class="woocommerce-Input woocommerce-Input--text input-text" 
                       name="phone" id="phone"  />
            </p>
            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                <label for="password">Mật khẩu <span class="required">*</span></label>
                <input class="woocommerce-Input woocommerce-Input--text input-text" 
                       type="password" name="password" id="password" />
            </p>
            <p class="form-row">
                <input type="submit" formaction="<?php echo Helper::getPermalink('auth/login') ?>" class=" button" name="login" value="Đăng nhập" />
                <input type="submit" formaction="<?php echo Helper::getPermalink('auth/register') ?>" class="btn-primary button" name="register" value="Đăng ký" />
            </p>
            <p class="lost_password">
                <a href="<?php echo Helper::getPermalink('post/lien-he') ?>/lost-password/">Quên mật khẩu?</a>
            </p>
        </form>
    </div><!-- .login-inner -->
</main>