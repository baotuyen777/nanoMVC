<?php

class cartController extends Controller {

    function __construct($app, $module, $action = 'index') {
        parent::__construct($app, $module, $action);
    }

    function index($id) {
        if ($_POST) {
            $params = $_POST;
            $this->addToCart($params);
        }
        $this->view->loadView('index');
    }

    function addToCart($params) {
        
        $productId = $params['productId'];
        $quantity = $params['quantity'];
        $cart = Session::get('cart') != FALSE ? Session::get('cart') : array();
        $product = Helper::getProductById($productId);
        $product->quantity = $quantity;
        $product->linkDel = Helper::getPermalink('cart/del/' . $product->id);
        $product->linkProduct = Helper::getPermalink('product/' . $product->id);
        $product->linkImage = TIMTHUMB_LINK . $product->image;
        $product->priceSale = number_format($product->price - $product->price * $product->sale / 100);
        $product->total = number_format(($product->price - $product->price * $product->sale / 100) * $product->quantity);
        $cart['data'][$productId] = $product;
        $total = 0;
        foreach ($cart['data'] as $product) {
            $total += ($product->price - $product->price * $product->sale / 100) * $product->quantity;
        }
        $cart['total'] = $total;
        Session::set('cart', $cart);
        $status = true;
        $mes = 'Success';
        return $result = array(
            'status' => $status,
            'mes' => $mes,
            'cart' => $cart,
        );
    }

    function buynow($product_id) {
        $params = array(
            'productId' => $product_id,
            'quantity' => 1,
        );
        $this->addToCart($params);
        $this->redirect('cart');
    }

    function add() {

        $result = array(
            'status' => FALSE
        );
        if ($_POST) {
            $params = Helper::changeFormatPost($_POST['data']);
            $result = $this->addToCart($params);
        }
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function delall() {
        Session::destroy();
    }

    function del($productId) {
//        Session::destroy();
        $cart = Session::get('cart') != FALSE ? Session::get('cart') : array();
        $cart['total'] = $cart['total'] - $cart['data'][$productId]->price - $cart['data'][$productId]->price * $cart['data'][$productId]->sale / 100;
        unset($cart['data'][$productId]);
        if ($cart['total'] = 0) {
            $cart = array();
        }
        Session::set('cart', $cart);
    }

    function checkout() {
        $cart = Session::get('cart');
        if (!$cart) {
            $this->redirect('index');
            die;
        }
//        $this->view->arrProduct = $arrProduct;
        $this->view->loadView('checkout');
    }

}

?>