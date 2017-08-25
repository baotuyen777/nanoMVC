<?php

class IndexModel extends Model {

    public function __construct($module) {
        parent::__construct($module);
    }

    function getSlider() {
        $sql = "SELECT * FROM slider limit 8";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
