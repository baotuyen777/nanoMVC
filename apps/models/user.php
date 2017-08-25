<?php

class userModel extends Model {

    public $id = '';
    public $name = "";
    public $phone = "";
    public $address = "";
    public $email = '';
    public $image_id = '';
    public $status = '';

    public function __construct($module) {
        parent::__construct($module);
    }

}
