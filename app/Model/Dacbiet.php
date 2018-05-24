<?php
App::uses('AppModel', 'Model');
/**
 * Dacbiet Model
 *
 */
class Dacbiet extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'dacbiet' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'loto' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quantrong' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ngay' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'thang' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nam' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ngay_tao' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function laydulieu($year_mon_day_start,$year_mon_day_end) {
		return $this->find("all",array(
			"fields" => array("*"),
			"conditions" => array(
				"ngay_tao >=" => $year_mon_day_start,
				"ngay_tao <=" => $year_mon_day_end,
			),
			"order" => array("nam asc,thang asc,ngay asc"),
			"contain" => array()
		));
	}

	public function getYear() {
		return $this->find("list",array(
			"fields" => array("nam"),
			"order" => array("nam desc"),
			"group" => "nam",
			"contain" => array()
		));
	}

	public function dacbiet_moinhat() {
		return $this->find("first",array(
			"fields" => array("*"),
			"order" => array("ngay_tao desc"),
			"contain" => array()
		));
	}

	public function kiemtra_solieu_trong($year,$mon) { // kiem tra cac ngay khong quay de
		for ($i=1; $i < $mon; $i++) {
			$new_mon = $i;
			if ($i < 10) {
				$new_mon = "0".$i;
			}
			for ($day=29; $day <= 31 ; $day++) {
				$ngay_cothe_khongquay[] = $year."-".$new_mon."-".$day;
			}
			$thangArr[] = $i;
		}
		$ngay_da_quay = $this->find("all",array(
			"fields" => array("*"),
			"conditions" => array(
				"ngay" => array("29","30","31"),
				"thang" => $thangArr,
				"nam" =>$year,
			),
			"order" => array("ngay_tao desc"),
		));
		foreach ($ngay_da_quay as $da_quay) {
			if ($da_quay['Dacbiet']['thang'] < 10) {
				$da_quay['Dacbiet']['thang'] = "0".$da_quay['Dacbiet']['thang'];
			}
			$ngay_loai_tru = $da_quay['Dacbiet']['nam']."-".$da_quay['Dacbiet']['thang']."-".$da_quay['Dacbiet']['ngay'];
			if (($key_da_quay = array_search($ngay_loai_tru, $ngay_cothe_khongquay)) !== false) {
			    unset($ngay_cothe_khongquay[$key_da_quay]);
			}
		}
		return $ngay_cothe_khongquay;
	}

	public function capnhatketqua() {
		$dacbiet_moinhat = $this->dacbiet_moinhat();
		$dateArr = array();
		if (!empty($dacbiet_moinhat)) {
			$today = date("Y-m-d",strtotime(' +1 day'));
			$time_today = strtotime($today);
			$time_fromday = strtotime($dacbiet_moinhat["Dacbiet"]["ngay_tao"]);
			if ($time_today > $time_fromday) {
				$count = ($time_today - $time_fromday)/86400;
				if ($count >= 1) {
					for ($i=1; $i < $count; $i++) { 
						$getdate = $time_today - ($i * 24 * 60 * 60);
						$dateArr[] = date("Y-m-d",$getdate);
					}
				}
			}
		}
		if (!empty($dateArr)) {
			$data = array();
			$item_end = count($dateArr) - 1;
			// foreach ($dateArr as $dateAr) {
			$dateAr = $dateArr[$item_end];
			$getApiDate = explode("-", $dateAr);
			$form_date = $getApiDate[2]."-".$getApiDate[1]."-".$getApiDate[0];
			// $soxo = file_get_contents('http://hostingkqxs.esy.es/kqsx.php?date='.$form_date);
			// URL có chứa hai thông tin name và diachi
			$url = 'http://hostingkqxs.esy.es/kqsx.php?date='.$form_date; 
			// Khởi tạo CURL
			$ch = curl_init($url);
			// Thiết lập có return
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			$soxo = $result;
			if (!strrpos($soxo,"Warning") && !strrpos($soxo,"false")) {
				$soxoArr = explode(",", $soxo);
				if (isset($soxoArr[1])) {
					$loto = str_replace("ketqua", "", $this->clean($soxoArr[1]));
					$ngay_thang_nam_arr = explode("-", $dateAr);
					$insert['dacbiet'] = $loto;
					$insert['loto'] = substr($loto,strlen($loto)-2,strlen($loto));
					$insert['quantrong'] = "0";
					if (strpos($loto,"999") > -1 || strpos($loto,"888") > -1 || strpos($loto,"777") > -1 || strpos($loto,"666") > -1 || strpos($loto,"555") > -1 || strpos($loto,"444") > -1 || strpos($loto,"333") > -1 || strpos($loto,"222") > -1 || strpos($loto,"111") > -1 || strpos($loto,"000") > -1) {
						$insert['quantrong'] = "1";
					}
					$insert['ngay'] = $ngay_thang_nam_arr[2];
					$insert['thang'] = $ngay_thang_nam_arr[1];
					$insert['nam'] = $ngay_thang_nam_arr[0];
					$insert['ngay_tao'] = $dateAr;
					$insert['ngoai_le'] = "0";
					$data[] = $insert;
				}
				if (!empty($data)) {
					if (!$this->saveMany($data)) {
						return false;
					}
				}
			}
		}
		$ngay_khong_quay = $this->kiemtra_solieu_trong($dacbiet_moinhat["Dacbiet"]["nam"],$dacbiet_moinhat["Dacbiet"]["thang"]);
		if (!empty($ngay_khong_quay)) {
			$them_vao_khoang_trang = array();
			foreach ($ngay_khong_quay as $khong_quay) {
				$arr_khong_quay = explode("-", $khong_quay);	
				$insert['dacbiet'] = "00000";
				$insert['loto'] = "xx";
				$insert['quantrong'] = "0";
				$insert['ngay'] = $arr_khong_quay[2];
				$insert['thang'] = $arr_khong_quay[1];
				$insert['nam'] = $arr_khong_quay[0];
				$insert['ngay_tao'] = $arr_khong_quay[0]."-".$arr_khong_quay[1]."-01";
				$insert['ngoai_le'] = "1";
				$them_vao_khoang_trang[] = $insert;
			}
			if (!empty($them_vao_khoang_trang)) {
				if (!$this->saveMany($them_vao_khoang_trang)) {
					return false;
				}
			}
		}
		return true;
	}

	private function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}

	public function dulieusoxo() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$this->layout = false;
		$this->autoRender = false;
		$data = array();
		for ($y=0; $y < 19; $y++) { 
			if ($y < 10) {
				$nam = "200".$y;
			} else {
				$nam = "20".$y;
			}
			$file_boso = WWW_ROOT."files/db-".$nam.".xml";
			$xml = "";
			if (file_exists($file_boso)) {
				$xml=simplexml_load_file($file_boso);
			} else {

				return false;
			}
			for ($i=0; $i < 31; $i++) {
				$ngay = $i+1;
				$string = "n".$ngay;
				$lotos = explode(" ", $xml->$string);
				foreach ($lotos as $key => $loto) {
					$thang = $key + 1;
					if ($thang < 10) $thang = "0".$thang;
					$ngay_chuan = $ngay;
					if ($ngay < 10) $ngay_chuan = "0".$ngay;
					$insert['dacbiet'] = $loto;
					if ($loto != "TẾT") {
						$insert['loto'] = substr($loto,strlen($loto)-2,strlen($loto));
					} else {
						$insert['loto'] = "xx";
					}
					
					$insert['quantrong'] = "0";
					if (strpos($loto,"999") > -1 || strpos($loto,"888") > -1 || strpos($loto,"777") > -1 || strpos($loto,"666") > -1 || strpos($loto,"555") > -1 || strpos($loto,"444") > -1 || strpos($loto,"333") > -1 || strpos($loto,"222") > -1 || strpos($loto,"111") > -1 || strpos($loto,"000") > -1) {
						$insert['quantrong'] = "1";
					}
					$ngay_db = $nam."-".$thang."-".$ngay_chuan;
					$insert['ngay'] = $ngay_chuan;
					$insert['thang'] = $thang;
					$insert['nam'] = $nam;
					$insert['ngay'] = $ngay_chuan;
					$insert['ngoai_le'] = "0";
					if ($loto != "00000") {
						$insert['ngay_tao'] = $ngay_db;
					} else {
						if ($ngay <= 28) {
							$insert['ngay_tao'] = $ngay_db;
						} else {
							$insert['ngoai_le'] = "1";
							$insert['ngay_tao'] = $nam."-".$thang."-01";
						}
					}
					$data[] = $insert;
				}
			}
		}
		if ($this->deleteAll('Dacbiet.id > -1')) {
			if ($this->saveMany($data)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function thuc_thi_cap_nhat() {
		$res1 = $this->dulieusoxo();
		if ($res1) {
			$res = $this->capnhatketqua();
		} else {
			$res = false;
		}
		return $res;
	}

	public function diem_gan_den_nay($loto) {
		$dulieu_ngaygan = $this->find("first",array(
			"fields" => array("ngay_tao"),
			"conditions" => array(
				"loto" => $loto,
				"ngoai_le" => "0"
			),
			"order" => array("ngay_tao desc"),
			"contain" => array()
		));
		$today = date("Y-m-d");
		$time_today = strtotime($today);
		$time_fromday = strtotime($dulieu_ngaygan["Dacbiet"]["ngay_tao"]);
		$trave_ngay_gan = ($time_today - $time_fromday)/86400;
		if ($trave_ngay_gan > 1) {
			$trave_ngay_gan -= 1;
		}
		return $trave_ngay_gan;
	}

}
