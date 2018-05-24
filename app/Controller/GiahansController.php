<?php
App::uses('AppController', 'Controller');
/**
 * Giahans Controller
 *
 * @property Giahan $Giahan
 * @property PaginatorComponent $Paginator
 */
class GiahansController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
    	parent::beforeFilter();
		$this->layout = false;
		$this->autoRender = false;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Giahan->recursive = 0;
		$this->set('giahans', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Giahan->exists($id)) {
			throw new NotFoundException(__('Invalid giahan'));
		}
		$options = array('conditions' => array('Giahan.' . $this->Giahan->primaryKey => $id));
		$this->set('giahan', $this->Giahan->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Giahan->create();
			if ($this->Giahan->save($this->request->data)) {
				$this->Session->setFlash(__('The giahan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The giahan could not be saved. Please, try again.'));
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
		if (!$this->Giahan->exists($id)) {
			throw new NotFoundException(__('Invalid giahan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Giahan->save($this->request->data)) {
				$this->Session->setFlash(__('The giahan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The giahan could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Giahan.' . $this->Giahan->primaryKey => $id));
			$this->request->data = $this->Giahan->find('first', $options);
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
		$this->Giahan->id = $id;
		if (!$this->Giahan->exists()) {
			throw new NotFoundException(__('Invalid giahan'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Giahan->delete()) {
			$this->Session->setFlash(__('The giahan has been deleted.'));
		} else {
			$this->Session->setFlash(__('The giahan could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function giahan() {
		$giahan = $this->Giahan->find("first");
		if (empty($giahan)) {
			$data["imei"] = rand(100000000,999999999);
			$data["ngay_het_han"] = date("Y-m-d",strtotime("-1 days"));
			$data["link"] = "http://hostingkqxs.esy.es/registerApp.php?iccid="; 
			$url = 'http://hostingkqxs.esy.es/lockApp.php?iccid='.$data["imei"]; 
			// Khởi tạo CURL
			$ch = curl_init($url);
			// Thiết lập có return
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			$this->Giahan->create();
			if ($this->Giahan->save($data)) {
				$this->redirect(array("action" => "giahan"));
			}
		} else {
			$url = 'http://hostingkqxs.esy.es/registerApp.php?imei='.$giahan["Giahan"]["imei"]; 
			// Khởi tạo CURL
			$ch = curl_init($url);
			// Thiết lập có return
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			$this->Giahan->id = $giahan["Giahan"]["id"];
			if ($this->Giahan->saveField("ngay_het_han",$result)) {
				$this->Session->setFlash(__('Ngày Hết Hạn Của Bạn Là : ').$result."<br>imei : ".$giahan["Giahan"]["imei"], 'default', array('class' => 'alert alert-info'));
			} else {
				$this->Session->setFlash(__('Chưa thể tìm thấy kết quả'));
			}
			$this->redirect(array("controller" => "users","action" => "login"));
		}
	}
}
