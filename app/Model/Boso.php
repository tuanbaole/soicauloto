<?php
App::uses('AppModel', 'Model');
/**
 * Boso Model
 *
 */
class Boso extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'boso' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'giatri' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cot' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'hang' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function laydulieu($year_mon_day) {
		return $this->find("all",array(
			"fields" => array("*"),
			"conditions" => array(
				"ngay >=" => $year_mon_day,
			),
			"order" => array("ngay asc"),
			"contain" => array()
		));
	}

	public function capnhatboso() {
		$file_boso = WWW_ROOT."files/boso.xml";
		$xml = "";
		if (file_exists($file_boso)) $xml=simplexml_load_file($file_boso);
		$array = explode("end", $xml);
		$i = 0;
		$data = array();
	    foreach ($array as $value) {
			$detailArr = explode("*", $value);
			$i++;
			$y = 0;
			foreach ($detailArr as $detail) {
				if ($detail != "") {
					$y++;
					$dataArr = explode("-", $detail);
					$insert['boso'] = trim($dataArr[0]);
					$insert['giatri'] = $dataArr[1];
					$insert['cot'] = $y;
					$insert['hang'] = $i;
					$data[] = $insert;
				}
			}
		}
		if ($this->deleteAll('Boso.id > -1')) {
			if ($this->saveMany($data)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
}
