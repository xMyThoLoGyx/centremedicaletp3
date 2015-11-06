<?php
App::uses('AppController', 'Controller');
/**
 * Rencontres Controller
 *
 * @property Rencontre $Rencontre
 * @property PaginatorComponent $Paginator
 */
class RencontresController extends AppController {

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
		$this->Rencontre->recursive = 0;
		$this->set('rencontres', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Rencontre->exists($id)) {
			throw new NotFoundException(__('Invalid rencontre'));
		}
		$options = array('conditions' => array('Rencontre.' . $this->Rencontre->primaryKey => $id));
		$this->set('rencontre', $this->Rencontre->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Rencontre->create();
			if ($this->Rencontre->save($this->request->data)) {
				$this->Session->setFlash(__('The rencontre has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rencontre could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$patients = $this->Rencontre->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Rencontre->id = $id;
		if (!$this->Rencontre->exists($id)) {
			throw new NotFoundException(__('Invalid rencontre'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Rencontre->save($this->request->data)) {
				$this->Session->setFlash(__('The rencontre has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rencontre could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Rencontre.' . $this->Rencontre->primaryKey => $id));
			$this->request->data = $this->Rencontre->find('first', $options);
		}
		$patients = $this->Rencontre->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Rencontre->id = $id;
		if (!$this->Rencontre->exists()) {
			throw new NotFoundException(__('Invalid rencontre'));
		}
		if ($this->Rencontre->delete()) {
			$this->Session->setFlash(__('Rencontre deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Rencontre was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
