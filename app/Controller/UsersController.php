<?php

App::uses('CommonController', 'Controller');


class UsersController extends CommonController {

	public $uses = array("User", "Role");

	private $__role;

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('register');

		$this->__role = $this->Role->find('all');
	}

	public function register(){
		$tmpInfo = array();
		$errorMessage1 = '';
		$errorMessage2 = '';
		$status = true;
		if ($this->request->is('post')) {
			if ($this->request->data['first-name'] != NULL) {
                $f_name = $this->request->data['first-name'];
                if(strlen($f_name) > 255) {
                    $status = false;
                    $this->set('message1', 'first-name không được quá 255 ký tự');
                }
                $tmpInfo['f_name'] = $f_name;
            } else {
    			$this->set('message1', 'first-name không được bỏ trống');
    			$tmpInfo['f_name'] = '';
                $status = false;
    		}

    		if ($this->request->data['last-name'] != NULL) {
                $name = $this->request->data['last-name'];
                if(strlen($name) > 255) {
                    $status = false;
                    $this->set('message1', 'last-name không được quá 255 ký tự');
                }
                $tmpInfo['name'] = $name;
            } else {
    			$this->set('message1', 'last-name không được bỏ trống');
    			$tmpInfo['name'] = '';
                $status = false;
    		}

    		if ($this->request->data['e-mail'] != NULL) {
                $inputEmail = $this->request->data['e-mail'];

    		    // validate email
                if (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
                    $this->set('message2', 'email không đúng định dạng.');
                    $status = false;
                }

                // check email in dbs
                $option = array('User.email' => $inputEmail);
                $userCheck = $this->User->find('all', array('conditions' => $option));
                if (count($userCheck) > 0) {                   
                    $this->set('message2', 'email đã tồn tại');
                    $status = false;                  
                } 
                
                $tmpInfo['email']          = $inputEmail;
                $tmpInfo['hashed_email']   = Security::hash($inputEmail, 'md5', true);
            } else {
                $this->set('message2', 'email không được bỏ trống.');
                $tmpInfo['email'] = '';
                $status = false;
            }

            if ($this->request->data['phone-number'] != NULL) {
                $phone = $this->request->data['phone-number'];
                // validate phone
                if(!preg_match("/^[0-9]{10}$/", $phone)) {
				  	$this->set('message2', 'phone-number không đúng định dạng.');
                    $status = false;
				}
				$tmpInfo['phone'] = $phone;
            } else {
    			$this->set('message1', 'phone-number không được bỏ trống');
    			$tmpInfo['phone'] = '';
                $status = false;
    		}

    		if ($this->request->data['password'] != NULL) {
                $password = $this->request->data['password'];
                $tmpInfo['password'] = Security::hash($password, 'md5', true);
            } else {
    			$this->set('message1', 'password không được bỏ trống');
    			$tmpInfo['password'] = '';
                $status = false;
    		}

    		if ($this->request->data['re-password'] != NULL) {
                $re_password = $this->request->data['re-password'];
                if($re_password != $password) {
                	$this->set('message2', 're-password phải giống password.');
                    $status = false;
                }
                $tmpInfo['re-password'] = Security::hash($re_password, 'md5', true);
            } else {
    			$this->set('message1', 're-password không được bỏ trống');
    			$tmpInfo['password'] = '';
                $status = false;
    		}

    		if ($this->request->data['gender'] != NULL) {
                $gender = $this->request->data['gender'];
                $tmpInfo['gender'] = $gender;
            } else {
    			$this->set('message1', 'gender không được bỏ trống');
    			$tmpInfo['gender'] = '';
                $status = false;
    		}

    		if ($this->request->data['day'] != NULL && $this->request->data['month'] != NULL && $this->request->data['year'] != NULL) {
                $day = $this->request->data['day'];
                $month = $this->request->data['month'];
                $year = $this->request->data['year'];
                $dob =  date('Y-m-d', strtotime($day . '-' . $month. '-' . $year));
                $tmpInfo['dob'] = $dob;
            } else {
    			$this->set('message1', 'ngày tháng  không được bỏ trống');
    			$tmpInfo['dob'] = '';
                $status = false;
    		}

    		if ($status) {
    			$this->Session->write('addUserInfo', $tmpInfo);
    			 try {
                    $this->User->save($tmpInfo);
                    $this->redirect(array('controller' => 'pages', 'action' => 'display'));
                } catch (Exception $e) {
                    echo $e->getMessage();
                    return false;
                }
    		}
		} else {
            if ($this->Session->check('addUserInfo')) {
                $tmpInfo = $this->Session->read('addUserInfo');
                $this->set('tmpInfo', $tmpInfo);
            }
        }
	}

}
