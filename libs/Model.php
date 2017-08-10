<?php

class Model {

    protected $db;
    protected $lang;
//    protected $table;

    /** @var \module */
    protected $module;

    /** @var \module */
    protected $fields = array();

    function __construct($module) {
        $this->db = new PDO(DB_DSN, DB_USER, DB_PASS);
        $this->lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'vi';
        $this->module = $module;
    }

    /**
     * 
     * @param type $sql
     * @param type $params
     * @return type $result
     */
    function getVar($sql, $params = array()) {
        $stmt = $this->db->prepare($sql);
        if (isset($params)) {
            $i = 0;
            foreach ($params as $k => $v) {
                $i++;
                $stmt->bindValue($k, $v);
            }
        }
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    function getUserById($id) {
        $sql = 'SELECT id, activation_key, email,name,birthday,avatar,gender,role,wallet,status FROM users WHERE id= :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchObject();
        return $result;
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function getUserByEmail($email) {
        $sql = "SELECT id, activation_key, email,name FROM users WHERE email=:email ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $result = $stmt->fetchObject();
        return $result;
    }

// use all module


    public function getAllPagination($params = false) {
        $cond = "";
        $pagination = "";
        if ($params) {
            $cond = $params['filter'] ? ' AND name like "%' . filter_var($params['filter'], FILTER_SANITIZE_STRING) . '%"' : "";
            $pagination = "limit {$params['start']},{$params['postPerPage']}";
        }
        $sql = "SELECT * FROM " . $this->module . " "
                . "WHERE 1=1 {$cond} ORDER BY id DESC {$pagination}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->module;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function getSingle($id) {
        $sql = "SELECT * FROM " . $this->module . " WHERE id =:id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * 
     * @param type $param
     */
    public function add($params) {
        $sql = "INSERT INTO " . $this->module . " SET ";
        $arrField = array();
        foreach ($params as $field => $val) {
            if ($val == '' || !property_exists($this, $field)) {
                continue;
            }
            $arrField[] = trim($field) . "='" . filter_var($val, FILTER_SANITIZE_STRING) . "'";
        }
        $strField = implode(', ', $arrField);
        $sql .= $strField;
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if (!$result) {
            var_dump($sql);
        }
        return $this->db->lastInsertId();
    }

    /**
     * 
     * @param type $param
     */
    public function update($id, $params) {
        $sql = "UPDATE " . $this->module . " SET ";
        $arrField = array();
        foreach ($params as $field => $val) {
            if ($val == '' || !property_exists($this, $field)) {
                continue;
            }
            $arrField[] = trim($field) . "='" . filter_var($val, FILTER_SANITIZE_STRING) . "'";
        }
        $sql .= implode(', ', $arrField);
        $sql .= " WHERE id= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $result = $stmt->execute();
        if (!$result) {
            var_dump($sql);
        }
        return $result;
    }

    public function delete($listId) {
        $sql = "DELETE FROM " . $this->module . " WHERE id IN ($listId)";
        $stmt = $this->db->prepare($sql);
//        $stmt->bindValue(":listId", $listId);
        $result = $stmt->execute();
        return $result;
    }

//    public function addMany2many($table, $arrObj1 = array('product_id' => 1), $arrObj2 = array('image_id' => array())) {
//        $sqlCheck = "SELECT * from :table where ";
//        $stmt = $this->db->prepare($sql);
//        $stmt->bindValue(":id", $id);
//        $stmt->execute();
//        $result = $stmt->fetch(PDO::FETCH_OBJ);
//    }
    public function delProductSlide($product_id) {

        $sqlDel = "DELETE from productslide where product_id=:product_id";
        $stmt = $this->db->prepare($sqlDel);
        $stmt->bindValue(":product_id", $product_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addProductSlide($product_id, $media_id) {
        $sql = "INSERT INTO productslide(product_id,image_id) values (:product_id,:image_id) ";
        $stmt2 = $this->db->prepare($sql);
        $stmt2->bindValue(":product_id", $product_id);
        $stmt2->bindValue(":image_id", $media_id);
        $stmt2->execute();
        $result = $stmt2->fetch(PDO::FETCH_OBJ);
    }

    public function getProductSlide($product_id) {
        $sql = "SELECT * FROM productslide as PS INNER JOIN media as M ON PS.image_id=M.id "
                . " where product_id=:product_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":product_id", $product_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

}
