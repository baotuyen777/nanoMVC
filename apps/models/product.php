<?php

class productModel extends Model {

    public $id = '';
    public $name = '';
    public $slug = '';
    public $price = 50000;
    public $sale = 0;
    public $cat_id = '';
    public $description = '';
    public $content = '';
    public $image_id = '';
    public $is_hot = False;
    public $status = '';

    public function __construct($module) {
        parent::__construct($module);
    }

    public function togglehot($id, $isHot) {
        $sql = "UPDATE " . $this->module . " SET is_hot=:isHot WHERE id = :id";
        var_dump($isHot);
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":isHot", $isHot);
        $stmt->bindValue(":id", $id);
        $result = $stmt->execute();
        return $result;
    }

    public function getAllPagination($params = false) {
        $cond = "";
        $pagination = "";
        if ($params) {
            $cond = $params['filter'] ? ' AND name like "%' . filter_var($params['filter'], FILTER_SANITIZE_STRING) . '%"' : "";
            $pagination = "limit {$params['start']},{$params['postPerPage']}";
        }
        $sql = "SELECT O.*, M.image FROM " . $this->module . " O INNER JOIN media M ON M.id=O.image_id "
                . "WHERE 1=1 {$cond} ORDER BY O.id DESC {$pagination}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    public function getAll() {
        $sql = "SELECT O.*, M.image FROM " . $this->module . ' O INNER JOIN media M ON M.id=O.image_id ';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

//    public function getSingle($id) {
//        $sql = "SELECT O.*, M.image FROM " . $this->module . " O INNER JOIN media M ON M.id=O.image_id WHERE O.id =:id ";
//        var_dump($sql);
//        $stmt = $this->db->prepare($sql);
//        $stmt->bindValue(":id", $id);
//        $stmt->execute();
//        $result = $stmt->fetch(PDO::FETCH_OBJ);
//        return $result;
//    }
    //front
     function getHot() {
        $sql = "SELECT O.*, M.image FROM " . $this->module . ' O INNER JOIN media as M ON O.image_id=M.id  where O.is_hot=1 limit 8';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    function getNew() {
        $sql = "SELECT O.*, M.image FROM " . $this->module . ' O INNER JOIN media as M ON O.image_id=M.id  where O.status=1 limit 8';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    function getRetated($id, $cateId) {
        $sql = "SELECT O.*, M.image FROM " . $this->module . ' O INNER JOIN media as M ON O.image_id=M.id  
            where O.cat_id=:cateId and O.id <> :id limit 8';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cateId', $cateId);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    public function getSingle($id) {
        $sql = "SELECT P.*, PC.name as cat_name FROM " . $this->module . " P LEFT JOIN productcat PC ON PC.id=P.cat_id WHERE P.id =:id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

}
