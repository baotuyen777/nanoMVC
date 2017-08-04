<?php

class authModel extends Model {

    public $id = '';
    public $name = "";
    public $email = '';
    public $image_id = '';
    public $status = '';

    public function __construct($module) {
        parent::__construct($module);
    }

    public function login($param) {
        $sql = "SELECT id, activation_key, email,name FROM user WHERE email=:email AND password=:password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":email", $param['email']);
        $stmt->bindValue(":password", $param['password']);
        $stmt->execute();
        $result = $stmt->fetchObject();
        return $result;
    }

}
