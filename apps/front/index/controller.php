<?php

class IndexController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function index($id) {
        $productModel = $this->loadModel('product');

        $this->view->arrProductHot = $productModel->getHot();
        $this->view->arrProductNew = $productModel->getNew();
        $this->view->arrSlider = $this->model->getSlider();
        $this->view->loadView('index');
    }

    function menu() {
        $productcatModel=$this->loadModel('productcat');
        $arrProductCat=$productcatModel->getAll();
        $this->view->arrProductCat=$arrProductCat;
        $this->view->customView('menu');
    }

}

?>