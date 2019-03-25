<?php

App::uses('CommonController', 'Controller');

class ProductsController extends CommonController {
	public $uses = array('Product', 'Comment');
	private $_user;

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'detail');

		$this->_user = $this->Auth->User();
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

	public function listProduct(){
	}

}
