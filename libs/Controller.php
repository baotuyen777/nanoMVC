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
    }

    function loadModule($action, $param = '') {

        $classColtroller = $this->module . "Controller";
        $this->controller = new $classColtroller($this->app, $this->module);
        $this->loadAction($action, $param);
        $this->loadModel($this->module, $this->app);
    }

    public function loadAction($action, $param = '') {
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
