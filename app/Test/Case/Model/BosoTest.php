<?php
App::uses('Boso', 'Model');

/**
 * Boso Test Case
 *
 */
class BosoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.boso'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Boso = ClassRegistry::init('Boso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Boso);

		parent::tearDown();
	}

}
