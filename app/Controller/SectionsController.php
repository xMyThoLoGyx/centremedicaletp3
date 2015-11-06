
<?php

App::uses('AppController', 'Controller');

class SectionsController extends AppController {

    public function getByEtage() {
        $etage_id = $this->request->data['Patient']['etage_id'];
        
        $sections = $this->Section->find('list', array(
            'conditions' => array('Section.etage_id' => $etage_id),
            'recursive' => -1
        ));

        $this->set('sections', $sections);
        $this->layout = 'ajax';
    }

}
