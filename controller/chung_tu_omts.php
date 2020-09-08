<?php
require 'function_general.php';
require '../model/chung_tu_omts.php';
require '../model/pager.php';

class c_chungtu_omts extends function_general {

	function search_TBCTG($so_hs, $ma_dv) {
		$m_chungtu_omts = new m_chungtu_omts();
		$tbctg = $m_chungtu_omts->search_tbctg($so_hs, $ma_dv);
		if ($tbctg==true) {
			$ngay_phat_hanh = DATE_FORMAT(new DateTime($tbctg->ngay_phat_hanh), 'd/m/Y');
			return array('tbctg'=>array('so_tb'=>$tbctg->so_vb,'ngay_ph'=>$ngay_phat_hanh));
		}
	}

	function checkSoHS($so_hs) {
		$m_chungtu_omts = new m_chungtu_omts();
		$check_sohs = $m_chungtu_omts->check_sohs($so_hs);
		if ($check_sohs==true) {
			$output = json_encode(array('result'=>'true','msg'=>'Số hồ sơ này đã tồn tại'));
		} else {
			$output = json_encode(array('result'=>'false'));
		}
		echo $output;
	}

	function addNew($so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs, $canboxuly, $ngay_nhaphs, $gio_nhaphs) {
		$m_chungtu_omts = new m_chungtu_omts();
		$new_hs = $m_chungtu_omts->add_new($so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs, $canboxuly, $ngay_nhaphs, $gio_nhaphs);
	}

	function updateData($action, $listId, $tinh_trang, $ngay_hientai, $gio_hientai) {
		$m_chungtu_omts = new m_chungtu_omts();
		$new_hs = $m_chungtu_omts->update_data($action, $listId, $tinh_trang, $ngay_hientai, $gio_hientai);
	}

	function updateById($hsId, $so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs){
		$m_chungtu_omts = new m_chungtu_omts();
		$m_chungtu_omts->update_by_id($hsId, $so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs);
	}

	function soHsAutocomplete() {
		$m_chungtu_omts = new m_chungtu_omts();
		$term = $_GET['term'];
		$soHsAutocomplete = $m_chungtu_omts->sohs_autocomplete($term);
		return array('autocomplete'=>$soHsAutocomplete);
	}

	function searchHsOMTS() {
		global $search_error;
		global $count_all;
		isset($_GET['tu_ngay_nhap']) ? $tu_ngay_nhap = $_GET['tu_ngay_nhap'] : null;
		isset($_GET['den_ngay_nhap']) ? $den_ngay_nhap = $_GET['den_ngay_nhap'] : null;
		isset($_GET['loai_hs']) ? $loai_hs = $_GET['loai_hs'] : null;
		$number_record = isset($_GET['number_record']) ? $_GET['number_record'] : 20;
		if (isset($_GET['so_hs'])) {
			if (strpos($_GET['so_hs'], ';')) {
				$listSohs = str_replace(' ', null, $_GET['so_hs']);
				$arr_sohs = explode(';', $listSohs);
				$list_sohs = implode("','", $arr_sohs);
				$so_hs = null;
			} else {
				$list_sohs = null;
				$so_hs = $_GET['so_hs'];
			}
		} else {
			$so_hs = $list_sohs = null;
		}
		isset($_GET['ma_dv']) ? $ma_dv = $_GET['ma_dv'] : null;
		isset($_GET['nguoi_nhap']) ? $nguoi_nhap = $_GET['nguoi_nhap'] : null;
		isset($_GET['tinh_trang']) ? $tinh_trang = $_GET['tinh_trang'] : null;
		$m_chungtu_omts = new m_chungtu_omts();
		$HsOmts_All = $m_chungtu_omts->search_hsomts($tu_ngay_nhap, $den_ngay_nhap, $so_hs, $list_sohs, $ma_dv, $loai_hs, $nguoi_nhap, $tinh_trang);
		$count_all = count($HsOmts_All);
		$cur_page = (isset($_GET['page'])) ? $_GET['page']:1;
		$pagination = new pagination($count_all,$cur_page, $number_record);
		$paginationHTML = $pagination->showPagination();
		$limit = $pagination->_nItemOnPage;
		$index = ($cur_page-1)*$limit;
		$HsOmts = $m_chungtu_omts->search_hsomts($tu_ngay_nhap, $den_ngay_nhap, $so_hs, $list_sohs, $ma_dv, $loai_hs, $nguoi_nhap, $tinh_trang, $index, $limit);

		if ($HsOmts_All == true) {
			return array('hsomts'=>$HsOmts,'pagination_bar'=>$paginationHTML);
		} else {
			$search_error = 'Không tìm thấy dữ liệu';
		}
	}

	function updateStatusTBCTG($hsId) {
		$m_chungtu_omts = new m_chungtu_omts();
		$update = $m_chungtu_omts->update_status_tbctg($hsId);
		return $update;
	}

	function getHsByID($hsId, $uid){
		$m_chungtu_omts = new m_chungtu_omts();
		$hsomts = $m_chungtu_omts->get_hs_byId($hsId, $uid);
		return array('hs'=>$hsomts);
	}

