<?php
require_once 'database.php';
class m_qlvb extends database {

	function get_max_number($loai_vb, $current_year) {
		$sql = "SELECT MAX(so_vb) AS so_vb FROM qlvb WHERE loai_vb = ? AND YEAR(ngay_phat_hanh) = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($loai_vb, $current_year));
		$this->disconnect();
	}

	function searchvb($tu_ngay, $den_ngay, $ho_ten_nld, $so_vb, $so_so, $ma_dv, $noi_nhan, $bhxhqh, $noi_dung, $ld_duyet, $trang_thai, $personal_user, $user_group, $loai_vb, $index=-1, $limit=-1) {
		$sql = "SELECT pt.*, dist.dist_name, us.fullname, dv.ten_dv FROM qlvb pt INNER JOIN districts dist ON pt.bhxhqh = dist.dist_id INNER JOIN users us ON pt.nguoi_du_thao = us.uid INNER JOIN dv_sdld dv ON pt.ma_dv = dv.ma_dv WHERE pt.so_vb LIKE ? AND pt.ho_ten_nld LIKE ? AND pt.so_so LIKE ? AND pt.ma_dv LIKE ? AND pt.noi_nhan LIKE ? AND pt.bhxhqh LIKE ? AND pt.noi_dung LIKE ? AND pt.nguoi_du_thao LIKE ? AND pt.loai_vb LIKE ? AND pt.ld_duyet LIKE ?";
		if ($user_group != null) {
			if ($user_group != 5) {
				$sql .= "  AND pt.tinh_trang LIKE ?";
			} else {
				$sql .= "  AND pt.tinh_trang IN(1,2)";
			}
			$sql .= " AND pt.user_group LIKE ?";
		} else {
			$sql .= "  AND pt.tinh_trang LIKE ?";
		}
		if ($tu_ngay != null && $den_ngay != null) {
			$sql .= "  AND pt.ngay_phat_hanh BETWEEN ? AND ?";
		}
		$sql .= " ORDER BY vb_id DESC";
		if ($index > -1 && $limit > 1) {
			$sql .= " LIMIT $index, $limit";
		}
		$this->setQuery($sql);
		$param = array('%'.$so_vb.'%', '%'.$ho_ten_nld.'%', '%'.$so_so.'%', '%'.$ma_dv.'%', '%'.$noi_nhan.'%', '%'.$bhxhqh.'%', '%'.$noi_dung.'%', '%'.$personal_user.'%', '%'.$loai_vb.'%', '%'.$ld_duyet.'%');
		/*if ($user_group != null) {
			$param[] = '%'.$user_group.'%';
		}*/
		if ($user_group != null) {
			if ($user_group != 5) {
				$param[] = '%'.$trang_thai.'%';
			}
			$param[] = '%'.$user_group.'%';
		} else {
			$param[] = '%'.$trang_thai.'%';
		}
		if ($tu_ngay != null && $den_ngay != null) {
			$param[] = $tu_ngay;
			$param[] = $den_ngay;
		}
		return $this->loadAllRows($param);
		$this->disconnect();
	}

	public function countpt($ho_ten_nld, $so_so) {
		$sql = "SELECT count(vb_id) AS count, GROUP_CONCAT(so_vb) AS sovb, GROUP_CONCAT(ngay_phat_hanh) AS ngay_ph FROM qlvb WHERE ho_ten_nld = ? AND so_so = ? AND loai_vb = 3 AND (tinh_trang = 1 OR tinh_trang = 2)";
		$this->setQuery($sql);
		return $this->loadRow(array($ho_ten_nld, $so_so));
		$this->disconnect();
	}

	function get_vb($loai_vb, $vb_id) {
		$sql = "SELECT pt.*, d.dist_name,w.ward_name, dv.ten_dv FROM qlvb pt INNER JOIN districts d ON pt.bhxhqh = d.dist_id INNER JOIN wards w ON pt.phuong_xa = w.ward_id INNER JOIN dv_sdld dv ON pt.ma_dv = dv.ma_dv WHERE vb_id = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($vb_id));
		$this->disconnect();
	}

	function get_districts() {
		$sql = "SELECT * FROM districts";
		$this->setQuery($sql);
		return $this->loadAllRows();
		$this->disconnect();
	}

	function get_wards() {
		$sql = "SELECT * FROM wards";
		$this->setQuery($sql);
		return $this->loadAllRows();
		$this->disconnect();
	}

	function get_ward_by_distId($distId) {
		$sql = "SELECT * FROM wards WHERE dist_id = ?";
		$this->setQuery($sql);
		return $this->loadAllRows(array($distId));
		$this->disconnect();
	}

	function get_dvsdld($madv){
		$sql = "SELECT ten_dv FROM dv_sdld WHERE ma_dv = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($madv));
		$this->disconnect();
	}

	function trung_hs($ho_ten_nld, $so_so){
		$sql = "SELECT vb_id FROM qlvb WHERE ho_ten_nld = ? AND so_so = ? AND tinh_trang IN(1,2)";
		$this->setQuery($sql);
		return $this->loadAllRows(array($ho_ten_nld, $so_so));
		$this->disconnect();
	}

	function add_new_vb($so_vb, $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_gui, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $sdt, $email, $noi_dung, $ngay_phat_hanh, $nguoi_du_thao, $user_group, $loai_vb, $ld_duyet) {
		$sql = "INSERT INTO qlvb(so_vb, ho_ten_nld, gioi_tinh, ngay_sinh, ngay_chet, chuc_danh, ngay_nhan, dot_nhan, so_so, so_bb, ma_dv, noi_gui, noi_nhan, bhxhqh, cd_huong, cd_giai_quyet, quan_huyen, phuong_xa, sdt, email, noi_dung, ngay_phat_hanh, nguoi_du_thao, user_group, loai_vb, ld_duyet) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$this->setQuery($sql);
		$this->execute(array($so_vb, $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_gui, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $sdt, $email, $noi_dung, $ngay_phat_hanh, $nguoi_du_thao, $user_group, $loai_vb, $ld_duyet));
		return $this->getLastId();
		$this->disconnect();
	}

	function update_vb($action, $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $sdt, $email, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $noi_dung, $ld_duyet, $tinh_trang, $vb_id) {
		if ($action=='edit') {
			$sql = "UPDATE qlvb SET ho_ten_nld=?, gioi_tinh=?, ngay_sinh=?, ngay_chet=?, chuc_danh=?, sdt=?, email=?, ngay_nhan=?, dot_nhan=?, so_so=?, so_bb=?, ma_dv=?, noi_nhan=?, bhxhqh=?, cd_huong=?, cd_giai_quyet=?, quan_huyen=?, phuong_xa=?, noi_dung=?, ld_duyet=? WHERE vb_id=?";
		}
		$this->setQuery($sql);
		if ($action=='edit') {
			$this->execute(array($ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $sdt, $email, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $noi_dung, $ld_duyet, $vb_id));
		}
		$this->disconnect();
	}
}
?>