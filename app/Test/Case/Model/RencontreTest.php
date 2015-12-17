<?php
App::uses('Rencontre', 'Model');

/**
 * Rencontre Test Case
 */
class RencontreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rencontre',
		'app.patient',
		'app.user',
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
		$this->Rencontre = ClassRegistry::init('Rencontre');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rencontre);

		parent::tearDown();
	}
        
         public function testFindFirst(){
            $rencontre = $this->Rencontre->find('first');
            $this->assertEqual($rencontre['Rencontre']['date'], "2015-12-07");
        }

}
