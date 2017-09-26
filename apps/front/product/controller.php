<?php

class ProductController extends Controller {

//    public $auth;

    function __construct($app, $module, $action = 'index') {
        parent::__construct($app, $module, $action);
    }

    function index($id) {
        if ($id) {
            $this->detail($id);
        } else {
            $this->all();
        }
    }

    function news() {
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
        $this->view->arrMulti = $this->model->getAll($params);
        $this->view->title = "Sản phẩm mới";
        $this->view->loadView('list');
    }

    function all() {

        $arrAllData = $this->model->getAll();
        $params = array(
            'postPerPage' => isset($_REQUEST['postPerPage']) ? filter_var($_REQUEST['postPerPage'], FILTER_SANITIZE_STRING) : 10,
            'filter' => isset($_REQUEST['filter']) ? filter_var($_REQUEST['filter'], FILTER_SANITIZE_STRING) : "",
            'page' => isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1,
            'total' => count($arrAllData)
        );

        $arrAllDataPagination = $this->model->getAll($params);
        $result = array(
            "status" => true,
            'data' => $arrAllDataPagination,
        );
        $result = array_merge($params, $result);
        $this->showJson($result);
    }

    function detail($id) {
        $arrSingle = $this->model->getSingle($id);
        $this->view->arrSingle = $arrSingle;
        $this->view->arrSlider = $this->model->getProductSlide($id);
        $this->view->arrProductRelated = $this->model->getRetated($id, $arrSingle->cat_id);
        $this->view->loadView('detail');
    }

    function loop($arrProduct) {
        $this->view->arrProduct = $arrProduct;
        $this->view->customView('loop');
    }

}

?>