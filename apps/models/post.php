<?php

class postModel extends Model {

    public $id = '';
    public $name = '';
    public $slug = '';
    public $cat_id = '';
    public $description = '';
    public $content = '';
    public $image_id = '';
    public $status = '';

    public function __construct($module) {
        parent::__construct($module);
    }
//
//    public function togglehot($id, $isHot) {
//        $sql = "UPDATE " . $this->module . " SET is_hot=:isHot WHERE id = :id";
//        $stmt = $this->db->prepare($sql);
//        $stmt->bindValue(":isHot", $isHot);
//        $stmt->bindValue(":id", $id);
//        $result = $stmt->execute();
//        return $result;
//    }
//
//    function getRetated($id, $cateId) {
//        $sql = "SELECT O.*, M.image FROM " . $this->module . ' O INNER JOIN media as M ON O.image_id=M.id  
//            where O.cat_id=:cateId and O.id <> :id limit 8';
//        $stmt = $this->db->prepare($sql);
//        $stmt->bindValue(':cateId', $cateId);
//        $stmt->bindValue(':id', $id);
//        $stmt->execute();
//        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
//        return ($result);
//    }
//
//    public function getSingle($id) {
//        $sql = "SELECT O.*, PC.name as cat_name, M.image FROM " . $this->module . " O "
//                . "LEFT JOIN postcat PC ON PC.id=O.cat_id "
//                . "LEFT JOIN media M ON M.id=O.image_id "
//                . "WHERE O.id =:id ";
//        $stmt = $this->db->prepare($sql);
//        $stmt->bindValue(":id", $id);
//        $stmt->execute();
//        $result = $stmt->fetch(PDO::FETCH_OBJ);
//        return $result;
//    }

}
