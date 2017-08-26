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
                    foreach ($cart['data'] as $product) {
                        $orderDetail = array(
                            'order_id' => $id,
                            'product_id' => (int) $product->id,
                            'quantity' => $product->quantity,
                        );
                        $this->model->addOrderDetail($orderDetail);
                    }
                    $status = true;
                    $mes = "Success";
                    Session::del('cart');
                    $this->redirect('orders/' . $id);
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
        $this->view->arrSingle = $this->model->getSingle($id);
        $this->view->arrOrderDetail = $this->model->getOrderDetail($id);
        $this->view->loadView('detail');
    }

}

?>