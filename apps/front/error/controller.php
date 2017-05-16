<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class errorController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);

        $result = array(
            "status" => false,
            "message" => "URL not found"
        );
    }

    function index() {
        $this->view->loadView('index');
    }

}

?>
