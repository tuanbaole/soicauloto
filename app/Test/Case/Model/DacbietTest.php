<?php
App::uses('Dacbiet', 'Model');

/**
 * Dacbiet Test Case
 *
 */
class DacbietTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dacbiet'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dacbiet = ClassRegistry::init('Dacbiet');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dacbiet);

		parent::tearDown();
	}

}
