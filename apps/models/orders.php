<?php

class OrdersModel extends Model {

    public $id = '';
    public $user_id = '';
    public $total = 0;
    public $date = '';
    public $payment_status = 1;
    public $method = '';
    public $note = False;
    public $status = True;

    public function __construct($module) {
        parent::__construct($module);
    }

}
