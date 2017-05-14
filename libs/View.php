<?php

abstract class View {

    /** @var \Model */
    public $model;

    /** @var \result */
    public $result;

    /** @var \token */
    public $token;

    /** @var \requireFields */
    public $requireFields = array();

    function __construct() {
        $this->result = array(
            "status" => false,
            "message" => "Something wrong!"
        );
    }

    /**
     * @function \loadModel
     */
   


}

?>
