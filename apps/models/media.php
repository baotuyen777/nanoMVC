<?php

class mediaModel extends Model {

    public $id = '';
    public $name = '';
    public $image = '';
    public $type = '';
    public $description = '';

    public function __construct($module) {
        parent::__construct($module);
    }

    function addMulti($arrMultiRow) {
        $sql = "INSERT INTO " . $this->module . " (name,image) VALUES ";
        $row = array();
        foreach ($arrMultiRow as $arrRow) {
            $row[] = ' (' . implode(',', $arrRow) . ')';
        }
        $sql .= implode(',', $row);
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if (!$result) {
            var_dump($sql);
        }
        return $result;
    }
    function abc(){
        echo 123123121;
    }

}
