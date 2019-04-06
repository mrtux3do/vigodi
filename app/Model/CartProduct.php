<?php

App::uses('Model', 'Model');

class CartProduct extends AppModel {
    public $useTable = "t_cart_product";

    public $belongsTo = array(
        "Product" => array(
            "className" => "Product",
            "foreignKey" => "product_id"
        )
    );
}