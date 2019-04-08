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
        $this->Auth->allow('edit', 'delete');

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
                    $this->set('message2', 'last-name không được quá 255 ký tự');
                }
                $tmpInfo['name'] = $name;
            } else {
    			$this->set('message2', 'last-name không được bỏ trống');
    			$tmpInfo['name'] = '';
                $status = false;
    		}

    		if ($this->request->data['e-mail'] != NULL) {
                $inputEmail = $this->request->data['e-mail'];

    		    // validate email
                if (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
                    $this->set('message3', 'email không đúng định dạng.');
                    $status = false;
                } else {
                    // check email in dbs
                    $option = array('User.email' => $inputEmail);
                    $userCheck = $this->User->find('first', array('conditions' => $option));
                    if (!empty($userCheck)) {                   
                        $this->set('message3', 'email đã tồn tại');
                        $status = false;                  
                    } 
                    
                    $tmpInfo['email']          = $inputEmail;
                    $tmpInfo['hashed_email']   = Security::hash($inputEmail, 'md5', true);
                }                
            } else {
                $this->set('message3', 'email không được bỏ trống.');
                $tmpInfo['email'] = '';
                $status = false;
            }

            if ($this->request->data['phone-number'] != NULL) {
                $phone = $this->request->data['phone-number'];
                // validate phone
                if(!preg_match("/^[0-9]{10}$/", $phone)) {
				  	$this->set('message4', 'phone-number không đúng định dạng.');
                    $status = false;
				}
				$tmpInfo['phone'] = $phone;
            } else {
    			$this->set('message4', 'phone-number không được bỏ trống');
    			$tmpInfo['phone'] = '';
                $status = false;
    		}

    		if ($this->request->data['password'] != NULL) {
                $password = $this->request->data['password'];
                $tmpInfo['password'] = Security::hash($password, 'md5', true);
            } else {
    			$this->set('message5', 'password không được bỏ trống');
    			$tmpInfo['password'] = '';
                $status = false;
    		}

    		if ($this->request->data['re-password'] != NULL) {
                $re_password = $this->request->data['re-password'];
                if($re_password != $password) {
                	$this->set('message6', 're-password phải giống password.');
                    $status = false;
                }
                $tmpInfo['re-password'] = Security::hash($re_password, 'md5', true);
            } else {
    			$this->set('message6', 're-password không được bỏ trống');
    			$tmpInfo['password'] = '';
                $status = false;
    		}

    		if (isset($this->request->data['gender'])) {
                $gender = $this->request->data['gender'];
                $tmpInfo['gender'] = $gender;
            } 

    		if ((preg_match('/^[0-9]*$/', ($this->request->data['day']))) && (preg_match('/^[0-9]*$/', ($this->request->data['month']))) && (preg_match('/^[0-9]*$/', ($this->request->data['year'])))) {

                $day = $this->request->data['day'];
                $month = $this->request->data['month'];
                $year = $this->request->data['year'];
                $dob =  date('Y-m-d', strtotime($day . '-' . $month. '-' . $year));
                $tmpInfo['dob'] = $dob;
            }

    		if ($status) {
    			$this->Session->write('addUserInfo', $tmpInfo);
    			 try {
                    $user = $this->User->save($tmpInfo);
                    unset($user['password'], $tmpInfo['re-password']);

                    $this->Session->write('Auth', $user);
                    $tmpInfo = array();
                    $this->redirect(array('controller' => 'products', 'action' => 'index'));
                } catch (Exception $e) {
                    echo $e->getMessage();
                    return false;
                }
    		}
            $this->set('tmpInfo', $tmpInfo);
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

        if ($this->request->is(array('post', 'put'))) {
            $this->User->create();
            $data = $this->request->data;
            $data['created_at'] = date("Y-m-d H:i:s");

            if ($this->User->save($data)) {
                $result['success'] = true;
                return $this->redirect('index');
            } else {
                $result['success'] = false;
                return false;
            }
        }

        $this->set('commons', [
            'breadcrumbs' => [
                ['User', ['controller' => 'users', 'action' => 'add']],
                ['List']
            ],
            'header' => ['Khách hàng', 'Thêm mới']
        ]);
    }

    public function profile() {
        $this->layout = 'admin';

        $id = $this->request->pass[0];
        $user = $this->User->findById($id);

        $this->set("user", $user);
        $this->set('commons', [
            'breadcrumbs' => [
                ['User', ['controller' => 'users', 'action' => 'profile']],
                ['Profile']
            ],
            'header' => ['Khách hàng', 'Thông tin cá nhân']
        ]);
    }

    public function edit() {
        $this->layout = 'admin';

        //get user id
        $id = $this->request->pass[0];

        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }
        $user = $this->User->findById($id);

        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
            $data = $this->request->data;
            $data['hashed_email'] = $user['User']['hashed_email'];
            $data['re-password'] = $user['User']['re-password'];
            $data['created_at'] = $user['User']['created_at'];
            $data['user_role_id'] = $user['User']['user_role_id'];
            $data['updated_at'] = date('Y-m-d H:i:s', time());
            $data['updated_uid'] = $this->Auth->user('id');
            $data['dob'] = $user['User']['dob'];

            //Check whether password is change or not
            if ($this->request->data('old_pass') != '') {
                $passwordHasher = new BlowfishPasswordHasher();
                $old_pass = $this->request->data('old_pass');
                $new_pass = $passwordHasher->hash($this->request->data('new_pass'));
                $chk_pass = $passwordHasher->check($old_pass, $user['User']['password']);

                if ($chk_pass == true) {
                    $data['password'] = $new_pass;
                } else {
                    $this->Flash->error('Wrong password!', array(
                        'key' => 'error_msg'
                    ));
                    return $this->redirect($this->referer());
                }
            } else {
                $data['password'] = $user['User']['password'];
            }

            //Save data into db
            if ($this->User->save($data)) {
                $this->Session->setFlash('Something 111111111 bad.', 'success', array(), 'bad');
                return $this->redirect('index');
            }
        }
        if (!$this->request->data) {
            $this->request->data = $user;
        }

        $this->set('user', $user);
        $this->set('commons', [
            'breadcrumbs' => [
                ['User', ['controller' => 'users', 'action' => 'index']],
                ['Edit']
            ],
            'header' => ['Khách hàng', 'Chỉnh sửa thông tin khách hàng']
        ]);
    }

    public function delete() {
        $this->layout = 'admin';

        $this->layout = false;
        $this->autoRender = false;

        //get user id
        $id = $this->request->pass[0];

        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }


        if ($this->User->delete($id)) {
            return $this->redirect('index');
        } else {
            return false;
        }
    }

}
