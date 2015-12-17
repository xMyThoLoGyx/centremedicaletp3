<?php

App::uses('AppModel', 'Model');

/**
 * Patient Model
 *
 * @property User $User
 * @property Medicament $Medicament
 */
class Patient extends AppModel {

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
        'created' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'modified' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'imageProfil' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
                'message' => 'Invalid file, only images allowed',
                'allowEmpty' => TRUE,
            ),
            'filesize' => array(
                'rule' => array('filesize', '<=', '1MB'),
                'message' => 'Profile image must be less then 1MB',
                'allowEmpty' => TRUE,
            ),
            // custom callback to deal with the file upload
            'processImageUpload' => array(
                'rule' => 'processImageUpload',
                'message' => 'Something went wrong processing your file',
                'allowEmpty' => TRUE,
            )
        )
    );






    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'section_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		
	)
    );
    
    
		

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Medicament' => array(
            'className' => 'Medicament',
            'joinTable' => 'patients_medicaments',
            'foreignKey' => 'patient_id',
            'associationForeignKey' => 'medicament_id',
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
    
    public function processImageUpload($check=array()) {
//    debug($check); die();
	// deal with uploaded file
	if (!empty($check['imageProfil']['tmp_name'])) {

		// check file is uploaded
		if (!is_uploaded_file($check['imageProfil']['tmp_name'])) {
			return FALSE;
		}

		// build full filename
		$filename = WWW_ROOT . 'img' . DS . 'uploads'. DS . $check['imageProfil']['name'];

		// @todo check for duplicate filename

		// try moving file
		if (!move_uploaded_file($check['imageProfil']['tmp_name'], $filename)) {
			return FALSE;

		// file successfully uploaded
		} else {
			// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
			$this->data[$this->alias]['imageProfil'] = 'uploads' . '/' . $check['imageProfil']['name'];
		}
	}

	return TRUE;
}

        public function is_uploaded_file($tmp_name) {
		return is_uploaded_file($tmp_name);
	}

	/**
	 * Wrapper method for 'move_uploaded_file' to allow testing
	 * @param string $from
	 * @param string $to
	 */
	public function move_uploaded_file($from, $to) {
		return move_uploaded_file($from, $to);
	}
    
    

}
