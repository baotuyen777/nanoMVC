<?php

class initController extends Controller {

    function __construct($app, $module, $action = 'index') {
        parent::__construct($app, $module, $action);
    }

    function index() {
       
        $status = true;
        if (!$this->model->createProduct()) {
            $status = false;
        }
        if (!$this->model->createOrder()) {
            $status = false;
        }
        if (!$this->model->createOrderDetail()) {
            $status = false;
        }
        if (!$this->model->createUser()) {
            $status = false;
        }
         if (!$this->model->createDate()) {
            $status = false;
        }
    }

}

?>