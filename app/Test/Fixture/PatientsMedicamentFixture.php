<?php
/**
 * PatientsMedicament Fixture
 */
class PatientsMedicamentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'patient_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'medicament_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'patient_id' => 1,
			'medicament_id' => 1
		),
		array(
			'id' => 2,
			'patient_id' => 1,
			'medicament_id' => 2
		),
		array(
			'id' => 3,
			'patient_id' => 2,
			'medicament_id' => 3
		)
	);

}
