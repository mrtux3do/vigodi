<?php
App::uses('AppController', 'Controller');
App::uses('Security', 'Utility');
App::uses('CakeEmail', 'Network/Email');

App::import('Vendor', 'Package',array('file' => 'vendor/autoload.php'));

class CommonController extends AppController {
	public $uses = array('Product', 'Comment', 'Cart', 'Order', 'CartProduct', 'User', 'Address');
	private $_user;

	public $components = [
			'Session',
			'Cookie',
			'Auth' => [
					'loginAction' => array(
							'controller' => 'Auth',
							'action' => 'login'
					),
					'loginRedirect' => [
							'controller' => 'Products',
							'action' => 'index'
					],
					'logoutRedirect' => [
							'controller' => 'Products',
							'action' => 'index'
					],
					'authenticate' => [
							'Form' => [
									'fields' => [
											'username' => 'email',
											'password' => 'password'
									]
							]
					],
					'authorize' => array('Controller')
			]
	];

	public function beforeFilter() {
		parent::beforeFilter();

		Security::setHash('md5');

        if ($this->Auth->user()) {
        	$this->_user = $this->Auth->User();

        	$this->Auth->allow();
        }

        $this->set('infoUser', $this->Auth->user());
	}

	protected function _getRoleName($roleId) {
        $roleName = "";
        switch($roleId) {
            case 1:
                $roleName =  "Normal User";
                break;
            case 2:
                $roleName = "Admin";
                break;
            default:
        }
        return $roleName;
    }

    protected function __getCart() {
		$products = array();
		$cart_number = 0;
		$total = 0;
		$cart_id = '';

		$cart = $this->Cart->find('first', array(
			'conditions' => array(
            	'Cart.user_id' => $this->_user['id']
            ),
            'order' => array(
            	'Cart.id' => 'desc'
            )
        ));

        if (!empty($cart)) {
        	$order = $this->Order->find('first', array(
        		'conditions' => array('Order.cart_id' => $cart['Cart']['id']),
				'order' => array('Order.id' => 'desc')        			
            ));

            if(empty($order)) {
            	$cart_product = $this->CartProduct->find('all', array(
            		'conditions' => array(
            			'CartProduct.cart_id' => $cart['Cart']['id']
            		)
            	));

            	foreach ($cart_product as $value) {
            		$cart_number += $value['CartProduct']['number'];
            		$value['Product']['number'] = $value['CartProduct']['number'];
            		array_push($products, $value);
            		$total += $value['CartProduct']['number'] * $value['Product']['sale_price'];
            	}           	
            }

            $cart_id = $cart['Cart']['id'];
        }	

        $data = array(
        	'products' => $products,
        	'cart_number' => $cart_number,
        	'total' => $total,
        	'cart_id' => $cart_id
        );

        return $data;     
	}
}