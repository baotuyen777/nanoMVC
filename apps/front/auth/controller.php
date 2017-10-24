<?php

class authController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function index($id) {
        $this->login();
    }

    function login() {
        if ($_POST) {
            if (isset($_POST['phone']) && isset($_POST['password'])) {
                $user = $this->model->login($_POST);
                if ($user) {
                    Session::set('isLogin', True);
                    Session::set('currentUser', $user);
                    $this->redirect('backend/product');
                } else {
//                    Session::destroy();
                    $this->view->mes = 'Email or password is wrong';
                }
            }
        }
        $this->view->loadView('login');
    }

    function logout() {
        Session::destroy();
        $this->redirect('index');
    }

    /**
     * @api {post} /resetPassword1 resetPassword1 
     * @apiName resetPassword1
     * @apiGroup Auth
     *
     * @apiSuccess {String} email Email of the User.
     * @apiSuccess {String} url URL confirm send in mail.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "true",
     *       "message": "Success! please check your email",
     *     }
     *
     * @apiError UserNotFound The email of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *         "status": false,
     *         "message": "email not exist!"
     *     }
     */
    public function resetPassword1() {
        $status = false;
        $mes = 'something wrong! please contact admin!';
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $status = true;
            if (!isset($_POST['email']) || !isset($_POST['url'])) {
                $mes = "email and url are required!";
                $status = false;
            } elseif (!filter_var($email = ($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                $mes = "Invalid email format";
                $status = false;
            } else if (!$user = $this->model->getUserByEmail($email)) {
                $status = false;
                $mes = 'email not exist!';
            }
            if ($status) {
                $data = $this->model->resetPassword($user, $_POST['url']);
                $mes = 'Success! please check your email';
            }
        } else {
            $result['message'] = "Please use method post";
        }
        $result = array(
            'status' => $status,
            'message' => $mes
        );
        $this->showJson($result);
    }

    /**
     * @api {post} /resetPassword2 resetPassword2 
     * @apiName resetPassword2
     * @apiGroup Auth
     *
     * @apiSuccess {String} key Key confirm in mail.
     * @apiSuccess {String} email Email .
     * @apiSuccess {String} password Password .
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "true",
     *       "message": "Success! Your password has been reset",
     *     }
     *
     * @apiError UserNotFound The email of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *         "status": false,
     *         "message": "email not exist!"
     *     }
     */
    public function resetPassword2() {
//        $this->requireFields = array('email', 'key', 'password');

        $mes = 'something wrong! please contact admin!';
        $status = true;
//        var_dump($_POST);
        if (!isset($_POST['email']) || !isset($_POST['key']) || !isset($_POST['password'])) {
            $mes = "email and key and password are required!";
            $status = false;
        } elseif (!filter_var($email = ($_REQUEST["email"]), FILTER_VALIDATE_EMAIL)) {
            $mes = "Invalid email format";
            $status = false;
        } else if (!$user = $this->model->getUserByEmail($email)) {
            $status = false;
            $mes = 'email not exist!';
        } else if ($user->activation_key !== $_REQUEST['key']) {
            $status = false;
            $mes = 'wrong key!';
        }
        if ($status) {
            if ($this->model->changePassword($user, filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING))) {
                $mes = 'Success! Your password has been reset!';
            } else {
                $status = false;
            }
        }
        $result = array(
            'status' => $status,
            'message' => $mes
        );
        $this->showJson($result);
    }

   
    function register() {
        $this->requireFields = array('email', 'password', 'name');
        $status = false;
        if ($_POST) {
            $params = $_POST;
            $params['password'] = md5($_POST['password']);
            $phone = ($_POST["email"]);
            //validate email
            $mes = "something wrong! please contact admin!";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mes = "Invalid email format";
            } else if ($this->model->getUserByPhone($phone)) {
                $mes = "Email existed!";
            } else {
                $id = $this->model->register($params);
                if ($id) {
                    $mes = "Success";
                    $status = true;
                } else {
                    $mes = "Server overload!";
                }
            }
        } else {
            $mes = "Please use method post";
        }
        $result = array(
            "status" => $status,
            'message' => $mes,
        );
        $this->showJson($result);
    }

}

?>