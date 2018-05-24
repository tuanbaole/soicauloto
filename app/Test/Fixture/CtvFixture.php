<?php
/**
 * CtvFixture
 *
 */
class CtvFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ten' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'so_dien_thoai' => array('type' => 'integer', 'null' => false, 'default' => null),
		'gia_do' => array('type' => 'float', 'null' => false, 'default' => null),
		'gia_cap_treo' => array('type' => 'float', 'null' => false, 'default' => null),
		'gia_khachsan' => array('type' => 'float', 'null' => false, 'default' => null),
		'gia_com' => array('type' => 'float', 'null' => false, 'default' => null),
		'gia_guixe' => array('type' => 'integer', 'null' => false, 'default' => null),
		'trang_thai' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'danh_gia' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'created' => array('type' => 'date', 'null' => false, 'default' => null),
		'modified' => array('type' => 'date', 'null' => false, 'default' => null),
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
			'ten' => 'Lorem ipsum dolor sit amet',
			'so_dien_thoai' => 1,
			'gia_do' => 1,
			'gia_cap_treo' => 1,
			'gia_khachsan' => 1,
			'gia_com' => 1,
			'gia_guixe' => 1,
			'trang_thai' => 1,
			'danh_gia' => 1,
			'created' => '2018-03-01',
			'modified' => '2018-03-01'
		),
	);

}
