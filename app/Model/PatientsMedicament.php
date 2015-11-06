<?php
App::uses('AppModel', 'Model');
/**
 * PatientsMedicament Model
 *
 * @property Patients $Patients
 * @property Medicaments $Medicaments
 */
class PatientsMedicament extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'patients_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'medicaments_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Patients' => array(
			'className' => 'Patients',
			'foreignKey' => 'patients_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Medicaments' => array(
			'className' => 'Medicaments',
			'foreignKey' => 'medicaments_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
