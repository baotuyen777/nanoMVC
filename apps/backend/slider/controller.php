<?php

class SliderController extends Controller {

//    protected $object = 'slider';

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

//    function all() {
//        $postPerPage = 3;
//        $page = isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1;
//
//        $total = count($this->model->getAll());
//
//        $start = ($page - 1) * $postPerPage;
//        $countPage = ceil($total / $postPerPage);
//        $params = array(
//            'filter' => isset($_REQUEST['filter']) ? filter_var($_REQUEST['filter'], FILTER_SANITIZE_STRING) : "",
//            'start' => $start,
//            'postPerPage' => $postPerPage
//        );
//        $this->view->page = $page;
//        $this->view->countPage = $countPage;
//        $this->view->arrAll = $this->model->getAllPagination($params);
//        $this->view->loadView('index');
//    }

}
