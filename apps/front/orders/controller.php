<?php

class OrdersController extends Controller {

//    public $auth;

    function __construct($app, $module, $action = 'index') {
        parent::__construct($app, $module, $action);
    }

    function index($id) {
        if ($id) {
            $this->detail($id);
        } else {
            $this->all();
        }
    }

    function add($id) {
        $mes = 'nothing';
        $status = false;
        if ($_POST) {
            $params = $_POST;
//            $params = Helper::changeFormatPost($_POST['data']);
            if ($user = $this->model->getUserByPhone($params['phone'])) {
                $user_id = $user->id;
            } else {
                $userModel = $this->loadModel('user');
                $user_id = $userModel->add($params);
            }

            $cart = Session::get('cart');
            if ($cart) {
                $order = array(
                    'user_id' => $user_id,
                    'total' => (int) $cart['total'],
                    'date' => date("Y-m-d"),
                    'payment_method' => $params['payment_method']
                );
                if ($id = $this->model->add($order)) {
                    $status = true;
                    $mes = "Success";
                } else {
                    $mes = "Server overload!";
                }
            }
        }
        $result = array(
            'status' => $status,
            'mes' => $mes
        );
//            header('Content-Type: application/json');
        echo json_encode($result);
    }

    function detail($id) {
        $arrSingle = $this->model->getSingle($id);
        $this->view->arrSingle = $arrSingle;
        $this->view->arrSlider = $this->model->getProductSlide($id);
//        $this->view->arrProductRelated = $this->model->getRetated($id,$arrSingle->cat_id);
        $this->view->loadView('detail');
    }

}

?>