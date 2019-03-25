<?php
App::uses('CommonController', 'Controller');

class AjaxController extends CommonController {
	public $uses = array('Product', 'Comment', 'User');
    private $_user;

    public $autoRender = false;

	public $layout = 'ajax';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('postComment');
		$this->_user = $this->Auth->User();
    }
    
    public function postComment() {
        $now = date('Y/m/d H:i:s');
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
}