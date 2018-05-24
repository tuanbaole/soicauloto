<?php
App::uses('AppController', 'Controller');
/**
 * Dacbiets Controller
 *
 * @property Dacbiet $Dacbiet
 * @property PaginatorComponent $Paginator
 */
class DacbietsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Dacbiet->recursive = 0;
		$this->set('dacbiets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dacbiet->exists($id)) {
			throw new NotFoundException(__('Invalid dacbiet'));
		}
		$options = array('conditions' => array('Dacbiet.' . $this->Dacbiet->primaryKey => $id));
		$this->set('dacbiet', $this->Dacbiet->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dacbiet->create();
			if ($this->Dacbiet->save($this->request->data)) {
				$this->Session->setFlash(__('The dacbiet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dacbiet could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dacbiet->exists($id)) {
			throw new NotFoundException(__('Invalid dacbiet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dacbiet->save($this->request->data)) {
				$this->Session->setFlash(__('The dacbiet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dacbiet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dacbiet.' . $this->Dacbiet->primaryKey => $id));
			$this->request->data = $this->Dacbiet->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dacbiet->id = $id;
		if (!$this->Dacbiet->exists()) {
			throw new NotFoundException(__('Invalid dacbiet'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dacbiet->delete()) {
			$this->Session->setFlash(__('The dacbiet has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dacbiet could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	

	public function xulysolieu() {
		$this->layout = false;
		$this->autoRender = false;
		$file_boso = WWW_ROOT."files\\file-import.xml";
		$xml = "";
		$data = array();
		if (file_exists($file_boso)) $xml=simplexml_load_file($file_boso);
		$boso = str_replace("		", "	00000	", $xml->boso);
		for ($i=1; $i < 32; $i++) { 
			$a = "	".$i."	";
			$boso = str_replace($a, "</n".($i-1)."><n".$i.">", $boso);
		}

		$boso = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><note>".trim(str_replace("</n0>", "", $boso))."</n31></note>";
		echo htmlentities($boso);
	}

	public function thongke($year = null) {
		if ($year == null) $year = 2018;
		$startYear = $year."-01-01";
		$endYear = $year."-12-31";
		$kqs = $this->Dacbiet->laydulieu($startYear,$endYear);
		for ($i=1; $i <= 31; $i++) { 
			foreach ($kqs as $keyKq => $kq) {
				if ($i = $kq["Dacbiet"]["ngay"]) {
					$hienthi_ngay[$i][] = $kq;
					unset($kqs[$keyKq]);
				}
			}
		}
		
		$yearArr = $this->Dacbiet->getYear();
		$selectYear = array();
		foreach ($yearArr as $yearAr) {
			$selectYear[$yearAr] = $yearAr;
		}
		$this->set(compact("hienthi_ngay","selectYear"));
	}

	

	public function tien_hanh_cap_nhat_dulieu() {
		$this->layout = false;
		$this->autoRender = false;
		$res = $this->Dacbiet->dulieusoxo();
		if ($res) {
			$this->Session->setFlash(__('Tiến hành cập nhật thành công .'));
		} else {
			$this->Session->setFlash(__('Tiến hành cập nhật thất bại.'));
		}
		return $this->redirect(array('controller' => 'dacbiets','action' => 'thongke'));
	}

	public function tien_hanh_cap_nhat_ketqua() {
		$this->layout = false;
		$this->autoRender = false;
		$res = $this->Dacbiet->capnhatketqua();
		if ($res) {
			$this->Session->setFlash(__('Tiến hành cập nhật thành công .'));
		} else {
			$this->Session->setFlash(__('Tiến hành cập nhật thất bại.'));
		}
		return $this->redirect(array('controller' => 'dacbiets','action' => 'thongke'));
	}

	public function tien_hanh_cap_nhat_boso() {
		$this->layout = false;
		$this->autoRender = false;
		$this->loadModel("Boso");
		$res = $this->Boso->capnhatboso();
		if ($res) {
			$this->Session->setFlash(__('Tiến hành cập nhật thành công .'));
		} else {
			$this->Session->setFlash(__('Tiến hành cập nhật thất bại.'));
		}
		return $this->redirect(array('controller' => 'bosos','action' => 'timkiemboso'));
	}

	public function dulieu_trave() {
		$this->layout = false;
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			$data = $this->request->data;
			$loto_array = explode(",", str_replace(" ", "",$data["boso"]));
			$ngay_gan = $this->Dacbiet->diem_gan_den_nay($loto_array);
			$this->loadModel("Dacbiet");
			$dacbiets = $this->Dacbiet->find("all",array(
				"fields" => array("unix_timestamp(ngay_tao) AS time_ngay_tao,ngay_tao"),
				"conditions" => array(
					"loto" => $loto_array,
					"ngoai_le" => "0"
				),
				"order" => ("ngay_tao desc"),
			));
			$chuoi_ngay_lau_ra_nhat = 0;
			$ngay_bat_dau = 0;
			$ngay_ket_thuc = 0;
			$so_ngay_an_thong = 1;
			$so_ngay_an_thong_mac_dinh = 1; // neu co $so_ngay_an_thong moi thi bien nay dua ve 0
			$ngay_bat_dau_an_thong = "";
			$ngay_ket_thuc_an_thong = "";
			foreach ($dacbiets as $keydacbiet => $dacbiet) {
				if ($ngay_bat_dau != 0) {
					$ngay_bat_dau = $ngay_ket_thuc;
					$ngay_ket_thuc = $dacbiet[0]["time_ngay_tao"];
				 	$nguong_khong_trung = $ngay_bat_dau - $ngay_ket_thuc;
				 	if ($nguong_khong_trung > $chuoi_ngay_lau_ra_nhat) {
				 	 	$chuoi_ngay_lau_ra_nhat = $nguong_khong_trung;
				 	 	$dataRes["date_start"] = $dacbiet["Dacbiet"]["ngay_tao"];
				 	 	$dataRes["date_end"] = $dacbiets[$keydacbiet-1]["Dacbiet"]["ngay_tao"];
				 	} 
				} else {
					$ngay_bat_dau = $ngay_ket_thuc = $dacbiet[0]["time_ngay_tao"];
				} 
				if ($ngay_bat_dau_an_thong != 0) {
					$khoang_cach_an_thong = $dacbiets[$keydacbiet-1][0]["time_ngay_tao"] - $dacbiets[$keydacbiet][0]["time_ngay_tao"];
					$log["hieu"] = $khoang_cach_an_thong;
					$log["ngay_tao"] = $dacbiet["Dacbiet"]["ngay_tao"];
					$log["ngay_ket_thuc"] = $dacbiets[$keydacbiet-1]["Dacbiet"]["ngay_tao"];
					$log["ngay_test"] = $dacbiets[$keydacbiet]["Dacbiet"]["ngay_tao"];
					if ($khoang_cach_an_thong == "86400") {
						if ($so_ngay_an_thong_mac_dinh == 1) {
							$khoitao_anthong = $dacbiets[$keydacbiet-1]["Dacbiet"]["ngay_tao"];
						}
						$so_ngay_an_thong_mac_dinh += 1;
					} else {
						if ($so_ngay_an_thong < $so_ngay_an_thong_mac_dinh) {
							$so_ngay_an_thong = $so_ngay_an_thong_mac_dinh;
							$ngay_bat_dau_an_thong = $dacbiets[$keydacbiet-1]["Dacbiet"]["ngay_tao"];
							$ngay_ket_thuc_an_thong = $khoitao_anthong;
						}
						$so_ngay_an_thong_mac_dinh = 1;
					}
					$showlog[] = $log;
				} else {
					$ngay_bat_dau_an_thong = $ngay_ket_thuc_an_thong = $dacbiet["Dacbiet"]["ngay_tao"];
				}
			}

			$dataRes["date_start"] = date("d/m/Y",strtotime($dataRes["date_start"]));
			$dataRes["date_end"] = date("d/m/Y",strtotime($dataRes["date_end"]));
			$dataRes["diem_gan"] = $ngay_gan;
			$dataRes["nguong_cuc_dai"] = $chuoi_ngay_lau_ra_nhat/86400;
			$dataRes["so_ngay_an_thong"] = $so_ngay_an_thong;
			$dataRes["ngay_bat_dau_an_thong"] = date("d/m/Y",strtotime($ngay_bat_dau_an_thong));
			$dataRes["ngay_ket_thuc_an_thong"] = date("d/m/Y",strtotime($ngay_ket_thuc_an_thong));
			$dataRes["bosocantim"] = implode(", ", $loto_array);
			echo json_encode($dataRes);
		}
	}

	public function soicaulo() {
		$kqsx_hq = $this->Dacbiet->find("first",array(
			"fields" => array("loto","ngay_tao"),
			"conditions" => array(
				"Dacbiet.ngoai_le" => "0"
			),
			"order" => array("ngay_tao desc")
		));
		$ngay_tim_kiem = $kqsx_hq["Dacbiet"]["ngay_tao"];
		if ($this->request->is("post")) {
			if ( $this->request->data["date"] != "") {
				$ngay_tim_kiem = $this->request->data["date"];
				$kqsx_hq = $this->Dacbiet->find("first",array(
					"fields" => array("loto","ngay_tao"),
					"conditions" => array(
						"Dacbiet.ngoai_le" => "0",
						"Dacbiet.ngay_tao" => $ngay_tim_kiem
					),
					"order" => array("ngay_tao desc")
				));
			}
		}
		$solieu_cantims = array();
		$kq_thu_nhat = array();
		$kq_thu_hai = array();
		$kq_thu_ba = array();
		if (!empty($kqsx_hq["Dacbiet"]["loto"])) {
			$giaidb_hn = $kqsx_hq["Dacbiet"]["loto"];
			$danhsach_ngays = $this->Dacbiet->find("list",array(
				"fields" => array("Dacbiet.ngay_tao"),
				"conditions" => array(
					"Dacbiet.loto" => $kqsx_hq["Dacbiet"]["loto"],
					"Dacbiet.ngoai_le" => "0"
				),
				"order" => array("ngay_tao desc")
			));
			foreach ($danhsach_ngays as $danhsach_ngay) {
				$danhsach_mois[$danhsach_ngay][] = date("Y-m-d",strtotime("+1 days",strtotime($danhsach_ngay)));
				$danhsach_mois[$danhsach_ngay][] = date("Y-m-d",strtotime("+2 days",strtotime($danhsach_ngay)));
				$danhsach_mois[$danhsach_ngay][] = date("Y-m-d",strtotime("+3 days",strtotime($danhsach_ngay)));
				$danhsach_ngaylienqua[] = $danhsach_ngay;
				$danhsach_ngaylienqua[] = date("Y-m-d",strtotime("+1 days",strtotime($danhsach_ngay)));
				$danhsach_ngaylienqua[] = date("Y-m-d",strtotime("+2 days",strtotime($danhsach_ngay)));
				$danhsach_ngaylienqua[] = date("Y-m-d",strtotime("+3 days",strtotime($danhsach_ngay)));
			}
			$dulieu_ngays = $this->Dacbiet->find("list",array(
				"fields" => array("Dacbiet.ngay_tao","Dacbiet.dacbiet"),
				"conditions" => array(
					"Dacbiet.ngay_tao" => $danhsach_ngaylienqua,
					"Dacbiet.ngoai_le" => "0",
					"Dacbiet.loto !=" => "xx" 
				),
				"order" => array("ngay_tao desc")
			));
			foreach ($danhsach_mois as $keydanhsach_moi => $danhsach_moi) {
				if (isset($dulieu_ngays[$keydanhsach_moi])) {
					$dulieu["dacbiet"] = $dulieu_ngays[$keydanhsach_moi];
					$dulieu["ngay"] = $keydanhsach_moi;
					$solieu_cantims[$keydanhsach_moi][] = $dulieu;
					$a = 1;
					foreach ($danhsach_moi as $giatringay) {
						if (isset($dulieu_ngays[$giatringay])) {
							$dulieu["dacbiet"] = $dulieu_ngays[$giatringay];
							$dulieu["ngay"] = $giatringay;
							$solieu_cantims[$keydanhsach_moi][] = $dulieu;
							if ($a == 1) $kq_thu_nhat[] = substr($dulieu_ngays[$giatringay],3,4);
							if ($a == 2) $kq_thu_hai[] = substr($dulieu_ngays[$giatringay],3,4);
							if ($a == 3) $kq_thu_ba[] = substr($dulieu_ngays[$giatringay],3,4);
						}
						$a++;
					}
				}
			}
			$this->set("giaidb_hn",$kqsx_hq["Dacbiet"]["loto"]);
		}
		$this->set(compact("solieu_cantims","ngay_tim_kiem","kq_thu_nhat","kq_thu_hai","kq_thu_ba"));
	}

}
