<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'diem_dau' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'diem_cuoi' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'chi_phi' => array('type' => 'float', 'null' => false, 'default' => null),
		'loai_xe' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'ngay_di' => array('type' => 'integer', 'null' => false, 'default' => null),
		'ngay_ve' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'tinh_trang' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'diem_dau' => 'Lorem ipsum dolor sit amet',
			'diem_cuoi' => 'Lorem ipsum dolor sit amet',
			'chi_phi' => 1,
			'loai_xe' => 'Lorem ipsum dolor sit amet',
			'ngay_di' => 1,
			'ngay_ve' => '2018-03-01 03:46:11',
			'tinh_trang' => '2018-03-01 03:46:11',
			'created' => '2018-03-01 03:46:11',
			'modified' => '2018-03-01 03:46:11'
		),
	);

}
