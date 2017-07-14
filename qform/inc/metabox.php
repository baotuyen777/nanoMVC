<?php

function mail_meta_box() {
    add_meta_box('thong-tin', 'Mail info', 'mail_input', 'qform', 'normal', 'high');
}

add_action('add_meta_boxes', 'mail_meta_box');

/**
  Khai báo callback
 * */
function mail_input($post) {
    ?>
    <table boder="0" id="mail_config">
        <tr>
            <td><label for="send_to">To: </label></td>
            <td><input type="text" id="send_to" name="send_to" 
                       value="<?php echo esc_attr(get_post_meta($post->ID, '_send_to', true)) ?>" /></td>
        </tr>
        <tr>
            <td><label for="send_from">From: </label></td>
            <td><input type="text" id="send_from" name="send_from" 
                       value="<?php echo esc_attr(get_post_meta($post->ID, '_send_from', true)) ?>" /></td>
        </tr>
        <tr>
            <td><label for="send_from">Name: </label></td>
            <td><input type="text" id="send_name" name="send_name" 
                       value="<?php echo esc_attr(get_post_meta($post->ID, '_send_name', true)) ?>" /></td>
        </tr>
        <tr>
            <td><label for="mail_subject">Subject: </label></td>
            <td><input type="text" id="mail_subject" name="mail_subject" 
                       value="<?php echo esc_attr(get_post_meta($post->ID, '_mail_subject', true)) ?>" /></td>
        </tr>
        <tr>
            <td><label for="mail_content">Content: </label></td>
            <td><textarea type="text" id="mail_content" name="mail_content" rows="10"
                          ><?php echo esc_attr(get_post_meta($post->ID, '_mail_content', true)) ?></textarea>
            </td>
        </tr>
    </table>

    <?php
}

/**
  Lưu dữ liệu meta box khi nhập vào
  @param post_id là ID của post hiện tại
 * */
function save_mail_info($post_id) {
    if ($_POST) {
        update_post_meta($post_id, '_send_to', sanitize_text_field($_POST['send_to']));
        update_post_meta($post_id, '_send_from', sanitize_text_field($_POST['send_from']));
        update_post_meta($post_id, '_send_name', sanitize_text_field($_POST['send_name']));
        update_post_meta($post_id, '_mail_subject', sanitize_text_field($_POST['mail_subject']));
        update_post_meta($post_id, '_mail_content', ($_POST['mail_content']));
    }
}

add_action('save_post', 'save_mail_info');

