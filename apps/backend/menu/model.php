<?php

class menuModel extends Model {

    public $id = '';
    public $name = '';
    public $link = '';
    public $parent = '';
    public $orders = '';

    public function __construct($module) {
        parent::__construct($module);
    }

}
