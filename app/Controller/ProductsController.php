<?php

App::uses('CommonController', 'Controller');

class ProductsController extends CommonController {
	public $uses = array('Product', 'Comment', 'Cart', 'Order', 'CartProduct', 'User', 'Address');
	private $_user;
	private $_cartId;

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'detail', 'listProduct', 'cart', 'address', 'infoCart', 'search');

		$this->_user = $this->Auth->User();

		//find number cart
		if (!empty($this->_user)) {		
			$carts = $this->__getCart();
			$this->_cartId = $carts['cart_id'];
			$this->set('cart', $carts['cart_number']);    
		}		
	}

	//Home page
	public function index(){
		$data = $this->Product->find('all');
		$this->set('data', $data);
		$this->set(compact('user', $this->_user));
	}

	//Product detail
	public function detail(){
		$id = $this->request->query('product_id');
		$data = $this->Product->find('first', array(
			'conditions' => array(
				'Product.id' => $id,
			)
		));
		$relate_product = $this->Product->find('all', array(
			'conditions' => array(
				'Product.category_id' => $data['Product']['category_id']
			)
		));
		//list comment
		$comments = $this->Comment->find('all', array(
			'conditions' => array('Comment.product_id' => $id),
			'order' => array('Comment.created_at' => 'asc')
		));

		$this->set(array('data' => $data, 'relate' => $relate_product, 'comments' => $comments));
	}

	//List product
	public function listProduct(){
	}

	//List product that want to buy
	public function cart(){
		$carts = $this->__getCart();

		$this->set('products', $carts['products']);
		$this->set('total', $carts['total']);
		$this->set('cart_id', $carts['cart_id']);
	}


	//address to ship
	public function address(){
		$cart_id = '';
		$now = date('Y/m/d H:i:s');	
		$address = $this->Address->find('first', array(
			'conditions' => array(
				'Address.user_id' => $this->_user['id']
			)
		));
		if(!empty($address)) {		
			$address['User'] = $address['Address'];	
			$this->set('user', $address);

			//update new addess
			if($this->request->is('post')){
				$data = $this->request->data;
				$this->Address->id = $address['Address']['id'];

				$this->Address->save(array(
					'user_id' => $this->_user['id'],
					'f_name' => $data['first-name'],
					'name' => $data['last-name'],
					'email' => $data['e-mail'],
					'phone' => $data['phone-number'],
					'address' => $data['address'],
					'update_date' => $now
				));

				$this->redirect(array('controller' => 'products', 'action' => 'infoCart', '?' => array('cart_id' => $this->_cartId)));
			}
		} else {
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->_user['id']
				)
			));
			$this->set('user', $user);
			//create new addess
			if($this->request->is('post')){
				$data = $this->request->data;

				$this->Address->save(array(
					'user_id' => $this->_user['id'],
					'f_name' => $data['first-name'],
					'name' => $data['last-name'],
					'email' => $data['e-mail'],
					'phone' => $data['phone-number'],
					'address' => $data['address'],
					'created_at' =>$now
				));

				$this->redirect(array('controller' => 'products', 'action' => 'infoCart', '?' => array('cart_id' => $this->_cartId)));
			}
		}	
		$this->set('cart_id', $this->_cartId);		
	}

	//Last step before buy successful
	public function infoCart(){
		$carts = $this->__getCart();

		$address = $this->Address->find('first', array(
			'conditions' => array(
				'Address.user_id' => $this->_user['id']
			)
		));
		$this->set('address', $address);

		$this->set('total', $carts['total']);
	}

	public function search(){
		if($this->request->is('post')){
			$keyword = $this->request->data['search'];
			$this->Paginator->settings = array(
				'conditions' => array ('Product.name LIKE' => '%' . $keyword . '%'),
				'limit' => 4
			);
			$data = $this->Paginator->paginate('Product');
			$this->set('data', $data);
		}
	}

	private function __getCart() {
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
        $this->log($cart);
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
            		array_push($products, $value['Product']);
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
