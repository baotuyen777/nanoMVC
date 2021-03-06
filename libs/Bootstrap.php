<?php

class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? filter_var($_GET['url'], FILTER_SANITIZE_STRING) : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        /**  run default */
        if (!$url[0]) {
            $url = array('index');
        }
        $this->loadModule($url);
    }

    function loadModule($url) {

        //find module in common
        $app = 'front';
        $module = 'index';
        $file = 'apps/' . $app . '/' . $url[0] . '/controller.php';
        $param = '';
        if (file_exists($file)) {
            require $file;
            $module = $url[0];
            $classColtroller = $module . "Controller";
            $controller = new $classColtroller($app, $module);
            $action = 'index';
            if (isset($url[1])) {
                $param = $url[1];
                if (method_exists($controller, $url[1])) {
                    $action = $url[1];
                    $param = isset($url[2]) ? $url[2] : false;
                }
            }
        } else {
            // find module in other apps
            if (isset($url[1])) {
                $file = 'apps/' . $url[0] . '/' . $url[1] . '/controller.php';
                if (file_exists($file)) {
                    require $file;
                    $app = $url[0];
                    $module = $url[1];

                    $action = isset($url[2]) ? $url[2] : false;
                    if ($action > 0) {
                        $param = $action;
                        $action = 'index';
                    } else {
                        $param = isset($url[3]) ? $url[3] : false;
                    }
                } else {
                    $this->error('File not found');
                    return;
                }
            } else {
                $this->error();
                return;
            }
        }
        $classColtroller = $module . "Controller";
        $controller = new $classColtroller($app, $module);
        $this->loadMethod($controller, $action, $param);
    }

    /**
     * 
     * @param type $controller
     * @param type $action
     * @param type $param
     */
    function loadMethod($controller, $action, $param) {
        if (!$action) {
            if (method_exists($controller, 'index')) {
                $controller->index($param);
            } else {
                $this->error();
            }
        } else {
            if (method_exists($controller, $action)) {
                //calling method no param
                if (isset($param)) {
                    $controller->$action($param);
                    return true;
                }
                $controller->$action();
            } else {
                $this->error();
            }
        }
    }

    function error($error = 'URL not found') {
        echo $error;
        return FALSE;
    }

}
