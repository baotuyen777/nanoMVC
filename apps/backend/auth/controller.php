<?php

class AuthController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function login() {
        if ($_POST) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $user = $this->model->login($_POST);
                if ($user) {
                    Session::set('isLogin', True);
                    Session::set('currentUser', $user);
                } else {
//                    Session::destroy();
                    $this->view->mes = 'Email or password is wrong';
                }
            }
        }
        $this->view->loadView('login');
    }
    function logout(){
        Session::destroy();
        Helper::redirect(Helper::getPermalink('backend/auth/login'));
    }

}
