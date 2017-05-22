<?php

class Model {

    public $db;
    protected $lang;
    protected $table;

    function __construct() {
        $this->db = new PDO(DB_DSN, DB_USER, DB_PASS);
        $this->lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'vi';
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
    /**
     * 
     * @param type $param
     */
    public function add($params) {
        $sql = "INSERT INTO " . $this->table . " SET ";
        $arrField = array();
        foreach ($params as $field => $val) {
            if ($val == '') {
                continue;
            }
            $arrField[] = trim($field) . "='" . filter_var($val, FILTER_SANITIZE_STRING) . "'";
        }
        $strField = implode(', ', $arrField);
        $sql .= $strField;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAllPagination($params = false) {
        $cond = "";
        $pagination = "";
        $arrAllData = $this->getAll();
        $total = count($arrAllData);
        if ($params) {
            $cond = $params['filter'] ? ' AND name like "%' . filter_var($params['filter'], FILTER_SANITIZE_STRING) . '%"' : "";
            $start = ($params['page'] - 1) * $params['postPerPage'];
            $pagination = "limit {$start},{$params['postPerPage']}";
            $countPage = ceil($total / $params['postPerPage']);
        }
        $sql = "SELECT * FROM " . $this->table . " "
                . "WHERE 1=1 {$cond} {$pagination}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return ($result);
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
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
        $sql = "SELECT * FROM " . $this->table . " WHERE id =:id ";
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
    public function update($id, $params) {
        $sql = "UPDATE " . $this->table . " SET ";
        $arrField = array();
        foreach ($params as $field => $val) {
            if ($val === '') {
                continue;
            }
            $arrField[] = trim($field) . "='" . filter_var($val, FILTER_SANITIZE_STRING) . "'";
        }
        $sql .= implode(', ', $arrField);
        $sql .= " WHERE id= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $result = $stmt->execute();
        return $result;
    }

    public function delete($listId) {
        $sql = "DELETE FROM " . $this->table . " WHERE id IN ($listId)";
        $stmt = $this->db->prepare($sql);
//        $stmt->bindValue(":listId", $listId);
        $result = $stmt->execute();
        return $result;
    }

}

?>
