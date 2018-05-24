<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
    	parent::beforeFilter();
		$this->layout = "templatelogin";	
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function login() { 
		$this->loadModel("Giahan");
		$giahan = $this->Giahan->find("first");
		if (empty($giahan)) {
			$data["imei"] = rand(100000000,999999999);
			$data["ngay_het_han"] = date("Y-m-d");
			$data["link"] = "http://hostingkqxs.esy.es/registerApp.php?imei="; 
			$this->Giahan->create();
			$this->Giahan->save($data);
			$this->redirect(array("action" => "login"));
		}
		if (strtotime($giahan["Giahan"]["ngay_het_han"]) > strtotime(date("Y-m-d"))) {
			if ($this->request->is('post')) {
		        if ($this->Auth->login()) {
		            return $this->redirect($this->Auth->redirectUrl());
		        } else {
		        	$error = "Sai tên đăng nhập hoặc mật khẩu";
		        	$this->set(compact("error"));
		        }
		    }
		} else {
			$error = "Tài khoản của bạn đã hết hạn!<br/>làm ơn đăng kí để tiếp tục sử dụng";
		    $this->set(compact("error"));
		}
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

	public function changepassword() {
		if ($this->request->is("post")) {
			$data = $this->request->data["User"];
			$users = $this->User->find("first",array(
				"conditions" => array(
					"id" => $this->Auth->User("id")
				)
			));
			if (!empty($users)) {
				if ($data["password"] != "" && $data["new_password"] != "" && $data["confirm_password"] != "") {
					$result = $this->User->check($data["password"],$users["User"]["password"]);
					if ($result) {
						if ($data["new_password"] == $data["confirm_password"]) {
							$this->User->id = $this->Auth->User("id");
							if ($this->User->saveField('password',$data["password"])) {
								$this->redirect(array("action" => "login"));
							}else{
								$error = "Đã có lỗi xảy ra";
							}
						} else {
							$error = "sai mật khẩu xác thực";
						}
					} else {
						$error = "sai mật khẩu cũ";
					}
				} else {
					$error = "vui lòng điền tất cả các ô còn trống";
				}
			} else {
				$error = "Hãy liên hệ với chúng tôi khi quên mật khẩu";
			}
			$this->set(compact("error"));
		}
	}

	public function forget_password() {
		$this->autoRender = false;
		$users = $this->User->find("first",array(
				"conditions" => array(
					"username" => "admin"
				)
			));
		if (!empty($users)) {
			$this->User->id = $users['User']["id"];
			if ($this->User->saveField('password',"123456")) {
				$this->Session->setFlash(__('Mật khẩu mới là 123456.'));
				$this->redirect(array("action" => "login"));
			}else{
				$this->redirect(array("action" => "add"));
			}
		} else {
			$this->redirect(array("action" => "add"));
		}
	}
}
