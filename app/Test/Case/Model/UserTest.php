<?php
App::uses('User', 'Model');

/**
 * User Test Case
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.patient',
		'app.section',
		'app.etage',
		'app.medicament',
		'app.patients_medicament'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}
        
         public function testFindFirst(){
            $user = $this->User->find('first');
            $this->assertEqual($user['User']['username'], "Dr. Jean");
        }
        
         public function testInvalidEmail() {
		// Build the data to save
		$data = array('User' => array(
			'courriel' => 'infojamesfairhurst.hotmail.com',
			'password' => 'hisPassword',
                        'role' => 'admin',
                        'username' => 'admin'
		));
		// Attempt to save
		$result = $this->User->save($data);
                //debug($result); /*debug($entryCount);*/ die();
		// Test save failed
		$this->assertFalse($result);
	}

	public function testValidEmail() {
		// Build the data to save
		$data = array('User' => array(
			'courriel' => 'infojamesfairhurst@hotmail.com',
			'password' => 'hisPassword',
                        'role' => 'admin',
                        'username' => 'admin'
		));

		// Attempt to save
		$result = $this->User->save($data);
                
		// Test successful insert
		$this->assertArrayHasKey('User', $result);

                
                
                
		// Get the count in the DB
		$result = $this->User->find('count', array(
			'conditions' => array(
				'User.courriel' => 'infojamesfairhurst@hotmail.com',
				'User.username' => 'admin',
			),
		));

		// Test DB entry
		$this->assertEqual($result, 1);
	}

}
