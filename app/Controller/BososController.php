<?php
App::uses('AppController', 'Controller');
/**
 * Bosos Controller
 *
 * @property Boso $Boso
 * @property PaginatorComponent $Paginator
 */
class BososController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Boso->recursive = 0;
		$this->set('bosos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Boso->exists($id)) {
			throw new NotFoundException(__('Invalid boso'));
		}
		$options = array('conditions' => array('Boso.' . $this->Boso->primaryKey => $id));
		$this->set('boso', $this->Boso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Boso->create();
			if ($this->Boso->save($this->request->data)) {
				$this->Session->setFlash(__('The boso has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The boso could not be saved. Please, try again.'));
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
		if (!$this->Boso->exists($id)) {
			throw new NotFoundException(__('Invalid boso'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Boso->save($this->request->data)) {
				$this->Session->setFlash(__('The boso has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The boso could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Boso.' . $this->Boso->primaryKey => $id));
			$this->request->data = $this->Boso->find('first', $options);
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
		$this->Boso->id = $id;
		if (!$this->Boso->exists()) {
			throw new NotFoundException(__('Invalid boso'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Boso->delete()) {
			$this->Session->setFlash(__('The boso has been deleted.'));
		} else {
			$this->Session->setFlash(__('The boso could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function timkiemboso() {
		$this->loadModel("Dacbiet");
		$kq_update = $this->Dacbiet->find("first",array(
				"order" => array("ngay_tao desc")
			));
		$date_hq = date("Y-m-d",strtotime('-1 days'));
		if (strtotime($date_hq) > strtotime($kq_update["Dacbiet"]["ngay_tao"])) {
			$this->Dacbiet->capnhatketqua();
		}
		$bosos = $this->Boso->find("all",array(
			"order" => array("hang asc,cot asc")
		));
		$i = 1;
		foreach ($bosos as $boso) {
			if ($boso['Boso']['hang'] == $i) {
				$shows[$i][] = $boso['Boso']; 
			} else {
				$i++;
				$shows[$i][] = $boso['Boso']; 
			}
		}
		$this->set(compact('shows'));
	}

}
