<?php
App::uses('Congviec', 'Model');

/**
 * Congviec Test Case
 *
 */
class CongviecTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.congviec'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Congviec = ClassRegistry::init('Congviec');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Congviec);

		parent::tearDown();
	}

}
