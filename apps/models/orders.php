<?php

class OrdersModel extends Model {

    public $id = '';
    public $user_id = '';
    public $total = 0;
    public $date = '';
    public $payment_status = 1;
    public $payment_method = '';
    public $note = False;
    public $status = True;

    public function __construct($module) {
        parent::__construct($module);
    }

    public function getAllPagination($params = false) {
        $cond = "";
        $pagination = "";
        if ($params) {
            $cond = $params['filter'] ? ' AND name like "%' . filter_var($params['filter'], FILTER_SANITIZE_STRING) . '%"' : "";
            $pagination = "limit {$params['start']},{$params['postPerPage']}";
        }
        $sql = "SELECT O.*,U.name as user_name,U.phone FROM " . $this->module . " O  INNER JOIN user U ON O.user_id=U.id "
                . " WHERE 1=1 {$cond} ORDER BY O.id DESC {$pagination}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->module;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    public function addOrderDetail($params) {
        $sql = "INSERT INTO orders_detail SET ";
        $arrField = array();
//        var_dump($params);
        foreach ($params as $field => $val) {

            $arrField[] = trim($field) . "='" . filter_var($val, FILTER_SANITIZE_STRING) . "'";
        }
        $strField = implode(', ', $arrField);
        $sql .= $strField;
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if (!$result) {
            var_dump($sql);
        }
        return $this->db->lastInsertId();
    }

    public function getOrderDetail($orderId) {
        $sql = "SELECT O.*,P.name as product_name,P.price,P.sale, M.image  "
                . "FROM orders_detail O INNER JOIN product P ON O.product_id=P.id "
                . "INNER JOIN media M ON M.id=P.image_id "
                . "WHERE order_id=:orderId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':orderId', $orderId);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

}
