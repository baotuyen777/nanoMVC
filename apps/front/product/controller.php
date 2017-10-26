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

    function cat($slug) {
        $postPerPage = 12;
        $page = isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1;
        $catModel = $this->loadModel('productcat');
        $cat = $catModel->getBySlug($slug);
        $arrMulti = FALSE;
        if ($cat) {
            $total = count($this->model->getAll('Where O.cat_id=' . $cat->id));
            $start = ($page - 1) * $postPerPage;
            $countPage = ceil($total / $postPerPage);
            $params = array(
                'filter' => isset($_REQUEST['filter']) ? filter_var($_REQUEST['filter'], FILTER_SANITIZE_STRING) : "",
                'start' => $start,
                'postPerPage' => $postPerPage
            );
            $arrMulti = $this->model->getAllPagination($params);
            $slug = $cat->name;
            $this->view->page = $page;
            $this->view->countPage = $countPage;
        }
        $this->view->arrMulti = $arrMulti;
        $this->view->title = $slug;
        $this->view->loadView('list');
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
        $this->view->arrMulti = $this->model->getAllPagination($params);
        $this->view->title = "Sản phẩm mới";
        $this->view->loadView('list');
    }

    function hot() {
        $postPerPage = 12;
        $page = isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1;

        $total = count($this->model->getAll('Where O.is_hot=1'));
        $start = ($page - 1) * $postPerPage;
        $countPage = ceil($total / $postPerPage);
        $params = array(
            'cond' => 'And O.is_hot=1',
            'start' => $start,
            'postPerPage' => $postPerPage
        );

        $this->view->page = $page;
        $this->view->countPage = $countPage;
        $this->view->arrMulti = $this->model->getAllPagination($params);
        $this->view->title = "Sản phẩm bán chạy";
        $this->view->loadView('list');
    }

    function all() {

        $postPerPage = 15;
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
        $this->view->arrMulti = $this->model->getAllPagination($params);
        $this->view->title = "Sản phẩm";
        $this->view->loadView('list');
    }

    function detail($id) {
        $arrSingle = $this->model->getSingle($id);
        $this->view->arrSingle = $arrSingle;
        $this->view->arrSlider = $this->model->getProductSlide($id);
        if ($arrSingle)
            $this->view->arrProductRelated = $this->model->getRetated($id, $arrSingle->cat_id);
        $this->view->loadView('detail');
    }

    function loop($arrProduct) {
        $this->view->arrProduct = $arrProduct;
        $this->view->customView('loop');
    }

}

?>