<?php

class initController extends Controller {

    function __construct($app, $module, $action = 'index') {
        parent::__construct($app, $module, $action);
    }

    function index($id) {

        $status = true;
        $this->model->addSql('menu', array(
            'name VARCHAR (30) NOT NULL',
            'link VARCHAR (30) NOT NULL',
            'parent INT (11) ',
            'orders INT (11)',
        ));
        $this->model->addSql('product', array(
            'name VARCHAR (30) NOT NULL',
            'slug VARCHAR (30) NOT NULL',
            'price INT (11) NOT NULL',
            'category INT (11) NOT NULL',
            'description VARCHAR (255) NOT NULL',
            'image VARCHAR (255)',
            'status INT (2) DEFAULT 1',
        ));
        $this->model->addSql('orders', array(
            'user_id INT (11) NOT NULL',
            'date DATE NOT NULL',
            'note VARCHAR (255)',
            'total INT(11) NOT NULL',
            'status INT (2) DEFAULT 1'
        ));
        $this->model->addSql('orders_detail', array(
            'order_id INT (11) UNSIGNED NOT NULL',
            'product_id INT (11) NOT NULL',
            'quantity INT (11) DEFAULT 1'
        ));
        $this->model->addSql('users', array(
            'name VARCHAR(100) NOT NULL',
            'email VARCHAR(100) NOT NULL',
            'password VARCHAR(100) NOT NULL',
            'activation_key VARCHAR(100)',
            'birthday DATE',
            'avatar VARCHAR(255)',
            'gender TINYINT   DEFAULT 1 ',
            'role TINYINT DEFAULT 1',
            'wallet  FLOAT DEFAULT 0',
            'status INT (2) DEFAULT 1'
        ));
        $this->model->addSql('slider', array(
            'name VARCHAR (30) NOT NULL',
            'link VARCHAR (30) NOT NULL',
            'content TEXT  ',
            'orders INT (11)',
        ));

        $this->model->runSql();
        echo 111;
    }

}

?>