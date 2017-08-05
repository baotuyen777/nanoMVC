<?php

class productController extends Controller {

    function __construct($app, $module) {
        parent::__construct($app, $module);
    }

    function detail($id) {
        if ($id) {
            $arrSingle = $this->model->getSingle(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
        } else {
            $arrSingle = $this->model;
        }
        $mediaModel = $this->loadModel('productcat');
        $this->view->arrMultiCat = $mediaModel->getAll();
        $this->view->arrSlider = $this->model->getProductSlide($id);
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
            $arrId = isset($_POST['arrId']) ? $_POST['arrId'] : FALSE;
            if ($arrId) {
                $this->model->delProductSlide($id);
                foreach ($arrId as $img_id) {
                    $this->model->addProductSlide($id, $img_id);
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

    function togglehot($id) {
        $isHot = $_POST['isHot'] ? 1 : 0;
        $this->model->togglehot($id, $isHot);
    }

}
