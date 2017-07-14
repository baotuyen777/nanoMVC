<?php

class productModel extends Model {

    public $id = '';
    public $name = '';
    public $slug = '';
    public $price = '';
    public $category = '';
    public $description = '';
    public $image = '';
    public $status = '';
    
    public function __construct($module) {
        parent::__construct($module);
    }

}
