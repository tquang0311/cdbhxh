<?php
session_start();
if (isset($_POST['update'])) {
	/*require "../libs/config.php";
	/*$datahs_id = $_POST['data'];
	$usg = $_POST['usg'];*/
	
		$themsl = $_POST['themsl']; 
		echo $themsl;
		/*$hs_xinykien_bhxhvn = $_POST['hs_xinykien_bhxhvn'];
		$boctach_dieuchinh = $_POST['boctach_dieuchinh'];
		$cv_datduoc = $_POST['cv_datduoc'];
		$cv_chuadatduoc = $_POST['cv_chuadatduoc'];
		$ly_do = $_POST['ly_do'];
		$cv_phatsinh = $_POST['cv_phatsinh'];
		echo $themsl;
		/*$sql = "UPDATE data_hs SET themsl=?, hs_xinykien_bhxhvn=?, boctach_dieuchinh=?, cv_datduoc=?, cv_chuadatduoc=?, ly_do=?, cv_phatsinh=?  WHERE datahs_id=?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$themsl, $hs_xinykien_bhxhvn, $boctach_dieuchinh, $cv_datduoc, $cv_chuadatduoc, $ly_do, $cv_phatsinh, $datahs_id]);
		$_SESSION['update'] = 'Cập nhập dữ liệu thành công';*/
		/*header('Location: ../tong-hop/');*/
} ?>