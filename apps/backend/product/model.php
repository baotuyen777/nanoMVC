<?php

class productModel extends Model {

    public $id = '';
    public $name = '';
    public $slug = '';
    public $price = '';
    public $cat_id = '';
    public $description = '';
    public $image = '';
    public $status = '';
    
    public function __construct($module) {
        parent::__construct($module);
    }

}
