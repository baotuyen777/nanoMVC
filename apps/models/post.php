<?php

class postModel extends Model {

    public $id = '';
    public $name = '';
    public $slug = '';
    public $cat_id = '';
    public $description = '';
    public $content = '';
    public $image_id = '';
    public $status = '';

    public function __construct($module) {
        parent::__construct($module);
    }

    

}
