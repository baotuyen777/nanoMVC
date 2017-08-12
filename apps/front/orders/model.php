<?php

class OrdersModel extends Model {

    public function __construct($module) {
        parent::__construct($module);
    }

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
