<?php

App::uses('CommonController', 'Controller');

class AdminController extends CommonController {
    public $uses = array('Product', 'Comment', 'Order', 'CartProduct', 'User');
    private $_user;
    public $layout = 'admin';

    public function beforeFilter() {
        parent::beforeFilter();

        $this->_user = $this->Auth->User();
    }

    //Home page
    public function index(){
        $this->set('commons', [
            'breadcrumbs' => [
                ['Admin', ['controller' => 'admin', 'action' => 'index']],
            ],
            'header' => ['Admin', 'Trang chủ']
        ]);
    }

    // order list
    public function listOrder() {
        $this->set('commons', [
            'breadcrumbs' => [
                ['Đơn hàng', ['controller' => 'admin', 'action' => 'list']],
            ],
            'header' => ['Quản Lý Đơn Hàng', 'Danh Sách']
        ]);

        $data = $this->Order->find('all');

        $this->set('data', $data);

        $this->render('list');
    }

    //detail
    public function detailOrder() {
        $this->layout = 'admin';

        $id = $this->request->pass[0];

        $order = $this->Order->findById($id);
        $cart = $this->CartProduct->find('all',array('conditions' => array('cart_id' => $order['Order']['cart_id'])));

        $this->set('commons', [
            'breadcrumbs' => [
                ['Đơn Hàng', ['controller' => 'admin', 'action' => 'list']],
            ],
            'header' => ['Quản Lý Đơn Hàng', 'Chi tiết đơn hàng']
        ]);

        $this->set('order', $order);
        $this->set('products', $cart);
        $this->render('detail');


    }

    //edit Order
    public function editOrder() {
        $this->layout = 'admin';

        $id = $this->request->pass[0];
        $order = $this->Order->findById($id);

        if ($this->request->is(array('post', 'put'))) {
            $this->Order->id = $id;
            $data = $this->request->data;
            $data['cart_id'] = $order['Order']['cart_id'];
            $data['user_id'] = $order['Order']['user_id'];
            $data['updated_date'] = date('Y-m-d H:i:s', time());

            $this->Order->set($data);

            if ($this->Order->save()) {

                $this->Session->setFlash('Lưu đơn hàng thành công!', 'success', array(), 'good');
                return $this->redirect('/admin/listOrder');
            } else {
                $this->Session->setFlash('Không thể lưu dữ liệu', 'success', array(), 'bad');
                return false;
            }

        } else {
            $cart = $this->CartProduct->find('all',array('conditions' => array('cart_id' => $order['Order']['cart_id'])));
            $this->set('order', $order);
            $this->set('products', $cart);
        }

        $this->set('commons', [
            'breadcrumbs' => [
                ['Đơn Hàng', ['controller' => 'admin', 'action' => 'list']],
            ],
            'header' => ['Quản Lý Đơn Hàng', 'Chỉnh sửa đơn hàng']
        ]);

        $this->render('edit_order');
    }

    //delete Order
    public function deleteOrder() {
        $this->autoRender = false;

        $id = $this->request->pass[0];

        if (isset($data)) {
            $order = $this->Order->findById($id);
            $products = $this->CartProduct->find('all', array('conditions' => array('cart_id'=> $order['Oder']['cart_id'])));

            $this->Order->delete($id);
            $this->Cart->delete($order['Oder']['cart_id']);

            foreach ($products as $val) {
                $this->CartProduct->delete($val['CartProduct']['id']);
            }
        }

        return true;
    }


}
