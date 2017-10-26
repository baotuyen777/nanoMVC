<?php

class userModel extends Model {

    public $id = '';
    public $name = "";
    public $phone = "";
    public $address = "";
    public $email = '';
    public $image_id = '';
    public $status = '';

    public function __construct($module) {
        parent::__construct($module);
    }

//    public function getAll() {
//        $sql = "SELECT O.*, M.image FROM " . $this->module . ' O LEFT JOIN media M ON M.id=O.image_id ';
//        $stmt = $this->db->prepare($sql);
//        $stmt->execute();
//        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
//        return ($result);
//    }
//
//    public function getAllPagination($params = false) {
//        $cond = "";
//        $pagination = "";
//        if ($params) {
//            $cond = $params['filter'] ? ' AND name like "%' . filter_var($params['filter'], FILTER_SANITIZE_STRING) . '%"' : "";
//            $pagination = "limit {$params['start']},{$params['postPerPage']}";
//        }
//        $sql = "SELECT O.*, M.image FROM " . $this->module . " O LEFT JOIN media M ON M.id=O.image_id "
//                . "WHERE 1=1 {$cond} ORDER BY O.id DESC {$pagination}";
//        $stmt = $this->db->prepare($sql);
//        $stmt->execute();
//        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
//        return ($result);
//    }

    public function getSingle($id) {
        $sql = "SELECT O.*, M.image  FROM " . $this->module . " O LEFT JOIN media M ON M.id=O.image_id WHERE O.id =:id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

}
