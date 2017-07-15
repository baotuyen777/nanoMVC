<?php

class productController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function detail($id) {
        if ($id) {
            $arrSingle = $this->model->getSingle(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
        } else {
            $arrSingle = $this->model;
        }
//        $mediaModel = $this->loadModel('backend', 'media');
//        $arrMultiMedia=$mediaModel->getAllPagination();
        $this->view->arrSingle = $arrSingle;
        $this->view->loadView('detail');
    }

}
