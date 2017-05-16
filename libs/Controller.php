<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller {

    /** @var \Model */
    public $model;

    /** @var \view */
    public $view;

    function __construct($app, $module) {
        $this->app = $app;
        $this->module = $module;
        $this->view = new View($app, $module);
        $this->loadModel($this->module, $this->app);
    }

//    function loadModule($action, $param = '') {
//
//        $this->loadAction($action, $param);
//    }

    public function loadAction($action, $param = '') {
        $classColtroller = $this->module . "Controller";
        $this->controller = new $classColtroller($this->app, $this->module);
        if (method_exists($this->controller, $action)) {
            $this->controller->$action($param);
        } else {
            $this->error();
        }
    }

    /**
     * @function \loadModel
     */
    public function loadModel($module, $app = 'front') {
        $path = 'apps/' . $app . '/' . $module . '/model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $module . 'Model';
            $this->model = new $modelName();
        }
    }

    /**
     * 
     * @return boolean
     */
    function error() {
        require 'apps/front/error/controller.php';
        new errorController();
        return FALSE;
    }

}

?>
