<?php

class UserController extends Controller {

//    public $auth;

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function index($id) {
        if ($id) {
            $this->detail($id);
        } else {
            $this->all();
        }
    }

    function all() {
        $index = $this->loadModel('front', 'index');
        $user2=$index->getAllUser();
        $arrAllData = $this->model->getAllUser();
        $params = array(
            'postPerPage' => isset($_REQUEST['postPerPage']) ? filter_var($_REQUEST['postPerPage'], FILTER_SANITIZE_STRING) : 10,
            'filter' => isset($_REQUEST['filter']) ? filter_var($_REQUEST['filter'], FILTER_SANITIZE_STRING) : "",
            'page' => isset($_REQUEST['page']) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_STRING) : 1,
            'total' => count($arrAllData)
        );

        $arrAllDataPagination = $this->model->getAllUser($params);
        $result = array(
            "status" => true,
            'data' => $arrAllDataPagination,
        );
        $this->view->msg = $result;
        $this->view->loadView('index');
    }

    function detail($id) {
       
        if ($id) {
            $arrSingleObject = $this->model->getSingleUser(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
            $result = array(
                "status" => true,
                'data' => $arrSingleObject,
            );
            if (!$arrSingleObject) {
                $result = array(
                    "status" => false,
                    'message' => "{id} " . LANG::__("IdNotFound"),
                );
            }
        }else{
            echo 11;
        }
        $this->view->loadView('detail');
    }

    
    function add() {
        $this->requireFields = array('email', 'password', 'name');
        if (!$this->checkAPI('POST')) {
            $this->showJson();
            return;
        }
        $params = $_POST;
        $params['password'] = md5($_POST['password']);
        $email = ($_POST["email"]);
        //validate email
        $status = false;
        $mes = "something wrong! please contact admin!";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mes = "Invalid email format";
        } else if ($this->model->getUserByEmail($email)) {
            $mes = "Email existed!";
        } else {
            $id = $this->model->addUser($params);
            if ($id) {
                $mes = "Success";
                $status = true;
            } else {
                $mes = "Server overload!";
            }
        }
        $result = array(
            "status" => $status,
            'message' => $mes,
        );
        $this->showJson($result);
    }

    /**
     * @api {put} /user/:id Update
     * @apiName Update
     * @apiGroup User
     *
     * @apiParam {Number} id Users unique id.
     *
     * @apiSuccess {String} status status of the API.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": true,
     *       "message": "200",
     *     }
     *
     * @apiError UserNotFound The id of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "status": false,
     *        "message": "id not found!"
     *     }
     */
    function update($id) {

        if (!$this->checkAPI('PUT')) {
            $this->showJson();
            return;
        }
        /** check exist id */
        $checkId = Helper::checkId($this->model->table, 'id', $id);
        if (!$checkId['status']) {
            $this->showJson($checkId);
            return;
        }
        parse_str(file_get_contents("php://input"), $put_vars);
//validate
//..
        if ($this->model->updateUser($id, $put_vars)) {
            $result = array(
                "status" => true,
                'message' => "200",
            );
        } else {
            $result = array(
                "status" => false,
                'message' => "you should use x-www-form-urlencoded or please contact admin!",
            );
        }
        $this->showJson($result);
    }

    /**
     * @api {delete} /user DeleteUser
     * @apiName Delete
     * @apiGroup User
     *
     * @apiParam {Number} id Users unique id.
     *
     * @apiSuccess {String} status status of the API.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": true,
     *       "message": "200",
     *     }
     *
     * @apiError UserNotFound The id of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "status": false,
     *       "message": "id not found!"
     *     }
     */
    function delete($id) {
        if (!$this->checkAPI('DELETE')) {
            $this->showJson();
            return;
        }
        /** check exist id */
        $checkId = Helper::checkId($this->model->table, 'id', $id);
        if (!$checkId['status']) {
            $this->showJson($checkId);
            return;
        }
        if ($this->model->deleteUser($id)) {
            $result = array(
                "status" => true,
                'message' => "200",
            );
        } else {
            $result = array(
                "status" => false,
                'message' => "something wrong, please contact admin!",
            );
        }
        $this->showJson($result);
    }

    /**
     * @api {delete} /user deleteMulti
     * @apiName deleteMulti
     * @apiGroup User
     *
     * @apiParam {String} listId eg: /deleteMulti/1,2,5.
     *
     * @apiSuccess {String} status status of the API.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": true,
     *       "message": "200",
     *     }
     *
     * @apiError UserNotFound The id of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "status": false,
     *       "message": "id not found!"
     *     }
     */
    function deleteMulti($listId) {
        if (!$this->checkAPI('DELETE')) {
            $this->showJson();
            return;
        }
        if (!$listId) {
            $this->result = array(
                "status" => false,
                "message" => "please input {listid} in URL eg:{/deleteMulti/1,2,5}"
            );
            $this->showJson();
            return;
        }
        if ($this->model->deleteUser(filter_var($listId, FILTER_SANITIZE_STRING))) {
            $result = array(
                "status" => true,
                'message' => "200",
            );
        } else {
            $result = array(
                "status" => false,
                'message' => "something wrong, please contact admin!",
            );
        }
        $this->showJson($result);
    }

}

?>