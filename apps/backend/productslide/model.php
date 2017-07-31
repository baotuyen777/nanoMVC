<?php

class productcatModel extends Model {

    public $id = '';
    public $name = '';
    public $slug = '';
    public $parent_id = '';
    public $description = '';
    public $image_id = '';
    public $status = '';
    
    public function __construct($module) {
        parent::__construct($module);
    }

}
