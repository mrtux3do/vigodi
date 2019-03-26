<?php

App::uses('CommonController', 'Controller');

class AdminController extends CommonController {
    public $uses = array('Product', 'Comment');
    private $_user;
    public $layout = 'admin';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'detail');

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


}