	function processDetail($hsId, $tinh_trang) {
		$m_chungtu_omts = new m_chungtu_omts();
		$processDetail = $m_chungtu_omts->process_detail($hsId, $tinh_trang);
		return array('detail'=>$processDetail);
	}

	function searchListBB() {
		global $search_error;
		global $count_all;
		isset($_GET['tu_ngay_bghs']) ? $tu_ngay_bghs = $_GET['tu_ngay_bghs'] : null;
		isset($_GET['den_ngay_bghs']) ? $den_ngay_bghs = $_GET['den_ngay_bghs'] : null;
		isset($_GET['so_hs']) ? $so_hs = $_GET['so_hs'] : null;
		$m_chungtu_omts = new m_chungtu_omts();
		$ListBB_All = $m_chungtu_omts->search_listbb($tu_ngay_bghs, $den_ngay_bghs, $so_hs);
		$count_all = count($ListBB_All);
		$cur_page = (isset($_GET['page'])) ? $_GET['page']:1;
		$pagination = new pagination($count_all,$cur_page);
		$paginationHTML = $pagination->showPagination();
		$limit = $pagination->_nItemOnPage;
		$index = ($cur_page-1)*$limit;
		$ListBB = $m_chungtu_omts->search_listbb($tu_ngay_bghs, $den_ngay_bghs, $so_hs, $index, $limit);
		if ($ListBB_All == true) {
			return array('listbb'=>$ListBB,'pagination_bar'=>$paginationHTML);
		} else {
			$search_error = 'Không tìm thấy dữ liệu';
		}
	}

	function searchListPhieutrinh() {
		global $search_error;
		global $count_all;
		isset($_GET['tu_ngay_tao']) ? $tu_ngay_tao = $_GET['tu_ngay_tao'] : null;
		isset($_GET['den_ngay_tao']) ? $den_ngay_tao = $_GET['den_ngay_tao'] : null;
		$m_chungtu_omts = new m_chungtu_omts();
		$ListPhieutrinh_all = $m_chungtu_omts->search_list_phieutrinh($tu_ngay_tao, $den_ngay_tao);
		$count_all = count($ListPhieutrinh_all);
		$cur_page = (isset($_GET['page'])) ? $_GET['page']:1;
		$pagination = new pagination($count_all,$cur_page);
		$paginationHTML = $pagination->showPagination();
		$limit = $pagination->_nItemOnPage;
		$index = ($cur_page-1)*$limit;
		$ListPhieutrinh = $m_chungtu_omts->search_list_phieutrinh($tu_ngay_tao, $den_ngay_tao, $index, $limit);
		if ($ListPhieutrinh_all == true) {
			return array('listbb'=>$ListPhieutrinh,'pagination_bar'=>$paginationHTML);
		} else {
			$search_error = 'Không tìm thấy dữ liệu';
		}
	}

	function searchHsomtsByListId($listId) {
		$m_chungtu_omts = new m_chungtu_omts();
		$HsOmtsAll = $m_chungtu_omts->search_hsomts_by_listId($listId);
		if ($HsOmtsAll == true) {
			return array('hsomts'=>$HsOmtsAll);
		}
	}

	function searchTBCTGByListId($listId) {
		$m_chungtu_omts = new m_chungtu_omts();
		$ListTBCTG = $m_chungtu_omts->search_tbctg_by_listId($listId);
		if ($ListTBCTG == true) {
			return array('tbctg_data'=>$ListTBCTG);
		}
	}

	function taoBBBGHS($list_hs, $nguoitaobb, $ngay_hientai, $gio_hientai) {
		$m_chungtu_omts = new m_chungtu_omts();
		$list_hs = ','.$list_hs.',';
		$newBBBGHS = $m_chungtu_omts->tao_bbbghs($list_hs, $nguoitaobb, $ngay_hientai, $gio_hientai);
		return array('bbbg'=>$newBBBGHS);
	}

	function taoPhieutrinhTBCTG($listId, $nguoitao, $ngay_tao) {
		$m_chungtu_omts = new m_chungtu_omts();
		$listId = ','.$listId.',';
		$newPhieutrinhTBCTG = $m_chungtu_omts->tao_phieu_trinh_tbctg($listId, $nguoitao, $ngay_tao);
		return array('data'=>$newPhieutrinhTBCTG);
	}

	function getBBBGHS($bbbg_id) {
		$m_chungtu_omts = new m_chungtu_omts();
		$bbbghs = $m_chungtu_omts->get_bbbghs($bbbg_id);
		if ($bbbghs==true) {
			return array('bbbg'=>$bbbghs);
		}
	}

	function getPhieutrinh($phieutrinh_id) {
		$m_chungtu_omts = new m_chungtu_omts();
		$phieutrinh = $m_chungtu_omts->get_phieu_trinh($phieutrinh_id);
		if ($phieutrinh==true) {
			return array('data'=>$phieutrinh);
		}
	}

}
?>