<?php

class mediaController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

//    public function all() {
////        $upload_handler = new UploadHandler();
//        $this->view->loadView('index');
//    }

    public function upload() {
        $status = TRUE;
        if ($_FILES['file']) {
            $file_ary = $this->reArrayFiles($_FILES['file']);

            $arrMultiRow = array();
            foreach ($file_ary as $file) {
                $tmp_file = $file['tmp_name'];
                $filename = $file['name'];
//                $arr_attach_file[] = SERVER_ROOT . 'public/img/upload/' . $filename;

                move_uploaded_file($tmp_file, SERVER_ROOT . 'public/img/upload/' . $filename);
                $arrMultiRow[] = array(
                    'name' => '"'.$filename.'"',
                    'image' => '"'.$filename.'"',
                );
            }

            $this->model->addMulti($arrMultiRow);
//            $arr_file_name_srl = serialize($arr_file_name);

            $mes = 'upload success';

//        $wpdb->insert($wpdb->prefix . 'qsoft_form', $data);
        }
        header('Content-Type: application/json');
        echo json_encode(array(
            'status' => $status,
            'mes' => $mes
        ));
        //send mail
//    deliver_mail($form_id, $arr_attach_file);
//        $wpdb->insert($wpdb->prefix . 'qsoft_form_st', array('submit_time' => $_SERVER['REQUEST_TIME']));
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

}
