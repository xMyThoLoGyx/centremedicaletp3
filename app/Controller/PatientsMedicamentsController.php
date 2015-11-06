<?php
App::uses('AppController', 'Controller');
/**
 * PatientsMedicaments Controller
 *
 * @property PatientsMedicament $PatientsMedicament
 * @property PaginatorComponent $Paginator
 */
class PatientsMedicamentsController extends AppController {

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
		$this->PatientsMedicament->recursive = 0;
		$this->set('patientsMedicaments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PatientsMedicament->exists($id)) {
			throw new NotFoundException(__('Invalid patients medecin'));
		}
		$options = array('conditions' => array('PatientsMedicament.' . $this->PatientsMedicament->primaryKey => $id));
		$this->set('patientsMedicament', $this->PatientsMedicament->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PatientsMedicament->create();
			if ($this->PatientsMedicament->save($this->request->data)) {
				$this->Session->setFlash(__('The patients medecin has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patients medecin could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$patients = $this->PatientsMedicament->Patient->find('list');
		$medicaments = $this->PatientsMedicament->medecin->find('list');
		$this->set(compact('patients', 'medicaments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->PatientsMedicament->id = $id;
		if (!$this->PatientsMedicament->exists($id)) {
			throw new NotFoundException(__('Invalid patients medecin'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PatientsMedicament->save($this->request->data)) {
				$this->Session->setFlash(__('The patients medecin has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patients medecin could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('PatientsMedicament.' . $this->PatientsMedicament->primaryKey => $id));
			$this->request->data = $this->PatientsMedicament->find('first', $options);
		}
		$patients = $this->PatientsMedicament->Patient->find('list');
		$medicaments = $this->PatientsMedicament->medecin->find('list');
		$this->set(compact('patients', 'medicaments'));
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
		$this->PatientsMedicament->id = $id;
		if (!$this->PatientsMedicament->exists()) {
			throw new NotFoundException(__('Invalid patients medecin'));
		}
		if ($this->PatientsMedicament->delete()) {
			$this->Session->setFlash(__('Patients medecin deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Patients medecin was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
