<?php

App::uses('AppController', 'Controller');

/**
 * Medicaments Controller
 *
 * @property Medicament $Medicament
 * @property PaginatorComponent $Paginator
 */
class MedicamentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator','RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Medicament->recursive = 1;
        $this->set('medicaments', $this->paginate());
        $term = $this->request->query('term');
        $medNames = $this->Medicament->getMedNames($term);
        $this->set(compact('medNames'));
        $this->set('_serialize', 'medNames');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Medicament->exists($id)) {
            throw new NotFoundException(__('Invalid medicament'));
        }
        $options = array('conditions' => array('Medicament.' . $this->Medicament->primaryKey => $id));
        $this->set('medicament', $this->Medicament->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $medNames = $this->Medicament->getMedNames($term);          
            $this->set(compact('medNames'));
            $this->set('_serialize', 'medNames');
        }else
        if ($this->request->is('post')) {
            $this->Medicament->create();
            $this->request->data['Patient']['user_id'] = $this->Auth->user('id');
            if ($this->Medicament->save($this->request->data)) {
                $this->Session->setFlash(__('The medicament has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The medicament could not be saved. Please, try again.'), 'flash/error');
            }
        }


       

        $patients = $this->Medicament->Patient->find('list');
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
        $this->Medicament->id = $id;
        
        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $medNames = $this->Medicament->getMedNames($term);          
            $this->set(compact('medNames'));
            $this->set('_serialize', 'medNames');
        }
        
        
        if (!$this->Medicament->exists($id)) {
            throw new NotFoundException(__('Invalid medicament'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Medicament->save($this->request->data)) {
                $this->Session->setFlash(__('The medicament has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The medicament could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Medicament.' . $this->Medicament->primaryKey => $id));
            $this->request->data = $this->Medicament->find('first', $options);
        }
        
        $patients = $this->Medicament->Patient->find('list');
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
        $this->Medicament->id = $id;
        if (!$this->Medicament->exists()) {
            throw new NotFoundException(__('Invalid medicament'));
        }
        if ($this->Medicament->delete()) {
            $this->Session->setFlash(__('Medecins deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Medecins was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Medicament->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    
      public function about() {
          
      }

}
