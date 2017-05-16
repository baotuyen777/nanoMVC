<?php

class IndexController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function index() {
        $this->view->msg = '11111';
        $this->view->loadView('index');
    }

}

?>