<?php
App::uses('Ctv', 'Model');

/**
 * Ctv Test Case
 *
 */
class CtvTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ctv'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ctv = ClassRegistry::init('Ctv');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ctv);

		parent::tearDown();
	}

}
