<?php
session_start();
require "libs/config.php";
$uid = $_SESSION['uid'];
if (isset($_POST['save-hs'])) {
	$tu_ngay = $_POST['tu-ngay'];
	$den_ngay = $_POST['den-ngay'];
	if ($_SESSION['usg'] == 3 OR $_SESSION['usg'] == 4 OR $_SESSION['usg'] == 5 OR $_SESSION['usg'] == 8) {
		$themsl = $_POST['themsl'];
	}
	if ($_SESSION['usg'] == 3) {
		$hs_sai_dieuchinh = $_POST['hs-sai-dieuchinh'];
		$baocao = $_POST['bao-cao'];
		$ktdl_chuyenchitra = $_POST['ktdl_chuyenchitra'];
		$kt_chuyendl21ab = $_POST['kt_chuyendl21ab'];
	}
	if ($_SESSION['usg'] == 4) {
		$hs_xinykien_bhxhvn = $_POST['hs-xinykien-bhxhvn'];
		$boctach_dieuchinh = $_POST['boctach-dieuchinh'];
	}
	if ($_SESSION['usg'] == 5) {
		$baocao_odts = $_POST['baocao-odts'];
		$tonghop_ketoan = $_POST['tonghop-ketoan'];
		$boctach_xdnh = $_POST['boctach-xdnh'];
	}
	if ($_SESSION['usg'] == 6) {
		$boctach_xddh = $_POST['boctach-xddh'];
	}
	if ($_SESSION['usg'] == 7) {
		$sqd_thoihuongtuat = $_POST['sqd-thoihuongtuat'];
		$hs_chuyenden_qlc = $_POST['hs-chuyenden-qlc'];
		$hs_tang_trongthang = $_POST['hs-tang-trongthang'];
		$hs_thaydoi_trongthang = $_POST['hs-thaydoi-trongthang'];
	}
	if ($_SESSION['usg'] == 8) {
		$tonghop_21ab = $_POST['tonghop-21ab'];
	}
	if ($_SESSION['usg'] == 9) {
		$hs_huongtn_tangmoi_chi_atm = $_POST['hs-huongtn-tangmoi-chi-atm'];
		$luot_huong_tctn_atm = $_POST['luot-huong-tctn-atm'];
		$hs_hotro_hocnghe = $_POST['hs-hotro-hocnghe'];
		$hs_baoluu_tgian_tn = $_POST['hs-baoluu-tgian-tn'];
		$hs_thuhoi_tn = $_POST['hs-thuhoi-tn'];
		$in_the_bhyt = $_POST['in-the-bhyt'];
	}
	if ($_SESSION['usg'] != 6 && $_SESSION['usg'] != 2 && $_SESSION['usg'] != 7) {
		$cv_datduoc = $_POST['cv_datduoc'];
		$cv_chuadatduoc = $_POST['cv_chuadatduoc'];
		$ly_do = $_POST['ly-do'];
	}
		$cv_phatsinh = $_POST['cvphatsinh'];
	if ($_SESSION['usg'] == 2) {
		if ($cv_phatsinh == '') {
			$_SESSION['error'] = 'Bạn chưa nhập dữ liệu';
			header('Location: ./');
			unset($_SESSION['success']);
		} else {
		$sql = "INSERT INTO data_hs(uid, cv_phatsinh, ngay_nhap) VALUES (?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$uid, $cv_phatsinh, $ngay_nhap]);
		$_SESSION['success'] = 'Thêm dữ liệu thành công';
		header('Location: ./');
		unset($_SESSION['error']);
		}
	}
	if ($_SESSION['usg'] == 3) {
		if ($themsl == '' && $hs_sai_dieuchinh == '' && $baocao == '' && $ktdl_chuyenchitra == '' && $kt_chuyendl21ab == '' && $cv_datduoc == '' && $cv_chuadatduoc == '' && $cv_phatsinh == '') {
			$_SESSION['error'] = 'Bạn phải nhập ít nhất 1 trường dữ liệu';
			header('Location: ./');
			unset($_SESSION['success']);
		} else {
		$sql = "INSERT INTO data_hs(uid, themsl, hs_sai_dieuchinh, bao_cao, ktdl_chuyenchitra, kt_chuyendl21ab, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$uid, $themsl, $hs_sai_dieuchinh, $baocao, $ktdl_chuyenchitra, $kt_chuyendl21ab, $cv_datduoc, $cv_chuadatduoc, $ly_do, $cv_phatsinh, $tu_ngay, $den_ngay]);
		$_SESSION['success'] = 'Thêm dữ liệu thành công';
		header('Location: ./');
		unset($_SESSION['error']);
		}
	}
	if ($_SESSION['usg'] == 4) {
		if ($themsl == '' && $hs_xinykien_bhxhvn == '' && $boctach_dieuchinh == '' && $cv_datduoc == '' && $cv_chuadatduoc == '' && $cv_phatsinh == '') {
			$_SESSION['error'] = 'Bạn phải nhập ít nhất 1 trường dữ liệu';
			header('Location: ./');
			unset($_SESSION['success']);
		} else {
		$sql = "INSERT INTO data_hs(uid, themsl, hs_xinykien_bhxhvn, boctach_dieuchinh, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$uid, $themsl, $hs_xinykien_bhxhvn, $boctach_dieuchinh, $cv_datduoc, $cv_chuadatduoc, $ly_do, $cv_phatsinh, $tu_ngay, $den_ngay]);
		$_SESSION['success'] = 'Thêm dữ liệu thành công';
		header('Location: ./');
		unset($_SESSION['error']);
		}
	}
	if ($_SESSION['usg'] == 5) {
		if ($themsl == '' && $baocao_odts == '' && $tonghop_ketoan == '' && $boctach_xdnh == '' && $cv_datduoc == '' && $cv_chuadatduoc == '' && $cv_phatsinh == '') {
			$_SESSION['error'] = 'Bạn phải nhập ít nhất 1 trường dữ liệu';
			header('Location: ./');
			unset($_SESSION['success']);
		} else {
		$sql = "INSERT INTO data_hs(uid, themsl, baocao_odts, tonghop_ketoan, boctach_xdnh, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$uid, $themsl, $baocao_odts, $tonghop_ketoan, $boctach_xdnh, $cv_datduoc, $cv_chuadatduoc, $ly_do, $cv_phatsinh, $tu_ngay, $den_ngay]);
		$_SESSION['success'] = 'Thêm dữ liệu thành công';
		header('Location: ./');
		}
	}
	if ($_SESSION['usg'] == 6) {
		if ($boctach_xddh == '' && $cv_phatsinh == '') {
			$_SESSION['error'] = 'Bạn phải nhập ít nhất 1 trường dữ liệu';
			header('Location: ./');
			unset($_SESSION['success']);
		} else {
		$sql = "INSERT INTO data_hs(uid, boctach_xddh, cv_phatsinh, tu_ngay, den_ngay) VALUES (?,?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$uid, $boctach_xddh, $cv_phatsinh, $tu_ngay, $den_ngay]);
		$_SESSION['success'] = 'Thêm dữ liệu thành công';
		header('Location: ./');
		}
	}
	if ($_SESSION['usg'] == 7) {
		if ($sqd_thoihuongtuat == '' && $tonghop_qlc == '' && $hs_chuyenden_qlc == '' && $hs_tang_trongthang == '' && $hs_thaydoi_trongthang == '' && $cv_datduoc == '' && $cv_chuadatduoc == '' && $cv_phatsinh == '') {
			$_SESSION['error'] = 'Bạn phải nhập ít nhất 1 trường dữ liệu';
			header('Location: ./');
			unset($_SESSION['success']);
		} else {
		$sql = "INSERT INTO data_hs(uid, sqd_thoihuongtuat, hs_chuyenden_qlc, hs_tang_trongthang, hs_thaydoi_trongthang, cv_phatsinh, tu_ngay, den_ngay) VALUES (?,?,?,?,?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$uid, $sqd_thoihuongtuat, $hs_chuyenden_qlc, $hs_tang_trongthang, $hs_thaydoi_trongthang, $cv_phatsinh, $tu_ngay, $den_ngay]);
		$_SESSION['success'] = 'Thêm dữ liệu thành công';
		header('Location: ./');
		}
	}
	if ($_SESSION['usg'] == 8) {
		if ($themsl == '' && $tonghop_21ab == '' && $cv_datduoc == '' && $cv_chuadatduoc == '' && $cv_phatsinh == '') {
			$_SESSION['error'] = 'Bạn phải nhập ít nhất 1 trường dữ liệu';
			header('Location: ./');
			unset($_SESSION['success']);
		} else {
		$sql = "INSERT INTO data_hs(uid, themsl, tonghop_21ab, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay) VALUES (?,?,?,?,?,?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$uid, $themsl, $tonghop_21ab, $cv_datduoc, $cv_chuadatduoc, $ly_do, $cv_phatsinh, $tu_ngay, $den_ngay]);
		$_SESSION['success'] = 'Thêm dữ liệu thành công';
		header('Location: ./');
		}
	}
	if ($_SESSION['usg'] == 9) {
		if ($hs_huongtn_tangmoi_chi_atm == '' && $luot_huong_tctn_atm == '' && $hs_hotro_hocnghe == '' && $hs_baoluu_tgian_tn == '' && $hs_thuhoi_tn == '' && $in_the_bhyt == '' && $cv_datduoc == '' && $cv_chuadatduoc == '' && $cv_phatsinh == '') {
			$_SESSION['error'] = 'Bạn phải nhập ít nhất 1 trường dữ liệu';
			header('Location: ./');
			unset($_SESSION['success']);
		} else {
		$sql = "INSERT INTO data_hs(uid, hs_huongtn_tangmoi_chi_atm, luot_huong_tctn_atm, hs_hotro_hocnghe, hs_baoluu_tgian_tn, hs_thuhoi_tn, in_the_bhyt, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$uid, $hs_huongtn_tangmoi_chi_atm, $luot_huong_tctn_atm, $hs_hotro_hocnghe, $hs_baoluu_tgian_tn, $hs_thuhoi_tn, $in_the_bhyt, $cv_datduoc, $cv_chuadatduoc, $ly_do, $cv_phatsinh, $tu_ngay, $den_ngay]);
		$_SESSION['success'] = 'Thêm dữ liệu thành công';
		header('Location: ./');
		}
	}
}
