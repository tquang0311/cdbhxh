<?php
require_once 'database.php';
class m_chungtu_omts extends database {

	function search_tbctg($so_hs, $ma_dv) {
		$sql = "SELECT so_vb, ngay_phat_hanh FROM qlvb WHERE so_bb = ? AND ma_dv = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($so_hs, $ma_dv));
		$this->disconnect();
	}

	function check_sohs($so_hs) {
		$sql = "SELECT id FROM chung_tu_om_ts WHERE so_hs = ?";
		$this->setQuery($sql);
		return $this->loadAllRows(array($so_hs));
		$this->disconnect();
	}

	function add_new($so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs, $canboxuly, $ngay_nhaphs, $gio_nhaphs) {
		$sql = "INSERT INTO chung_tu_om_ts(so_hs, ma_dv, so_tbctg, so_luong, ghi_chu, loai_hs, canboxuly, ngay_nhaphs, gio_nhaphs) VALUES (?,?,?,?,?,?,?,?,?)";
		$this->setQuery($sql);
		$this->execute(array($so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs, $canboxuly, $ngay_nhaphs, $gio_nhaphs));
		$this->disconnect();
	}

	function update_data($action = null, $listId, $tinh_trang, $ngay_hientai, $gio_hientai) {
		if ($tinh_trang == 2) {
			$ngaygio_update = "ngay_xlhs = ?, gio_xlhs = ?, ";
		} elseif ($tinh_trang == 3 || $tinh_trang == 4) {
			$ngaygio_update = null;
		}
		if ($action==null) {
			$sql = "UPDATE chung_tu_om_ts SET ".$ngaygio_update." tinh_trang = ? WHERE id IN($listId)";
		} elseif ($action=='delete') {
			$sql = "DELETE FROM chung_tu_om_ts WHERE id IN($listId)";
		}
		$this->setQuery($sql);
		if ($action==null) {
			if ($tinh_trang == 2) {
				$this->execute(array($ngay_hientai, $gio_hientai, $tinh_trang));
			} elseif ($tinh_trang == 3 || $tinh_trang == 4) {
				$this->execute(array($tinh_trang));
			}
		} elseif ($action=='delete') {
			$this->execute();
		}
		$this->disconnect();
	}

	function update_by_id($hsId, $so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs){
		$sql = "UPDATE chung_tu_om_ts SET so_hs = ?, ma_dv = ?, so_tbctg = ?, so_luong = ?, ghi_chu = ?, loai_hs = ? WHERE id = ?";
		$this->setQuery($sql);
		$this->execute(array($so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs, $hsId));
		$this->disconnect();
	}

	function sohs_autocomplete($term) {
		$sql = "SELECT so_hs FROM chung_tu_om_ts WHERE so_hs LIKE ?";
		$this->setQuery($sql);
		return $this->loadAllRows(array('%'.$term.'%'));
		$this->disconnect();
	}

	function search_hsomts($tu_ngay_nhap, $den_ngay_nhap, $so_hs, $list_sohs, $ma_dv, $loai_hs, $nguoi_nhap, $tinh_trang, $index=-1, $limit=-1) {
		$sql = "SELECT ct.*, us.fullname, dv.ten_dv FROM chung_tu_om_ts ct INNER JOIN users us ON ct.canboxuly = us.uid INNER JOIN dv_sdld dv ON ct.ma_dv = dv.ma_dv WHERE ct.ma_dv LIKE ? AND ct.loai_hs LIKE ? AND ct.canboxuly LIKE ? AND ct.tinh_trang LIKE ?";
		if ($list_sohs == null) {
			$sql .= " AND ct.so_hs LIKE ?";
		} else {
			$sql .= " AND ct.so_hs IN('$list_sohs')";
		}
		if ($tu_ngay_nhap != null && $den_ngay_nhap != null) {
			$sql .= " AND ct.ngay_nhaphs BETWEEN ? AND ?";
		}
		$sql .= " ORDER BY ct.id DESC";
		if ($index>-1 && $limit>1) {
			$sql .= " LIMIT $index,$limit";
		}
		$this->setQuery($sql);
		if ($tu_ngay_nhap != null && $den_ngay_nhap != null) {
			if ($list_sohs == null) {
				return $this->loadAllRows(array('%'.$ma_dv.'%', '%'.$loai_hs.'%', '%'.$nguoi_nhap.'%', '%'.$tinh_trang.'%', '%'.$so_hs.'%', $tu_ngay_nhap, $den_ngay_nhap));
			} else {
				return $this->loadAllRows(array('%'.$ma_dv.'%', '%'.$loai_hs.'%', '%'.$nguoi_nhap.'%', '%'.$tinh_trang.'%', $tu_ngay_nhap, $den_ngay_nhap));
			}
		} else {
			if ($list_sohs == null) {
				return $this->loadAllRows(array('%'.$ma_dv.'%', '%'.$loai_hs.'%', '%'.$nguoi_nhap.'%', '%'.$tinh_trang.'%', '%'.$so_hs.'%'));
			} else {
				return $this->loadAllRows(array('%'.$ma_dv.'%', '%'.$loai_hs.'%', '%'.$nguoi_nhap.'%', '%'.$tinh_trang.'%'));
			}
		}
		$this->disconnect();
	}

