<?php

class pageController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }
    function index($slug){
        $this->detail($slug);
    }

    function contact($slug) {
        $this->view->loadView('contact');
    }
    function sale($slug) {
        $this->view->loadView('contact');
    }

}
