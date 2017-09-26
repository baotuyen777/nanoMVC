<?php

class View {

    function __construct($app = 'front', $module = 'index') {
        $this->app = $app;
        $this->module = $module;
    }

    /**
     * 
     * @param type $action
     */
    public function loadView($action) {
        $path = SERVER_ROOT . 'apps/' . $this->app . '/' . $this->module . '/view/' . $action . '.php';
        if (file_exists($path)) {
            require SERVER_ROOT . 'layout/' . $this->app . '/Header.php';
            require $path;
            require SERVER_ROOT . 'layout/' . $this->app . '/Footer.php';
        }
    }

    /**
     * 
     * @param type $action
     */
    public function customView($action) {
        $path = SERVER_ROOT . 'apps/' . $this->app . '/' . $this->module . '/view/' . $action . '.php';
        if (file_exists($path)) {
            require $path;
        }
    }

    function loadModule($module) {
        $file = 'apps/' . $this->app . '/' . $module . '/controller.php';
        if (file_exists($file)) {
            require_once $file;
            $controllerName = $module . 'Controller';
            $controller = new $controllerName($this->app, $module);
            return $controller;
        }
        return FALSE;
    }

}
