<?php

class cartController extends Controller {

    function __construct($app, $module, $action = 'index') {
        parent::__construct($app, $module, $action);
    }

    function index($id) {
        $this->view->loadView('index');
    }

    function add() {
        if ($_POST) {
            $params = Helper::changeFormatPost($_POST['data']);
            $productId = $params['productId'];
            $quantity = $params['quantity'];
            $cart = Session::get('cart') != FALSE ? Session::get('cart') : array();
            $product = Helper::getProductById($productId);
            $product->quantity = $quantity;
            $cart[$productId] = $product;
            Session::set('cart', $cart);
        }
    }

    function del($productId) {
//        Session::destroy();
        $cart = Session::get('cart') != FALSE ? Session::get('cart') : array();
        unset($cart[$productId]);
        Session::set('cart', $cart);
    }

    function checkout() {
//        $this->view->arrProduct = $arrProduct;
        $this->view->loadView('checkout');
    }

}

?>