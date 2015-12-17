<?php
App::uses('Patient', 'Model');

/**
 * Patient Test Case
 */
class PatientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Patient = ClassRegistry::init('Patient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Patient);
                @unlink(WWW_ROOT.'uploads'.DS.'TestFile.jpg');
		parent::tearDown();
	}

/**
 * testIsOwnedBy method
 *
 * @return void
 */
	public function testIsOwnedBy() {
                $this->assertTrue($this->Patient->isOwnedBy(1,1));
                $this->assertFalse($this->Patient->isOwnedBy(1,2));
	}

        
        /**
            * testFindFirst method
            *
            * @return void
        */
        
        public function testFindFirst(){
            $patient = $this->Patient->find('first');
            $this->assertEqual($patient['Patient']['nom'], "Gregoire");
        }
        
        public function testFormWithEmptyFile() {
		// Build the data to save along with an empty file
		$data = array('Patient' => array(
			'nom' => 'JamesFairhurst',			
                        'section_id' => 1,
                        'user_id' => 1,                   
			'imageProfil' => array(
				'name' => '',
				'type' => '',
				'tmp_name' => '',
				'error' => 4,
				'size' => 0,
			)
		));

		// Attempt to save
		$result = $this->Patient->save($data);
   
		// Test not inserted
		$this->assertFalse($result);
	}
        
     /**   public function testFormWithValidFile() {
		// Create a stub for the Contact Model class
		$stub = $this->getMockForModel('Patient', array('is_uploaded_file','move_uploaded_file'));

		// Always return TRUE for the 'is_uploaded_file' function
		$stub->expects($this->once())
			->method('is_uploaded_file')
			->will($this->returnValue(TRUE));
		// Copy the file instead of 'move_uploaded_file' to allow testing
		$stub->expects($this->once())
			->method('move_uploaded_file')
			->will($this->returnCallback('copy'));

		// Build the data to save along with a sample file
		$data = array('Patient' => array(
			'nom' => 'James Gotimage',						
			'imageProfil' => array(
				'name' => 'TestFile.jpg',
				'type' => 'image/jpeg',
// modified with windows DS backslash
    				'tmp_name' => 'C:\UniServerZ\tmp\TestFile.jpg',
   		//		'tmp_name' => ROOT.DS.APP_DIR.DS.'test'.DS.'Case'.DS.'Model'.DS.'TestFile.jpg',
				'error' => (int) 0,
				'size' => (int) 845941
			)
		));

		// Attempt to save
		$result = $stub->save($data);

		// Test successful insert
		$this->assertArrayHasKey('Patient', $result);

		// Get the count in the DB
		$entryCount = $this->Patient->find('count',
                 array(
			'conditions' => array(
		'Patient.nom' => 'James Gotimage',
		'imageProfil' => 'uploads/TestFile.jpg'
			)
		));
// debug($result); debug($entryCount); die();
		// Test DB entry
		$this->assertEqual($entryCount, 1);

		// Test uploaded file exists
		$this->assertFileExists(WWW_ROOT.'uploads'.DS.'TestFile.jpg');
	}
      * 
      */
        
        public function testFormWithInvalidFile() {

		// Build the data to save along with a sample file
		$data = array('Patient' => array(
			'nom' => 'James Notvalide',		
			'imageProfil' => array(
				'name' => 'TestFile.txt',
				'type' => 'text/plain',
				'tmp_name' => 'C:\UniServerZ\tmp\TestFile.txt',
				'error' => 0,
				'size' => 19,
			)
		));

		// Attempt to save
		$result = $this->Patient->save($data);

		// Test failure
		$this->assertFalse($result);

		// Test uploaded file does not exists
		$this->assertFileNotExists(WWW_ROOT.'uploads'.DS.'TestFile.txt');
	}
        
        
        public function testNomInvalide() {

		// Build the data to save along with a sample file
		$data = array('Patient' => array(
			'nom' => 'James2 Notvalide',		
			'imageProfil' => array(
				'name' => 'TestFile.jpg',
				'type' => 'image/jpg',
				'tmp_name' => 'C:\UniServerZ\tmp\TestFile.jpg',
				'error' => 0,
				'size' => 19,
			)
		));

		// Attempt to save
		$result = $this->Patient->save($data);

		// Test failure
		$this->assertFalse($result);
                
	}
        
        
       /* public function testNomValide() {

		// Build the data to save along with a sample file
		$data = array('Patient' => array(
			'nom' => 'James Valide',		
			'imageProfil' => array(
				'name' => 'TestFile.jpg',
				'type' => 'image/jpg',
				'tmp_name' => 'C:\UniServerZ\tmp\TestFile.jpg',
				'error' => 0,
				'size' => 19,
			)
		));

		// Attempt to save
		$result = $this->Patient->save($data);

		// Test failure
		$this->assertTrue($result);

	}
        
        */

}
