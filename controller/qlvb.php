<?php
require '../model/qlvb.php';
require '../model/pager.php';
class c_qlvb {

	function mb_ucwords($str) {
		return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
	}

	function error($msg) {
		$output = json_encode(array('result' => 'error','msg' => $msg));
		return $output;
	}

	function success($msg) {
		$output = json_encode(array('result' => 'success','msg' => $msg));
		return $output;
	}

	function getMaxNumber($loai_vb, $current_year) {
		$m_qlvb = new m_qlvb();
		$maxNumber = $m_qlvb->get_max_number($loai_vb, $current_year);
		return array('maxNumber'=>$maxNumber);
	}

	function search_vb($loai_vb, $user_group = null) {
		global $search_error;
		global $count_all;
		isset($_GET['s-date']) ? $tu_ngay = $_GET['s-date'] : null;
		isset($_GET['e-date']) ? $den_ngay = $_GET['e-date'] : null;
		isset($_GET['name']) ? $ho_ten_nld = $_GET['name'] : null;
		isset($_GET['svb']) ? $so_vb = $_GET['svb'] : null;
		isset($_GET['ss']) ? $so_so = $_GET['ss'] : null;
		isset($_GET['mdv']) ? $ma_dv = $_GET['mdv'] : null;
		isset($_GET['noinhan']) ? $noi_nhan = $_GET['noinhan'] : null;
		isset($_GET['bhxhqh']) ? $bhxhqh = $_GET['bhxhqh'] : null;
		isset($_GET['keyword']) ? $noi_dung = $_GET['keyword'] : null;
		isset($_GET['ldduyet']) ? $ld_duyet = $_GET['ldduyet'] : null;
		isset($_GET['status']) ? $trang_thai = $_GET['status'] : null;
		isset($_GET['user']) ? $personal_user = $_GET['user'] : null;
		$m_qlvb = new m_qlvb();
		$qlvb_all = $m_qlvb->searchvb($tu_ngay, $den_ngay, $ho_ten_nld, $so_vb, $so_so, $ma_dv, $noi_nhan, $bhxhqh, $noi_dung, $ld_duyet, $trang_thai, $personal_user, $user_group, $loai_vb);
		$count_all = count($qlvb_all);
		$cur_page = (isset($_GET['page'])) ? $_GET['page']:1;
		$pagination = new pagination($count_all,$cur_page);
		$paginationHTML = $pagination->showPagination();
		$limit = $pagination->_nItemOnPage;
		$index = ($cur_page-1)*$limit;
		$qlvb = $m_qlvb->searchvb($tu_ngay, $den_ngay, $ho_ten_nld, $so_vb, $so_so, $ma_dv, $noi_nhan, $bhxhqh, $noi_dung, $ld_duyet, $trang_thai, $personal_user, $user_group, $loai_vb, $index, $limit);

		if ($qlvb_all == true) {
			return array('qlvb'=>$qlvb,'pagination_bar'=>$paginationHTML);
		} else {
			$search_error = 'Không tìm thấy dữ liệu';
		}
	}

	function count_pt($ho_ten_nld, $so_so){
		$m_qlvb = new m_qlvb();
		$count_pt = $m_qlvb->countpt($ho_ten_nld, $so_so);
		if ($count_pt==true) {
			return array('countpt'=>$count_pt);
		}
	}

	function getVb(){
		$loai_vb = $_GET['vb_type'];
		$vb_id = $_REQUEST['vb'];
		$m_qlvb = new m_qlvb();
		$get_vb = $m_qlvb->get_vb($loai_vb, $vb_id);
		return array('get_vb'=>$get_vb);
	}

	function getDistricts(){
		$m_qlvb = new m_qlvb();
		$districts = $m_qlvb->get_districts();
		return array('list'=>$districts);
	}

	function getWards(){
		$m_qlvb = new m_qlvb();
		$wards = $m_qlvb->get_wards();
		return array('list'=>$wards);
	}

	function getWardsByDistId($distId){
		$m_qlvb = new m_qlvb();
		$wardByDistId = $m_qlvb->get_ward_by_distId($distId);
		return array('list'=>$wardByDistId);
	}

	function getDvsdld($madv){
		$m_qlvb = new m_qlvb();
		$dvSdld = $m_qlvb->get_dvsdld($madv);
		return array('dvsdld'=>$dvSdld);
	}

	function trungHS($ho_ten_nld, $so_so){
		$m_qlvb = new m_qlvb();
		$count_trungHS = $m_qlvb->trung_hs($ho_ten_nld, $so_so);
		if ($count_trungHS==true) {
			$output = $this->error(count($count_trungHS));
		} else {
			$output = $this->success('');
		}
		echo $output;
	}

	function addnew_vb($so_vb, $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_gui, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $sdt, $email, $noi_dung, $ngay_phat_hanh, $nguoi_du_thao, $user_group, $loai_vb, $ld_duyet) {
		$m_qlvb = new m_qlvb();
		$new_vb = $m_qlvb->add_new_vb($so_vb, $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_gui, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $sdt, $email, $noi_dung, $ngay_phat_hanh, $nguoi_du_thao, $user_group, $loai_vb, $ld_duyet);
		return array('vbi'=>$new_vb);
	}

	function updateVb($action, $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $sdt, $email, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $noi_dung, $ld_duyet, $tinh_trang, $vb_id) {
		$m_qlvb = new m_qlvb();
		if ($action=='edit') {
			$updatevb = $m_qlvb->update_vb($action, $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $sdt, $email, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $noi_dung, $ld_duyet, $tinh_trang, $vb_id);
		}
	}

}
?>