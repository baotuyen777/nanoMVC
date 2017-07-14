<?php
/*
  Plugin URI:
  Description: Easy manage contact form with flexible HTML
  Author: Anhnv | Tuyenbv
  Author URI:
  Version: 1.0
 */


add_action('init', 'create_qform');

function create_qform() {
    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('qManage Form', 'Post Type Manage Form', 'qsoft'),
        'singular_name' => _x('qManage Form', 'Post Type Manage Form', 'qsoft'),
        'menu_name' => __('qManage Form', 'qsoft'),
        'parent_item_colon' => __('Parent qManage Form', 'qsoft'),
        'all_items' => __('All qManage Form', 'qsoft'),
        'view_item' => __('View qManage Form', 'qsoft'),
        'add_new_item' => __('Add New qManage Form', 'qsoft'),
        'add_new' => __('Add New', 'qsoft'),
        'edit_item' => __('Edit qManage Form', 'qsoft'),
        'update_item' => __('Update qManage Form', 'qsoft'),
        'search_items' => __('Search qManage Form', 'qsoft'),
        'not_found' => __('Not Found', 'qsoft'),
        'not_found_in_trash' => __('Not found in Trash', 'qsoft'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('qform', 'qsoft'),
        'description' => __('News and reviews', 'qsoft'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'thumbnail'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'post_tag', 'equipment_category' ),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-feedback',
    );

    // Registering your Custom Post Type
    register_post_type('qform', $args);
}

function add_new_qform_columns($new_columns) {
    $new_columns['shortcode'] = __('Shortcode');
    return $new_columns;
}

// Add to admin_init function
add_filter('manage_qform_posts_columns', 'add_new_qform_columns');

function custom_qform_column($new_columns, $id) {
    switch ($new_columns) {

        case 'shortcode' :

            echo "[qform id=$id]";

            break;
    }
    return;
}

add_action('manage_qform_posts_custom_column', 'custom_qform_column', 5, 2);
add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
    add_submenu_page('edit.php?post_type=qform', __('Submission', 'menu-submission'), __('Submission', 'menu-submission'), 'manage_options', 'menu-submission', 'menu_submission');
}

function menu_submission() {
    global $wpdb;
    $args = array('posts_per_page' => -1, 'post_type' => 'qform');
    $arr_all_form = get_posts($args);
    $form_id = isset($_GET['form_id']) ? $_GET['form_id'] : FALSE;
    ?>
    <section id="qform_wrap">
        <select onchange="changeForm(this)">
            <option class="first_select" value="">Choose form</option>
            <?php
            foreach ($arr_all_form as $arr_single_form):
                $selected = $form_id == $arr_single_form->ID ? 'selected' : ''
                ?>
                <option <?php echo $selected ?> value="<?php echo $arr_single_form->ID ?>"><?php echo $arr_single_form->post_title ?></option>
            <?php endforeach; ?>
        </select>
        <button type="button" onclick="qform_delete('<?php echo get_site_url() . '/wp-admin/admin-ajax.php?action=qform_delete' ?>')">Delete</button>
        <hr/>
        <div class="notice"></div>
        <?php
        $sub_filter_form = $form_id ? ' AND form_id=' . $form_id : '';
        $arr_submit_time = $wpdb->get_col("SELECT DISTINCT submit_time FROM " . $wpdb->prefix . "qsoft_form WHERE 1=1 " . $sub_filter_form);
//    echo $wpdb->last_query;
        $arr_field_name = $wpdb->get_col("SELECT DISTINCT field_name FROM " . $wpdb->prefix . "qsoft_form WHERE 1=1 " . $sub_filter_form);
        if ($form_id):
            if (!empty($arr_submit_time)):
                ?>
                <table  id="qform_table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id='select_all'></th>
                            <th>Submited</th>

                            <?php
                            foreach ($arr_field_name as $field_name) {
                                ?>
                                <th><?php echo $field_name; ?></th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($arr_submit_time as $submit_time) {
                            ?>
                            <tr>
                                <th><input type="checkbox" name="ick[]" id="ick_<?php echo $submit_time ?>" class="ick" value="<?php echo $submit_time ?>" ></th>
                                <td><?php echo date('d/m/Y H:m:i', $submit_time) ?></td>

                                <?php
                                $arr_single_submited = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "qsoft_form WHERE submit_time=" . $submit_time . $sub_filter_form);

                                $new_arr = array();
                                foreach ($arr_single_submited as $arr_single_field) {
                                    $new_arr[$arr_single_field->field_name] = $arr_single_field;
                                }
                                foreach ($arr_field_name as $field_name) {
                                    if (isset($new_arr[$field_name])) {
                                        ?>
                                        <td><?php
                        if ($field_name == 'file') {
                            foreach (unserialize($new_arr[$field_name]->field_value) as $img_name) {
                                                ?>
                                                    <a href="<?php echo LINK_UPLOAD.$img_name ?>" target="_blank">
                                                        <?php echo $img_name ?>
                                                    </a><hr/>
                                                    <?php
                                                }
                                            } else {
                                                echo($new_arr[$field_name]->field_value);
                                            }
                                            ?></td>
                                    <?php } else { ?>
                                        <td></td>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <?php
            endif;
        endif;
        ?>
    </section>
    <?php
}

function qform_delete() {
    global $wpdb;
    $arr_id = explode(',', $_POST['data']);
    foreach ($arr_id as $id) {
        $wpdb->delete($wpdb->prefix . 'qsoft_form', array('submit_time' => $id));
    }
    echo $wpdb->last_query;
}

add_action('wp_ajax_qform_delete', 'qform_delete');

function output_shortcode_form($id) {
    return "foo = {$atts['foo']}";
}

add_shortcode('footag', 'footag_func');
?>