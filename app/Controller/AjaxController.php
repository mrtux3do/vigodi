<?php
App::uses('CommonController', 'Controller');

class AjaxController extends CommonController {
	public $uses = array('Product', 'Comment', 'User', 'Cart', 'Order', 'CartProduct');
    private $_user;

    public $autoRender = false;

	public $layout = 'ajax';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
		$this->_user = $this->Auth->User();
    }

    public function login() {
        $status = false;
        $this->log($this->request->data);
        //not login
        if (isset($this->request->data['email']) && isset($this->request->data['password'])) {
            $email = $this->request->data('email');
            $password = $this->request->data('password');
            $hashedPassword = Security::hash($password, 'md5', true);

            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $email,
                    'User.password' => $hashedPassword
                )
            ));
            if (!empty($user)) {
                //rewrite session
                unset($user['User']['password']);
                $this->Session->write('Auth', $user);
                if ($this->request->data('remember')) {
                    $data = $this->Auth->user();
                    $data['password'] = $this->Auth->password($this->request->data('User.password'));
                    $this->Cookie->write('User', $data, true, '2 weeks');
                }
                //delete session redirect -> when login again, redirect to the default of Auth->redirectUrl()
                $this->Session->delete('Auth.redirect');

                $status = true;
            }
        }
        return json_encode(array(
            'status' => $status
        ));
    }
    
    public function postComment() {
        $now = date('Y/m/d H:i:s');
        $status = false;
        $output = '';
        if (isset($this->request->data['comment']) && isset($this->request->data['product_id'])) {
            $data = array(
                'user_id' => $this->_user['id'],
                'product_id' => $this->request->data['product_id'],
                'message' => $this->request->data['comment'],
                'created_at' => $now
            );
            try {
                $this->Comment->save($data);
                $status = true;
                $output = '<tr><td>' . $this->_user['name'] . '</td><td>' . $now . '</td></tr><tr><td colspan="2"><p>' . $this->request->data['comment'] . '</p></td></tr>';
            } catch (Exception $e) {
                $this->log($e);
            }
        }

        return json_encode(array(
            'status' => $status,
            'output' => $output
        ));
    }

    public function addToCart() {
        $this->log($this->request->data);
        $now = date('Y/m/d H:i:s');
        $status = false;
        $user_id = $this->_user['id'];

        if (isset($this->request->data['product_id']) && isset($this->request->data['number'])) {
            $number = $this->request->data['number'];
            $product_id = $this->request->data['product_id'];
            //kiểm tra xem đã có product này trên t_cart và cart_id này chưa có trong bảng t_order        
            $last_cart = $this->Cart->find('first', array(
                    'conditions' => array('Cart.user_id' => $this->_user['id']),
                    'order' => array('Cart.id' => 'desc')
                )); 
            $last_cart_id = $last_cart['Cart']['id'];  
            $last_order = $this->Order->find('first', array(
                'conditions' => array(
                    'Order.cart_id' => $last_cart_id,
                    'Order.user_id' => $user_id
                ),
                'order' => array('Order.id' => 'desc')                 
            ));

            $cart_product = $this->CartProduct->find('first', array(
                "conditions" => array(
                    "CartProduct.product_id" => $product_id,
                    "CartProduct.cart_id" => $last_cart_id
                ),
                'order' => array('CartProduct.id' => 'desc')     
            ));

            if (empty($cart_product)) {
                if (!empty($last_order) || $last_cart_id == null) {
                    //tao cart mơi
                    $status = $this->__saveCart($product_id, $number);
                } else {
                    //them san pham moi vao cart moi nhat
                    $this->Cart->id = $last_cart_id;
                    $this->Cart->save(array(
                        'created_at' => $now
                    ));
                    $data = array(
                        'cart_id' => $last_cart_id,
                        'product_id' => $product_id,
                        'number' => $number,
                        'created_at' => $now
                    );

                    $this->CartProduct->save($data);
                    $status = true;
                }                

            } else {
                if (!empty($last_order)) {
                    //tao cart moi vi san pham do da thanh toan roi
                    $status = $this->__saveCart($product_id, $number);
                } else {
                    //thêm số lượng sản phầm vào cart đã có vì sản phẩm đó chưa được thanh toan
                    $number = $this->request->data['number'] + $cart_product['CartProduct']['number'];
                    $this->CartProduct->id = $cart_product['CartProduct']['id'];
                    try {
                        $this->CartProduct->save(array(
                            'number' => $number,
                        ));
                        $status = true;
                    } catch (Exception $e) {
                        $status = false;
                    }
                }
            }
        }

        return json_encode(array(
            'status' => $status,
            'number' => $number
        ));
    }

    public function order() {
        $now = date('Y/m/d H:i:s');
        $status = false;
        $user_id = $this->_user['id'];
        if (isset($this->request->data['cart_id'])) {
            $name = isset($this->request->data['name']) ? $this->request->data['name'] : '';
            $email = isset($this->request->data['email']) ? $this->request->data['email'] : '';
            $address = isset($this->request->data['address']) ? $this->request->data['address'] : '';
            $phone = isset($this->request->data['phone']) ? $this->request->data['phone'] : '';

            $data = array(
                'cart_id' => $this->request->data['cart_id'],
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone, 
                'created_at' => $now,
                'user_id' => $user_id
            );

            $this->Order->save($data);
            $status = true;
        }
        
        return json_encode(array(
            'status' => $status
        ));
    }

    public function updateCart() {
        $now = date('Y/m/d H:i:s');
        $status = false;

        if (isset($this->request->data['cart_product_id']) && isset($this->request->data['number'])) {
            $this->CartProduct->id = $this->request->data['cart_product_id'];
            $this->CartProduct->save(array(
                'number' => $this->request->data['number'],
                'updated_date' => $now
            ));

            $carts = $this->__getCart();

            $total = $carts['total'];
            $cart_number = $carts['cart_number'];

            $status = true;
        }

        return json_encode(array(
            'status' => $status,
            'total' => $total,
            'cart_number' => $cart_number
        ));
    }

    public function deleteCart() {
        $status = true;

        if (isset($this->request->data['cart_product_id'])) {
            $id = $this->request->data['cart_product_id'];
            try {
                $this->CartProduct->delete($id);

                $carts = $this->__getCart();

                $total = $carts['total'];
            } catch (Exception $e) {
                $this->log($e->getMessage());

                return false;
            }
        }

        return json_encode(array(
            'status' => $status,
            'total' => $total
        ));
    }

    private function __saveCart($product_id, $number) {
        $now = date('Y/m/d H:i:s');
        $cart = array(
            'user_id' => $this->_user['id'],
            'product_id' => $product_id,            
            'created_at' => $now
        );
        try {
            $this->Cart->save($cart);
        
            //save t_cart_product
            $cart_id = $this->Cart->getLastInsertID();
            $this->CartProduct->save(array(
                'cart_id' => $cart_id,
                'product_id' => $product_id,
                'number' => $number,
                'created_at' =>$now
            ));
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}