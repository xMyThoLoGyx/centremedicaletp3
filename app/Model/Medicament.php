<?php
App::uses('AppModel', 'Model');
/**
 * Medicament Model
 *
 * @property Patient $Patient
 */
class Medicament extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nom';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nom' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Patient' => array(
			'className' => 'Patient',
			'joinTable' => 'patients_medicaments',
			'foreignKey' => 'medicament_id',
			'associationForeignKey' => 'patient_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
        
         public function isOwnedBy($post, $user) {
            return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
        }
        
      
 

    public function getMedNames ($term = null) {
      if(!empty($term)) {
        $medNames = $this->find('list', array(
          'conditions' => array(
            'nom LIKE' => trim($term) . '%'
          )
        ));
        return $medNames;
      }
      return false;
    }
  
       

}
