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
        $postPerPage = 2;
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
        $this->view->objects = $this->model->getAllPagination($params);
        $this->view->loadView('index');
    }

    function detail($id) {
        if ($id) {
            $arrSingle = $this->model->getSingle(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
        } else {
            $arrSingle = (object) array('id' => '',
                        'name' => '', 'email' => '',
                        'status' => '');
        }
        $this->view->object = $arrSingle;
        $this->view->loadView('detail');
    }

    function update($id) {
        if ($_POST) {
            $params = $_POST;
            $status = false;
            if ($id) {
                unset($params['email']);
                $params['status'] = !isset($params['status']) ? 0 : 1;
                /** check exist id */
                $checkId = Helper::checkId($this->model->table, 'id', $id);
                if (!$checkId) {
                    $mes = "Id not found!";
                } elseif ($this->model->update($id, $params)) {
                    $mes = "Success";
                    $status = true;
                } else {
                    $mes = "Server overload! please try again";
                }
            } else {
                $params['password'] = md5($_POST['password']);
                $email = ($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $mes = "Invalid email format";
                } elseif ($this->model->getUserByEmail($email)) {
                    $mes = "Email existed!";
                } elseif ($this->model->add($params)) {
                    $status = true;
                    $mes = "Success";
                } else {
                    $mes = "Server overload!";
                }
            }
            $this->view->status = $status;
            $this->view->mes = $mes;
            $this->view->loadView('notice');
        }
    }

    function delete($id) {
        $status = false;
        /** check exist id */
        if (!$id) {
            $mes = "You must be choose some item !";
        } elseif (!Helper::checkId($this->model->table, 'id', $id)) {
            $mes = "Item not found!";
        } elseif ($this->model->delete($id)) {
            $status = true;
            $mes = "delete success";
        } else {
            $mes = "something wrong, please contact admin!";
        }
        $this->view->status = $status;
        $this->view->mes = $mes;
        $this->view->loadView('notice');
    }

    function deleteMulti($listId) {
        $status = false;
        if (!$listId) {
            $mes = "You must be choose some item !";
        } elseif ($this->model->delete(filter_var($listId, FILTER_SANITIZE_STRING))) {
            $status = true;
            $mes = "delete success";
        } else {
            $mes = "something wrong, please contact admin!";
        }
        $this->view->status = $status;
        $this->view->mes = $mes;
        $this->view->loadView('notice');
    }

}
