<?php
App::uses('Section', 'Model');

/**
 * Section Test Case
 */
class SectionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.section',
		'app.etage',
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
		$this->Section = ClassRegistry::init('Section');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Section);

		parent::tearDown();
	}
        
         public function testFindFirst(){
            $section = $this->Section->find('first');
            $this->assertEqual($section['Section']['name'], "Section A1");
        }
        
        
        public function testGetByEtage(){
        $section = $this->Section->getByEtage(2);
        $expected = array(
            (int) 2 => 'Section A2'
        );
        $this->assertEquals($expected, $section);

    }
    
        
        
         

}
