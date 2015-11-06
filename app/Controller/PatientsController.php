<?php

App::uses('AppController', 'Controller');

/**
 * Patients Controller
 *
 * @property Patient $Patient
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 */
class PatientsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash');
    public $helpers = array('Js');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Patient->recursive = 1;
        $this->set('patients', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Patient->exists($id)) {
            throw new NotFoundException(__('Invalid patient'));
        }
        $options = array('conditions' => array('Patient.' . $this->Patient->primaryKey => $id));
        $this->set('patient', $this->Patient->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Patient->create();
            $this->request->data['Patient']['user_id'] = $this->Auth->user('id');
            $this->request->data['User']['active'] = $this->Auth->user('active');
            $data = $this->request->data['Patient'];
            if (!$data['imageProfil']['name']){
                unset($data['imageProfil']);
            }
                      
            if($this->Auth->user('active') == 1){
            if ($this->Patient->save($this->request->data)) {
                $this->flash(__('Patient saved.'), array('action' => 'index'));
                $this->redirect(array('action' => 'index'));
            } else {
                 
            }
            }else{
                $this->flash(__('Please verify your email before adding patients.'), array('action' => 'index'));
                $this->redirect(array('action' => 'index'));
            }
        }
        $etages = $this->Patient->Section->Etage->find('list');
        $sections = array('choisir section');
        $users = $this->Patient->User->find('list');
        $medicaments = $this->Patient->Medicament->find('list');
        $this->set(compact('users', 'medicaments', 'etages', 'sections'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Patient->id = $id;
        if (!$this->Patient->exists($id)) {
            throw new NotFoundException(__('Invalid patient'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {         
            $data = $this->request->data['Patient'];
            if (!$data['imageProfil']['name']){
                unset($data['imageProfil']);
            }       

            if ($this->Patient->save($this->request->data)) {      
                $this->flash(__('The patient has been saved.'), array('action' => 'index'));
            } else {
                
            }
        } else {
            $options = array('conditions' => array('Patient.' . $this->Patient->primaryKey => $id));
            $this->request->data = $this->Patient->find('first', $options);
        }
        
        $etages = $this->Patient->Section->Etage->find('list');
        $sections = array('choisir section');
        $users = $this->Patient->User->find('list');
        $medicaments = $this->Patient->Medicament->find('list');
        $this->set(compact('users', 'medicaments','etages', 'sections'));
        
        
        
        
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
        $this->Patient->id = $id;
        if (!$this->Patient->exists()) {
            throw new NotFoundException(__('Invalid patient'));
        }
        if ($this->Patient->delete()) {
            $this->flash(__('Patient deleted'), array('action' => 'index'));
        }
        $this->flash(__('Patient was not deleted'), array('action' => 'index'));
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Patient->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
