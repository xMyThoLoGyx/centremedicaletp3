<?php
App::uses('Medicament', 'Model');

/**
 * Medicament Test Case
 */
class MedicamentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medicament',
		'app.patient',
		'app.user',
		'app.section',
		'app.etage',
		'app.patients_medicament'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medicament = ClassRegistry::init('Medicament');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medicament);
		parent::tearDown();
	}

/**
 * testIsOwnedBy method
 *
 * @return void
 */
	public function testIsOwnedBy() {
		$this->assertTrue($this->Medicament->isOwnedBy(1,1));
                $this->assertFalse($this->Medicament->isOwnedBy(1,3));
	}

/**
 * testGetMedNames method
 *
 * @return void
 */
	public function testGetMedNamesWithOneLetterAndTwoHits() {
		
            $testMedNames = $this->Medicament->getMedNames("C");
            $this->assertEqual($testMedNames, array("1" => "Certophose", "2" => "Colamine"));
            
	}
        
        public function testGetMedNamesWithNoHits() {
		
            $testMedNames = $this->Medicament->getMedNames("W");
            $this->assertEquals($testMedNames, array());
            
	}
        
        public function testGetMedNamesWithNoParametres() {
		
            $testMedNames = $this->Medicament->getMedNames();
            $this->assertFalse($testMedNames);
            
	}
        
         public function testFindFirst(){
            $medicament = $this->Medicament->find('first');
            $this->assertEqual($medicament['Medicament']['nom'], "Certophose");
        }
        
        

}
