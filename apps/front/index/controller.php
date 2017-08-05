<?php

class IndexController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function index($id) {
        $productModel = $this->loadModel('product');
        $this->view->arrHot = $productModel->getHot();
        $this->view->arrSlider = $this->model->getSlider();
        $this->view->loadView('index');
    }

}

?>