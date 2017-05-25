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
            require SERVER_ROOT . 'layout/Header.php';
            require $path;
            require SERVER_ROOT . 'layout/Footer.php';
        }
    }

}
