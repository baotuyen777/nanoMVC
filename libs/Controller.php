<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class Controller {

    /** @var \Model */
    public $model;

    /** @var \result */
    public $result;

    /** @var \token */
    public $token;

    /** @var \requireFields */
    public $requireFields = array();

    function __construct() {
//        $this->result = array(
//            "status" => false,
//            "message" => "Something wrong!"
//        );
      
        
//        $this->loadView($action);
    }
//    function loadModule($app,$module,$action){
//        $this->loadModel($app, $module);
//        $this->loadView($action);
//    }

    /**
     * @function \loadModel
     */
    public function loadModel($app,$module) {
        $this->app=$app;
        $this->module=$module;
        $path = 'apps/' . $this->app . '/' . $this->module . '/model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $module . 'Model';
            $this->model = new $modelName();
        }
        
    }

    /**
     * 
     * @param type $action
     */
    public function loadView($action) {
        $path = 'apps/' .  $this->app . '/' . $this->module . '/view/'.$action.'.php';
        var_dump($path);
        if (file_exists($path)) {
            require 'layout/Header.php';
            require $path;
            require 'layout/Footer.php';
        }
    }


}

?>
