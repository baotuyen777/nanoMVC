<?php

class UserController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

//    function all() {
//        $postPerPage = 3;
//        $page = isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1;
//
//        $total = count($this->model->getAll());
//
//        $start = ($page - 1) * $postPerPage;
//        $countPage = ceil($total / $postPerPage);
//        $params = array(
//            'filter' => isset($_REQUEST['filter']) ? filter_var($_REQUEST['filter'], FILTER_SANITIZE_STRING) : "",
//            'start' => $start,
//            'postPerPage' => $postPerPage
//        );
//        $this->view->page = $page;
//        $this->view->countPage = $countPage;
//        $this->view->objects = $this->model->getAllPagination($params);
//        $this->view->loadView('index');
//    }

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

}
