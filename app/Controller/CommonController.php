<?php
App::uses('AppController', 'Controller');
App::uses('Security', 'Utility');
App::uses('CakeEmail', 'Network/Email');

App::import('Vendor', 'Package',array('file' => 'vendor/autoload.php'));

class CommonController extends AppController {
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
        	$this->Auth->allow();
        }

        $this->set('user', $this->Auth->user());
	}
}