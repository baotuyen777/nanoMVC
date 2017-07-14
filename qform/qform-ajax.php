<?php

error_reporting(E_ALL);
add_action('wp_ajax_add_transfer', 'process_add_transfer');

function process_add_transfer() {
    if (!empty($_POST['qform'])) {
        global $wpdb;
        $form_id = $_POST['form_id'];
        $arr_all_data = $_POST['qform'];
        foreach ($arr_all_data as $k => $v) {
            $data = array(
                'submit_time' => $_SERVER['REQUEST_TIME'],
                'user_id' => get_current_user_id(),
                'form_id' => $form_id,
                'field_name' => $k,
                'field_value' => $v,
            );
            $wpdb->insert($wpdb->prefix . 'qsoft_form', $data);
        }
        if ($_FILES['file']) {
            $file_ary = reArrayFiles($_FILES['file']);
            $arr_file_name = array();
            $arr_attach_file = array();
            foreach ($file_ary as $file) {
                $tmp_file = $file['tmp_name'];
                $filename = $file['name'];
                $arr_file_name[] = $filename;
                $arr_attach_file[] = DIR_PATH . '/upload/' . $filename;
                move_uploaded_file($tmp_file, DIR_PATH . '/upload/' . $filename);
            }
            $arr_file_name_srl = serialize($arr_file_name);
            $data = array(
                'submit_time' => $_SERVER['REQUEST_TIME'],
                'user_id' => get_current_user_id(),
                'form_id' => $form_id,
                'field_name' => 'file',
                'field_value' => $arr_file_name_srl,
            );
            $wpdb->insert($wpdb->prefix . 'qsoft_form', $data);
        }
        //send mail
        deliver_mail($form_id, $arr_attach_file);
//        $wpdb->insert($wpdb->prefix . 'qsoft_form_st', array('submit_time' => $_SERVER['REQUEST_TIME']));
    }
}

function get_field_mail($form_id, $field, $get_post) {
    $config_field = get_post_meta($form_id, $field, true);
    $pattern = '/(\[)([0-9A-Za-z]+)(\])/i';
    preg_match_all($pattern, $config_field, $item);
    $arrayReplace = [];
    foreach ($item[2] as $value) {
        $arrayReplace[] = $get_post[$value];
    }
    $fields = str_replace($item[0], $arrayReplace, $config_field);
    return $fields;
}

function deliver_mail($form_id, $arr_attach_file) {
    if (isset($_POST['qform_submit'])) {
        $to = get_field_mail($form_id, '_send_to',$_POST['qform']);
        $from = get_field_mail($form_id, '_send_from',$_POST['qform']);
        $subject = get_field_mail($form_id, '_mail_subject',$_POST['qform']);
        var_dump($subject);
        $message = get_field_mail($form_id, '_mail_content', $_POST['qform']);
        $name =    get_field_mail($form_id, '_send_name',$_POST['qform']);
        $headers = "From: $name <$from>" . "\r\n";
        if (wp_mail($to, $subject, $message, $headers, $arr_attach_file)) {
            echo 'sent mall success';
        } else {
            echo 'An unexpected error occurred';
        }
    }
}

function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}
