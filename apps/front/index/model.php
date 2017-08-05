<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class indexModel extends Model {

    public $table = "users";

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

?>
