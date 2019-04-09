<?php

App::uses('CommonController', 'Controller');

class AdminController extends CommonController {
    public $uses = array('Product', 'Comment', 'Order', 'CartProduct', 'User');
    private $_user;
    public $layout = 'admin';

    public function beforeFilter() {
        parent::beforeFilter();
        // $this->Auth->allow('index', 'detail', 'listCart', 'deleteOrder', 'detailOrder', 'editOrder');

        $this->_user = $this->Auth->User();
    }

    //Home page
    public function index(){
        $this->set('commons', [
            'breadcrumbs' => [
                ['Admin', ['controller' => 'admin', 'action' => 'index']],
                ['List']
            ],
            'header' => ['Admin', 'Home']
        ]);
    }

    //
    public function detail(){

    }

    // order list
    public function listCart() {
        $this->set('commons', [
            'breadcrumbs' => [
                ['Admin', ['controller' => 'admin', 'action' => 'list']],
                ['List']
            ],
            'header' => ['Quản Lý Đơn Hàng', 'Danh Sách']
        ]);

        $data = $this->Order->find('all');

        $this->set('data', $data);

        $this->render('list');
    }

    //detail
    public function detailOrder() {
        $this->autoRender = false;

        $data = $this->request->data;

        if ($this->request->is(array('post', 'put'))) {
            if (isset($data)) {
                return true;
            } else {
                return false;
            }

        } else {
            $id = $this->request->pass[0];

            $order = $this->Order->findById($id);
            $cart = $this->CartProduct->find('all',array('conditions' => array('cart_id' => $order['Order']['cart_id'])));

            $this->set('commons', [
                'breadcrumbs' => [
                    ['Admin', ['controller' => 'admin', 'action' => 'list']],
                    ['List']
                ],
                'header' => ['Quản Lý Đơn Hàng', 'Chi tiết đơn hàng']
            ]);

            $this->set('order', $order);
            $this->set('products', $cart);
            $this->render('detail');
        }

    }

    //edit Order
    public function editOrder() {
        $this->autoRender = false;

        $data = $this->request->data;

        if (isset($data)) {
            $res = $this->Order->findById($data['order_id']);
            $this->Order->id = $data['order_id'];
            $tmp = $res['Order'];
            $tmp['status'] = $data['status'];

            if($this->Order->save($tmp)) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    //delete Order
    public function deleteOrder() {
        $this->autoRender = false;

        $data = $this->request->data;

        if (isset($data)) {
            $order = $this->Order->findById($data['order_id']);
            $products = $this->CartProduct->find('all', array('conditions' => array('cart_id'=> $order['Oder']['cart_id'])));

            $this->Order->delete($data['order_id']);
            $this->Cart->delete($order['Oder']['cart_id']);

            foreach ($products as $val) {
                $this->CartProduct->delete($val['CartProduct']['id']);
            }
        }

        return true;
    }


}