	function get_hs_byId($hsId, $uid){
		$sql = "SELECT ct.*, dv.ten_dv FROM chung_tu_om_ts ct INNER JOIN dv_sdld dv ON ct.ma_dv = dv.ma_dv WHERE ct.id = ? AND ct.canboxuly = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($hsId, $uid));
		$this->disconnect();
	}

	function process_detail($hsId, $tinh_trang){
		if ($tinh_trang == 1 || $tinh_trang == 2) {
			$sql = "SELECT ct.*, us.fullname FROM chung_tu_om_ts ct INNER JOIN users us ON ct.canboxuly = us.uid WHERE ct.id = ?";
		} elseif ($tinh_trang == 3) {
			$sql = "SELECT ct.*, us.fullname, bbbg.ngay_taobb, bbbg.gio_taobb FROM chung_tu_om_ts ct INNER JOIN users us ON ct.canboxuly = us.uid INNER JOIN bbbghs bbbg ON bbbg.list_hs LIKE ? WHERE ct.id = ?";
		}
		$this->setQuery($sql);
		if ($tinh_trang == 1 || $tinh_trang == 2) {
			return $this->loadRow(array($hsId));
		} elseif ($tinh_trang == 3) {
			return $this->loadRow(array('%,'.$hsId.',%', $hsId));
		}
		$this->disconnect();
	}

	function search_listbb($tu_ngay_bghs, $den_ngay_bghs, $so_hs, $index=-1, $limit=-1) {
		$sql = "SELECT * FROM bbbghs WHERE list_hs LIKE ?";
		if ($tu_ngay_bghs != null && $den_ngay_bghs != null) {
			$sql .= " AND ngay_taobb BETWEEN ? AND ?";
		}
		if ($index>-1 && $limit>1) {
			$sql .= " LIMIT $index,$limit";
		}
		$this->setQuery($sql);
		if ($tu_ngay_bghs != null && $den_ngay_bghs != null) {
			return $this->loadAllRows(array('%'.$so_hs.'%', $tu_ngay_bghs, $den_ngay_bghs));
		} else {
			return $this->loadAllRows(array('%'.$so_hs.'%'));
		}
		$this->disconnect();
	}

	function search_list_phieutrinh($tu_ngay_tao, $den_ngay_tao, $index=-1, $limit=-1) {
		$sql = "SELECT phieutrinh.*, u.fullname FROM phieu_trinh_tbctg phieutrinh INNER JOIN users u ON phieutrinh.nguoi_tao = u.uid";
		if ($tu_ngay_tao != null && $den_ngay_tao != null) {
			$sql .= " AND ngay_tao BETWEEN ? AND ?";
		}
		if ($index>-1 && $limit>1) {
			$sql .= " LIMIT $index,$limit";
		}
		$this->setQuery($sql);
		if ($tu_ngay_tao != null && $den_ngay_tao != null) {
			return $this->loadAllRows(array($tu_ngay_tao, $den_ngay_tao));
		} else {
			return $this->loadAllRows();
		}
		$this->disconnect();
	}

	function search_hsomts_by_listId($listId) {
		$sql = "SELECT ct.*, us.username, dv.ten_dv FROM chung_tu_om_ts ct INNER JOIN users us ON ct.canboxuly = us.uid INNER JOIN dv_sdld dv ON ct.ma_dv = dv.ma_dv WHERE ct.id IN($listId)";
		$this->setQuery($sql);
		return $this->loadAllRows();
		$this->disconnect();
	}

	function search_tbctg_by_listId($listId) {
		$sql = "SELECT qlvb.ma_dv, dv.ten_dv FROM qlvb INNER JOIN dv_sdld dv ON qlvb.ma_dv = dv.ma_dv WHERE qlvb.vb_id IN($listId)";
		$this->setQuery($sql);
		return $this->loadAllRows();
		$this->disconnect();
	}

	function tao_bbbghs($list_hs, $nguoitaobb, $ngay_hientai, $gio_hientai) {
		$sql = "INSERT INTO bbbghs(list_hs, nguoitaobb, ngay_taobb, gio_taobb) VALUES (?,?,?,?)";
		$this->setQuery($sql);
		$this->execute(array($list_hs, $nguoitaobb, $ngay_hientai, $gio_hientai));
		return $this->getLastId();
		$this->disconnect();
	}

	function tao_phieu_trinh_tbctg($listId, $nguoitao, $ngay_tao) {
		$sql = "INSERT INTO phieu_trinh_tbctg(list_tbctg, nguoi_tao, ngay_tao) VALUES (?,?,?)";
		$this->setQuery($sql);
		$this->execute(array($listId, $nguoitao, $ngay_tao));
		return $this->getLastId();
		$this->disconnect();
	}

	function update_status_tbctg($hsId) {
		$sql = "UPDATE qlvb SET tao_phieu_trinh = 1 WHERE vb_id IN($hsId)";
		$this->setQuery($sql);
		$this->execute();
		$this->disconnect();
	}

	function get_bbbghs($bbbg_id) {
		$sql = "SELECT * FROM bbbghs WHERE bbbg_id = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($bbbg_id));
		$this->disconnect();
	}

	function get_phieu_trinh($phieutrinh_id) {
		$sql = "SELECT phieutrinh.*, us.fullname  FROM phieu_trinh_tbctg phieutrinh INNER JOIN users us ON phieutrinh.nguoi_tao = us.uid WHERE phieutrinh.id = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($phieutrinh_id));
		$this->disconnect();
	}

}
?>