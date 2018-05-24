<?php
App::uses('Giahan', 'Model');

/**
 * Giahan Test Case
 *
 */
class GiahanTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.giahan'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Giahan = ClassRegistry::init('Giahan');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Giahan);

		parent::tearDown();
	}

}
