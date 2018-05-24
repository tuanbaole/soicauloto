<?php
/**
 * GiahanFixture
 *
 */
class GiahanFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'imei' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ngay_het_han' => array('type' => 'date', 'null' => false, 'default' => null),
		'link' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'imei' => 1,
			'ngay_het_han' => '2018-05-23',
			'link' => 'Lorem ipsum dolor sit amet'
		),
	);

}
