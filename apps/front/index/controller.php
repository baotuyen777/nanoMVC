<?php

class IndexController extends Controller {

    function __construct() {
        parent::__construct('admin', 'index');
    }
    function index() {
        $result = array(
            "status" => true,
            "message" => "WellCome to NANO MVC!"
        );
        echo json_encode($result);
    }
}

?>