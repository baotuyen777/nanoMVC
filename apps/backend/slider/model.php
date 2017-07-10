<?php

class sliderModel extends Model {

    public $id = '';
    public $name = '';
    public $link = '';
    public $content = '';
    public $status = '';
    public $image = '';

    public function __construct($module) {
        parent::__construct($module);
    }

}
