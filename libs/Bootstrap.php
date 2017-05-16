<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? filter_var($_GET['url'], FILTER_SANITIZE_STRING) : null;

        $url = rtrim($url, '/');
        $url = explode('/', $url);
        /**  run default */
        if (!$url[0]) {
            $url = array('index');
        }
//        var_dump($url[0]);die;
//        if ($url[0]=='public') {
//            return ;
//        }

        $this->loadModule($url);
    }

    function loadModule($url) {
        //find module in common
        $app = 'front';
        $file = 'apps/' . $app . '/' . $url[0] . '/controller.php';
        if (file_exists($file)) {
            require $file;
            $module = $url[0];

            $action = isset($url[1]) ? $url[1] : 'index';

            if ($action > 0) {
                $param = $action;
                $action = 'index';
            } else {
                $param = isset($url[2]) ? $url[2] : false;
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
                }
            } else {
                $this->error();
                return;
            }
        }
//        var_dump($file);die;
//        $classColtroller = $module . "Controller";
        $controller = new Controller($app, $module);
        $controller->loadModule($action, $param);
//        $classColtroller = $module . "Controller";
//        $controller = new $classColtroller($app, $module);
//        $controller = new $classColtroller();
//        $controller->loadModel($app, $module);
//        $controller->loadView($action);
//        $this->loadMethod($controller, $action, $param);
    }

    /**
     * 
     * @param type $controller
     * @param type $action
     * @param type $param
     * @return boolean
     */
//    function loadMethod($controller, $action, $param) {
//        if (!$action) {
//            if (method_exists($controller, 'index')) {
//                $controller->index($param);
//            } else {
//                $this->error();
//            }
//        } else {
//            if (method_exists($controller, $action)) {
//                //calling method no param
//
//                if (isset($param)) {
//                    $controller->$action($param);
//                    return true;
//                }
//                $controller->$action();
//            } else {
//                $this->error();
//            }
//        }
//    }

    /**
     * 
     * @return boolean
     */
//    function error() {
//        require 'apps/front/error/controller.php';
//        new errorController();
//        return FALSE;
//    }
}

?>
