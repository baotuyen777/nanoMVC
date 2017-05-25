<?php

class Controller {

    /** @var \model */
    public $model;

    /** @var \view */
    public $view;

    function __construct($app, $module, $action = 'index') {
        $this->app = $app;
        $this->module = $module;
        $this->view = new View($app, $module, $action);
        $this->model = $this->loadModel($app, $module);
    }

//    public function loadAction($action, $param = '') {
//        $classColtroller = $this->module . "Controller";
//        $this->controller = new $classColtroller($this->app, $this->module);
//        if (method_exists($this->controller, $action)) {
//            $this->controller->$action($param);
//        } else {
//            $this->error();
//        }
//    }

    /**
     * @function \loadModel
     */
    public function loadModel($app, $module = 'index') {
        $path = 'apps/' . $app . '/' . $module . '/model.php';
        if (file_exists($path)) {

            require_once $path;
            $modelName = $module . 'Model';
            $model = new $modelName();
            return $model;
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
