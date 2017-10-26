<?php

class ordersController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function all() {

        $postPerPage = 12;
        $page = isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1;

        $total = count($this->model->getAll());

        $start = ($page - 1) * $postPerPage;
        $countPage = ceil($total / $postPerPage);
        $params = array(
            'filter' => isset($_REQUEST['filter']) ? filter_var($_REQUEST['filter'], FILTER_SANITIZE_STRING) : "",
            'start' => $start,
            'postPerPage' => $postPerPage
        );

        $this->view->page = $page;
        $this->view->countPage = $countPage;
        $this->view->arrAll = $this->model->getAllPagination($params);
        $this->view->model = $this->model;
        $this->view->loadView('index');
    }

    function showOrderDetail($orderId) {
        $this->view->arrMulti = $this->model->getOrderDetail($orderId);
        $this->view->customView('order_detail');
    }

//    function detail($id) {
//        if ($id) {
//            $arrSingle = $this->model->getSingle(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
//        } else {
//            $arrSingle = $this->model;
//        }
//        $this->view->arrSingle = $arrSingle;
//        $this->view->loadView('detail');
//    }
    function detail($id) {
        $this->view->arrSingle = $this->model->getSingle($id);
        $this->view->arrOrderDetail = $this->model->getOrderDetail($id);
        $this->view->loadView('detail');
    }
}
