<?php

class postController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }
    function index($slug){
        $this->detail($slug);
    }

    function detail($slug) {
        $obj = $this->model->get_by_slug($slug);
        $this->view->obj = $obj;
        $this->view->loadView('detail');
    }

}
