<?php
App::uses('Etage', 'Model');

/**
 * Etage Test Case
 */
class EtageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.etage',
		'app.section',
		'app.patient',
		'app.user',
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
		$this->Etage = ClassRegistry::init('Etage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Etage);

		parent::tearDown();
	}
        
         public function testFindFirst(){
            $etage = $this->Etage->find('first');
            $this->assertEqual($etage['Etage']['name'], "Etage 1");
        }
       

}
