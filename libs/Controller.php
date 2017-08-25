<?php

class Controller {

    /** @var \model */
    public $model;

    /** @var \view */
    public $view;

    /** @var \module */
    protected $module;

    function __construct($app, $module, $action = 'index') {
        $this->app = $app;
        $this->module = $module;
        $this->view = new View($app, $module, $action);
        $this->model = $this->loadModel($module);
        if ($app == 'bachend' && !Session::get('isLogin') && $module != 'auth') {
            Helper::redirect(Helper::getPermalink('backend/auth/login'));
            die();
        }
    }

   

    /**
     * @function \loadModel
     */
    public function loadModel($module = 'index') {
        $path = 'apps/models/' . $module . '.php';
        if (file_exists($path)) {

            require_once $path;
            $modelName = $module . 'Model';
            $model = new $modelName($module);
            return $model;
        }
    }

//    public function loadAction($action='product/loop') {
//        
//    }

    function error() {
        require 'apps/front/error/controller.php';
        new errorController();
        return FALSE;
    }

    //module use
    function index($id) {
        if ($id) {
            $this->detail($id);
        } else {
            $this->all();
        }
    }

    function all() {

        $postPerPage = 12;
        $page = isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1;

        $total = count($this->model->getAll());

        $start = ($page - 1) * $postPerPage;
        $countPage = ceil($total / $postPerPage);
        $params = array(
            'filter' => isset($_REQUEST['filter']) ? filter_var($_REQUEST['filter'], FILTER_SANITIZE_STRING) : "",
            'start' => $start,
            'postPerPage' => $postPerPage
        );

        $this->view->page = $page;
        $this->view->countPage = $countPage;
        $this->view->arrAll = $this->model->getAllPagination($params);
        $this->view->model = $this->model;
        $this->view->loadView('index');
    }

    function detail($id) {
        if ($id) {
            $arrSingle = $this->model->getSingle(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
        } else {
            $arrSingle = $this->model;
        }
        $this->view->arrSingle = $arrSingle;
        $this->view->loadView('detail');
    }

    function update($id) {
        if ($_POST) {
            $params = Helper::changeFormatPost($_POST['data']);
            $mes = '';
            $status = false;
            if ($id) {
                $params['status'] = !isset($params['status']) ? 0 : 1;
                /** check exist id */
                $checkId = Helper::checkId($this->module, 'id', $id);
                if (!$checkId) {
                    $mes = "Id not found!";
                }
                if ($this->model->update($id, $params)) {
                    $mes = "Success";
                    $status = true;
                } else {
                    $mes = "Server overload! please try again";
                }
            } else {
                if ($id = $this->model->add($params)) {
                    $status = true;
                    $mes = "Success";
                } else {
                    $mes = "Server overload!";
                }
            }
            $result = array(
                'status' => $status,
                'mes' => $mes
            );
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    function delete() {
        $status = false;
        $mes = "something wrong, please contact admin!";
        if ($_POST && $_POST['listId']) {
            $listId = $_POST['listId'];
            if ($this->model->delete($listId)) {
                $status = true;
                $mes = "delete success";
            }
            $this->view->status = $status;
            $this->view->mes = $mes;
        } else {
            $mes = "You must be choose some item !";
        }

        $result = array(
            'status' => $status,
            'mes' => $mes
        );
        $this->loadJson($result);
    }

    function loadJson($result) {
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function redirect($link = 'product') {
        $fullLink = Helper::getPermalink($link);
        echo '<script>window.location.replace("' . $fullLink . '");</script>';
    }

}
