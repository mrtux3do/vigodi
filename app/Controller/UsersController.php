<?php

App::uses('CommonController', 'Controller');


class UsersController extends CommonController {

	public $uses = array("User", "Role");

	private $__role;

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('register');
        $this->Auth->allow('index');
        $this->Auth->allow('add');
        $this->Auth->allow('profile');
        $this->Auth->allow('edit');

        $this->__role = $this->Role->find('all');
        foreach ($this->__role as &$value) {
            $roleName = $this->_getRoleName($value['Role']['id']);
            $value['Role']['roleName'] = $roleName;
        }

        $this->set('role', $this->__role);
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

	public function index(){
        $this->layout = 'admin';
        
        $data = $this->User->find('all');
        foreach($data as $val) {
            $val["User"]["roleName"] = $this->_getRoleName($val["User"]["user_role_id"]);
            $users[] = $val;
        }
        $this->set('users', $users);
        $this->set('commons', [
            'breadcrumbs' => [
                ['User', ['controller' => 'users', 'action' => 'index']],
                ['List']
            ],
            'header' => ['User', 'member list'],
            'users' => $users
        ]);
    }

    public function add() {
        $this->layout = 'admin';

        $this->set('commons', [
            'breadcrumbs' => [
                ['User', ['controller' => 'users', 'action' => 'add']],
                ['List']
            ],
            'header' => ['User', 'Add new user']
        ]);
    }

    public function profile() {
        $this->layout = 'admin';

//        $uid = $this->request->params['uid'];
//        $user = $this->User->getUserInfo($uid);
//        $this->set("user", $user);
        $this->set('commons', [
            'breadcrumbs' => [
                ['User', ['controller' => 'users', 'action' => 'profile']],
                ['Profile']
            ],
            'header' => ['User', 'profile']
        ]);
    }

    public function edit() {
        $this->layout = 'admin';

        //get user id
//        $id = $this->request->params['id'];
//        if (!$id) {
//            throw new NotFoundException(__('Invalid user'));
//        }
//        $user = $this->User->findById($id);
//
//        if (!$user) {
//            throw new NotFoundException(__('Invalid user'));
//        }
//        if ($this->request->is(array('post', 'put'))) {
//            $this->User->id = $id;
//            $data = $this->request->data;
//            $data['contract_id'] = $user['User']['contract_id'];
//            $data['created_at'] = $user['User']['created_at'];
//            $data['created_uid'] = $user['User']['created_uid'];
//            $data['updated_at'] = date('Y-m-d H:i:s', time());
//            $data['updated_uid'] = $this->Auth->user('id');
//            $data['email'] = $user['User']['email'];
//            //Uplodate user's image
//            $fileInfo = $_FILES['img-profile'];
//            if (!empty($fileInfo['name'])) {
//                $absolutePath = 'img/avatars' . DS . time() . "_" . $fileInfo['name'];
//                $path = WWW_ROOT . $absolutePath;
//                move_uploaded_file($fileInfo['tmp_name'], $path);
//                $fileName = "/" . $absolutePath;
//            } else {
//                $fileName = $user['User']['img-profile'];
//            }
//
//            $data['img-profile'] = $fileName;
//
//            //Check whether password is change or not
//            if ($this->request->data('old_pass') != '') {
//                $passwordHasher = new BlowfishPasswordHasher();
//                $old_pass = $this->request->data('old_pass');
//                $new_pass = $passwordHasher->hash($this->request->data('new_pass'));
//                $chk_pass = $passwordHasher->check($old_pass, $user['User']['password']);
//                // var_dump($chk_pass);
//                if ($chk_pass == true) {
//                    $data['password'] = $new_pass;
//                    // pr($data['password']);exit();
//                } else {
//                    $this->Flash->error('Wrong password!', array(
//                        'key' => 'error_msg'
//                    ));
//                    return $this->redirect($this->referer());
//                }
//            } else {
//                $data['password'] = $user['User']['password'];
//            }
//            // pr($data);exit;
//            //Save data into db
//            if ($this->User->save($data)) {
//                $this->Flash->success('Updated profile successfully !', array(
//                    'key' => 'success_msg'
//                ));
//                return $this->redirect($this->referer());
//            }
//        }
//        if (!$this->request->data) {
//            $this->request->data = $user;
//        }
//        $this->set('certificates', $this->Certificate->getCertificates());
//        $this->set('contracts', $this->Contract->getContracts());
//        $this->set('roles', $this->Role->getRoles());
//        $this->set('status', $this->Status->getStatus());
//        $this->set('positions', $this->Position->getPositions());
//        $this->set('data', $user);
        $this->set('commons', [
            'breadcrumbs' => [
                ['User', ['controller' => 'users', 'action' => 'index']],
                ['Edit']
            ],
            'header' => ['User', 'edit user information']
        ]);
    }

}
