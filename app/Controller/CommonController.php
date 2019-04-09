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
            if ($this->Auth->user('user_role_id') == 2) {
                $this->Auth->allow();
            } elseif ($this->Auth->user('user_role_id') == 1) {
                $this->Auth->allow(array(
                    'controller' => 'Products',
                    'action' => 'cart', 'address', 'infoCart'
                ));
            } 

            $this->set('infoUser', $this->Auth->user());        	
        }        
	}

    /**
     * isAuthorized
     *
     * @param mixed $user the unique parameter
     * @return bool
     */
    public function isAuthorized($user) {
        if (isset($user['user_role_id'])) {
            if ($user['user_role_id'] == 2) {
                // Admin will be able to access any URL in the site when logged-in
                return true;
            } elseif ($user['user_role_id'] == 1) {
                //return default URL if access any deny URL
                $this->redirect(array('controller' => 'Products', 'action' => 'index'));

                return false;
            } else {
                //delete all Session & Cookie
                $this->Session->destroy();
                $this->Cookie->destroy();

                return false;
            }
        }

        return false;
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