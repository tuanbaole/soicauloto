<?php
/**
 * CongviecFixture
 *
 */
class CongviecFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'ten_khach_hang' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'ghi_chu' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'ngay_den' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'ngay_tra' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'so_dien_thoai' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'gia_tien' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'da_tra' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'con_no' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'thon_pho' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'phuong_xa' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'quan_huyen' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'tinh_thanhpho' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'ten_khach_hang' => 'Lorem ipsum dolor sit amet',
			'ghi_chu' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ngay_den' => '2018-03-16 07:55:31',
			'ngay_tra' => '2018-03-16 07:55:31',
			'so_dien_thoai' => 1,
			'gia_tien' => 1,
			'da_tra' => 1,
			'con_no' => 1,
			'thon_pho' => 'Lorem ipsum dolor sit amet',
			'phuong_xa' => 'Lorem ipsum dolor sit amet',
			'quan_huyen' => 'Lorem ipsum dolor sit amet',
			'tinh_thanhpho' => 'Lorem ipsum dolor sit amet',
			'created' => '2018-03-16 07:55:31',
			'modified' => '2018-03-16 07:55:31'
		),
	);

}
