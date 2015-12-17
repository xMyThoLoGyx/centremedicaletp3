<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'courriel' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'active' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'role' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'username' => 'Dr. Jean',
			'courriel' => 'drjean@hotmail.com',
			'password' => 'lolyup',
			'active' => 1,
			'role' => 'admin',
			'created' => '2015-12-07 19:46:19',
			'modified' => '2015-12-07 19:46:19'
		),
            array(
			'id' => 2,
			'username' => 'Dr. Greg',
			'courriel' => 'drgreg@hotmail.com',
			'password' => 'lolnope',
			'active' => 1,
			'role' => 'admin',
			'created' => '2015-12-07 19:46:19',
			'modified' => '2015-12-07 19:46:19'
		)
		
	);

}
