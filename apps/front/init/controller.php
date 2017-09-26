<?php

class initController extends Controller {

    function __construct($app, $module, $action = 'index') {
        parent::__construct($app, $module, $action);
    }

    function index($id) {

        $status = true;
        $this->model->addSql('menu', array(
            'name VARCHAR (255) NOT NULL',
            'link VARCHAR (255) NOT NULL',
            'parent INT (11) ',
            'orders INT (11)',
        ));
        $this->model->addSql('product', array(
            'name VARCHAR (255) NOT NULL',
            'slug VARCHAR (255) NOT NULL',
            'price INT (11) NOT NULL',
            'sale INT (11) ',
            'cat_id INT (11)',
            'description VARCHAR (255) ',
            'content TEXT ',
            'image_id  INT(11)',
            'is_hot INT (2) DEFAULT 0',
            'status INT (2) DEFAULT 1',
        ));
        $this->model->addSql('productslide', array(
            'product_id INT (11) NOT NULL',
            'image_id INT (11)  NOT NULL',
        ));
        $this->model->addSql('productcat', array(
            'name VARCHAR (255) NOT NULL',
            'slug VARCHAR (255) NOT NULL',
            'parent_id INT (11) ',
            'description VARCHAR (255) ',
            'image_id  INT(11)',
            'status INT (2) DEFAULT 1',
        ));
        $this->model->addSql('orders', array(
            'user_id INT (11) NOT NULL',
            'date DATE NOT NULL',
            'total INT(11) NOT NULL',
            'payment_status INT (4) DEFAULT 1',
            'payment_method INT(4) DEFAULT 1',
            'note VARCHAR (255)',
            'status INT (2) DEFAULT 1'
        ));
        $this->model->addSql('orders_detail', array(
            'order_id INT (11) UNSIGNED NOT NULL',
            'product_id INT (11) NOT NULL',
            'quantity INT (11) DEFAULT 1',
        ));
        $this->model->addSql('user', array(
            'phone VARCHAR(100)  NOT NULL ',
            'name VARCHAR(100) ',
            'email VARCHAR(100) ',
            'password VARCHAR(100) DEFAULT "123456" ',
            'activation_key VARCHAR(100)',
            'address VARCHAR(255)',
            'birthday DATE',
            'image_id INT(11)',
            'gender TINYINT   DEFAULT 1 ',
            'role TINYINT DEFAULT 1',
            'wallet  FLOAT DEFAULT 0',
            'status INT (2) DEFAULT 1'
        ));
        $this->model->addSql('slider', array(
            'name VARCHAR (255) ',
            'link VARCHAR (255) ',
            'content TEXT  ',
            'image_id  INT(11) NOT NULL',
            'orders INT (11)',
            'status INT (2) DEFAULT 1'
        ));
        $this->model->addSql('media', array(
            'name VARCHAR (255) ',
            'image  VARCHAR(255) NOT NULL',
            'type VARCHAR (20) DEFAULT "jpg"',
            'description TEXT '
        ));
        $this->model->addSql('post', array(
            'name VARCHAR (255) NOT NULL',
            'slug VARCHAR (255) ',
            'cat_id INT (11)',
            'description VARCHAR (255) ',
            'content TEXT ',
            'image_id  INT(11)',
            'status INT (2) DEFAULT 1',
        ));
        $this->model->runSql();
    }

}

?>