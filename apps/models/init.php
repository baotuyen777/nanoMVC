<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class initModel extends Model {

    protected $sql = "";

    public function __construct($module) {
        parent::__construct($module);
    }


    public function addSql($table, $arrField = array()) {

        $strField = '';
        if (!empty($arrField))
            $strField = ',' . implode(',', $arrField);
        $sql = " CREATE TABLE IF NOT EXISTS $table (
            id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
             $strField
          ) ;";
        $this->sql .= $sql;
    }

    public function runSQl() {
        echo '<pre>';
        print_r($this->sql);
        $stmt = $this->db->prepare($this->sql);
        $result = $stmt->execute();
        return $result;
    }

}

?>
