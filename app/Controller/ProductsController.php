<?php

App::uses('CommonController', 'Controller');

class ProductsController extends CommonController {
	public $uses = array('Product', 'Comment', 'Cart', 'Order', 'CartProduct', 'User', 'Address', 'Category');
	private $_user;
	private $_cartId;

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('index', 'detail', 'listProduct', 'search', 'newProduct');

		$this->_user = $this->Auth->User();

		//find number cart
		if (!empty($this->_user)) {	
			$this->set('user', $this->_user);

			$carts = $this->__getCart();
			$this->_cartId = $carts['cart_id'];
			$this->set('cart', $carts['cart_number']);    
		}		
	}

	//Home page
	public function index(){
		$data = $this->Product->find('all');
		$this->set('data', $data);
		
		$this->newProduct();
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

		if (!empty($this->_user)) {
			$this->set('user', $this->_user);
		}
	}

	//List product
	public function listProduct(){
		$category_id = $this->request->query['category_id'];
		$this->Paginator->settings = array(
			'conditions' => array('Product.category_id' => $category_id),
			'limit' => 16
		);
		$name_category = $this->Category->find('first', array(
			'conditions' => array('Category.id' => $category_id),
			'fields' => array('Category.category_name')
		));
		$data = $this->Paginator->paginate('Product');
		$this->set(compact('data', 'name_category'));
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
		if($this->request->is('get')){
			$keyword = $this->request->query['search'];
			$this->Paginator->settings = array(
				'conditions' => array ('Product.name LIKE' => '%' . $keyword . '%'),
				'limit' => 16
			);
			$data = $this->Paginator->paginate('Product');
			$this->set(compact('data'));
		}
	}

	public function newProduct(){
		$new_product = $this->Product->find('all', array(
			'order' => array('id' => 'DESC'),
			'limit' => 10
		));

		$this->log($new_product);
		$this->set('new_product', $new_product);
		$this->render('index');
	}

    /*------------------admin----------------*/

    public function listProductAdmin() {
        $this->layout = 'admin';

        $products = $this->Product->find('all');

        $this->set('products', $products);

        $this->set('commons', [
            'breadcrumbs' => [
                ['Sản phẩm', ['controller' => 'products', 'action' => 'listProductAdmin']],
            ],
            'header' => ['Quản Lý Sản phẩm', 'Danh sách']
        ]);
    }

    public function addProduct() {
        $this->layout = 'admin';

        $this->__showProductForm();

    }

    public function editProduct($id = null) {
        $this->layout = 'admin';

	    $this->__showProductForm($id);

    }

    private function __showProductForm($id = null) {
        $catogories = $this->Category->find('all');
        $fileName = 'img/no-photo.png';

        if ($id) {
            $product = $this->Product->findById($id);
            $fileName = $product['Product']['image'];

            $this->set('product', $product);
            $this->set('commons', [
                'breadcrumbs' => [
                    ['Sản phẩm', ['controller' => 'products', 'action' => 'editProduct']],
                ],
                'header' => ['Quản Lý Sản phẩm', 'Chỉnh sửa']
            ]);
        } else {
            $this->set('commons', [
                'breadcrumbs' => [
                    ['Sản phẩm', ['controller' => 'products', 'action' => 'addProduct']],
                ],
                'header' => ['Quản Lý Sản phẩm', 'Thêm sản phẩm']
            ]);
        }

        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;
            if ($id) {
                $this->Product->id = $id;
            } else {
                $this->Product->create();
            }

            //Update image
            $fileInfo = $_FILES['image'];
            if (!empty($fileInfo['name'])) {
                $absolutePath = 'img/'. $fileInfo['name'];
                $path = WWW_ROOT . $absolutePath;
                move_uploaded_file($fileInfo['tmp_name'], $path);
                $fileName = $absolutePath;
            }

            $data['image'] = $fileName;

            $this->Product->set($data);

            if ($this->Product->save()) {

                $this->Session->setFlash('Lưu sản phẩm thành công!', 'success', array(), 'good');
                return $this->redirect('/products/listProductAdmin');
            } else {
                $this->Session->setFlash('Không thể lưu dữ liệu', 'success', array(), 'bad');
                return false;
            }
        }
        $this->set('categories', $catogories);
        $this->render('add_product');
    }

    public function deleteProduct() {

        $this->layout = false;
        $this->autoRender = false;

        $id = $this->request->pass[0];

        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }


        if ($this->Product->delete($id)) {
            $this->Session->setFlash('Xoá sản phẩm thành công!', 'success', array(), 'bad', '30');
            return $this->redirect('/products/listProductAdmin');
        } else {
            $this->Session->setFlash('Không thể xoá dữ liệu!', 'success', array(), 'bad');
            return false;
        }
    }
}
