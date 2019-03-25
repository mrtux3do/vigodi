<?php
/**
 * AuthController
 */
App::uses('CommonController', 'Controller');

class AuthController extends CommonController {
	public $uses = array("User");

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('set_password');
	}

	public function login() {
		$this->autoLayout = false;
		$this->autoRender = false;
		//not login
		if ($this->request->is('post')) {
		    $this->set('login', true);
            if ($this->Auth->login()) {
            	//rewrite session
            	$arr = $this->User->read(null, $this->Auth->User('id'));
				unset($arr['User']['password']);
	            $this->Session->write('Auth', $arr);
				if ($this->request->data('remember')) {
					$data = $this->Auth->user();
					$data['password'] = $this->Auth->password($this->request->data('User.password'));
					$this->Cookie->write('User', $data, true, '2 weeks');
				}
				//delete session redirect -> when login again, redirect to the default of Auth->redirectUrl()
				$this->Session->delete('Auth.redirect');
                return $this->redirect($this->Auth->redirectUrl());
			}
		}

	}

	public function logout() {
		$this->autoLayout = false;
		$this->autoRender = false;
		$this->Session->destroy();
		$this->Cookie->destroy();
		return $this->redirect($this->Auth->logout());
	}
}