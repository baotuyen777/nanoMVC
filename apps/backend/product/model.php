<?php

class productModel extends Model {

    public $id = '';
    public $name = '';
    public $slug = '';
    public $price = '';
    public $cat_id = '';
    public $description = '';
    public $content = '';
    public $image = '';
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

}
