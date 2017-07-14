<?php
/*
  Plugin Name: Qsoft form wp
  Plugin URI: http://example.com
  Description: Simple form wp
  Version: 1.0
  Author: Michael7, Alfred
  Author URI: http://google.com
 */
define('DIR_PATH', dirname(__FILE__));
define('PLUGIN_URL', plugins_url('qsoft-form'));
define('LINK_UPLOAD', PLUGIN_URL.'/upload/');
require_once 'init.php';
require_once 'inc/metabox.php';
require_once 'backend.php';
require_once 'qform-ajax.php';


function qsoft_form_shortcode($arg) {
    ob_start();
    $form = get_post($arg['id']);
    ?>
    <div class="notice"></div>
    <form action="<?php echo get_site_url()?>/wp-admin/admin-ajax.php?action=add_transfer" method="post" id="qform" class="qform form-horizontal" enctype="multipart/form-data">
        <input name="form_id" value="<?php echo $form->ID?>" type="hidden">
        <?php
        echo $form->post_content;
        ?>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('qform', 'qsoft_form_shortcode');

function my_scripts_method() {
    wp_enqueue_style('bootstrap', PLUGIN_URL . '/css/bootstrap.min.css');
    wp_enqueue_style('qform-css', PLUGIN_URL . '/css/qform.css');
    wp_enqueue_script('jquery', PLUGIN_URL . '/js/jquery.js', array(),'',true);
    wp_enqueue_script('qsoft-js', PLUGIN_URL . '/js/qsoft-js.js', array(),'',true);
    wp_enqueue_script('qsoft-js-validate', PLUGIN_URL . '/js/jquery.validate.min.js', array('jquery'),'',true);
}

add_action('wp_enqueue_scripts', 'my_scripts_method');

function load_custom_wp_admin_style() {
    wp_enqueue_style('dataTables', PLUGIN_URL . '/css/jquery.dataTables.min.css');
    wp_enqueue_script('jquery', PLUGIN_URL . '/js/jquery.js', array('jquery'));

    wp_enqueue_script('qsoft_js_backend', PLUGIN_URL . '/js/qsoft_js_backend.js', array('jquery'));
    wp_enqueue_script('dataTables', PLUGIN_URL . '/js/jquery.dataTables.min.js', array('jquery'));
    wp_enqueue_style('qform_backend', PLUGIN_URL . '/css/qform_backend.css');
}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');
