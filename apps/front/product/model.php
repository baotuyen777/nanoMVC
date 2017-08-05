<?php

class ProductModel extends Model {

    public function __construct($module) {
        parent::__construct($module);
    }

    function getHot() {
        $sql = "SELECT * FROM " . $this->module . ' where is_hot=1 limit 8';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

}
