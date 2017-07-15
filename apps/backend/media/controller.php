<?php

class mediaController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    public function srv_all($page) {
        $postPerPage = 12;
//        $page = isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1;

        $total = count($this->model->getAll());

        $start = ($page - 1) * $postPerPage;
        $countPage = ceil($total / $postPerPage);
        $params = array(
            'filter' => isset($_REQUEST['filter']) ? filter_var($_REQUEST['filter'], FILTER_SANITIZE_STRING) : "",
            'start' => $start,
            'postPerPage' => $postPerPage
        );
        $result = array(
            'status' => True,
            'page' => $page,
            'total' => $countPage,
            'data' => $this->model->getAllPagination($params),
        );
        $this->loadJson($result);
    }

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
                    'name' => '"' . $filename . '"',
                    'image' => '"' . $filename . '"',
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

    function delete() {

        $status = false;
        $mes = "something wrong, please contact admin!";
        if ($_POST && $_POST['listId']) {
            $listId = $_POST['listId'];
            $this->deleteFile($listId);
            if ($this->model->delete($listId)) {
                $status = true;
                $mes = "delete success";
            }
            $this->view->status = $status;
            $this->view->mes = $mes;
        } else {
            $mes = "You must be choose some item !";
        }

        $result = array(
            'status' => $status,
            'mes' => $mes
        );
        $this->loadJson($result);
    }

    function deleteFile($listId) {
        $arrId = explode(',', $listId);
        foreach ($arrId as $id) {
            $obj = $this->model->getSingle($id);
            if ($obj && $obj->image) {
                if (file_exists(UPLOAD_DIR . $obj->image)) {
                    unlink(UPLOAD_DIR . $obj->image);
                }
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

}
