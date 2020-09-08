<?php
chdir('../');
require('../controller/user.php');
require('../controller/qlvb.php');
	$c_user = new c_user();
	$get_user = $c_user->get_user();
	$user = $get_user['get_user'];

	$loai_vb = (int)$_POST['loai-vb'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$current_year = date('Y');
	$c_qlvb = new c_qlvb();
	$maxNumber = $c_qlvb->getMaxNumber($loai_vb, $current_year);
	if ($user->user_group == 5) {
		$so_vb = 0;
	} else {
		if (!$maxNumber) {
			$so_vb = 1;
		} else {
			$so_vb = $maxNumber['maxNumber']->so_vb+1;
		}
	}

	isset($_POST['ho-ten-nld']) ? $ho_ten_nld = $_POST['ho-ten-nld'] : $ho_ten_nld = '';
	isset($_POST['gioi-tinh']) ? $gioi_tinh = $_POST['gioi-tinh'] : $gioi_tinh = 0;
	isset($_POST['so-so']) ? $so_so = $_POST['so-so'] : $so_so = '';
	isset($_POST['cd-giai-quyet']) ? $cd_giai_quyet = $_POST['cd-giai-quyet'] : $cd_giai_quyet = '';
	isset($_POST['quan-huyen']) ? $quan_huyen = $_POST['quan-huyen'] : $quan_huyen = 0;
	isset($_POST['phuong-xa']) ? $phuong_xa = $_POST['phuong-xa'] : $phuong_xa = 0;
	isset($_POST['sdt']) ? $sdt = $_POST['sdt'] : $sdt = 0;
	isset($_POST['email']) ? $email = $_POST['email'] : $email = 0;
	isset($_POST['noi-dung']) ? $noi_dung = $_POST['noi-dung'] : $noi_dung = '';
	if ($loai_vb==3) {
		if ($user->user_group!=5) {
			$noi_nhan = $_POST['noi-nhan'];
		} else {
			$noi_nhan = 5;
		}
		if ($noi_nhan==2) {
			$bhxhqh = $_POST['quan-huyen'];
		} elseif ($noi_nhan==3) {
			$bhxhqh = $_POST['bhxhqh'];
		} else {
			$bhxhqh = '00';
		}
	} elseif ($loai_vb==4) {
		$noi_nhan = $_POST['noi-nhan'];
		$bhxhqh = $_POST['quan-huyen'];
		/*if ($noi_nhan==8) {
			$bhxhqh = $_POST['quan-huyen'];
		} else {
			$bhxhqh = '00';
		}*/
	}
	isset($_POST['cd-huong']) ? $cd_huong = $_POST['cd-huong'] : $cd_huong = '';
	isset($_POST['ngay-sinh']) ? $ngay_sinh = $_POST['ngay-sinh'] : $ngay_sinh = '0000-00-00';
	isset($_POST['ngay-chet']) ? $ngay_chet = $_POST['ngay-chet'] : $ngay_chet = '0000-00-00';
	isset($_POST['chuc-danh']) ? $chuc_danh = $_POST['chuc-danh'] : $chuc_danh = '';
	isset($_POST['ngay-nhan']) ? $ngay_nhan = $_POST['ngay-nhan'] : $ngay_nhan = '0000-00-00';
	isset($_POST['dot-nhan']) ? $dot_nhan = $_POST['dot-nhan'] : $dot_nhan = '0000-00-00';
	isset($_POST['so-bb']) ? $so_bb = trim($_POST['so-bb']) : $so_bb = '';
	isset($_POST['ma-dv']) ? $ma_dv = $_POST['ma-dv'] : $ma_dv = 0;
	isset($_POST['noi-gui']) ? $noi_gui = $_POST['noi-gui'] : $noi_gui = 0;
	$ngay_phat_hanh = date('Y-m-d');
	$nguoi_du_thao = $user->uid;
	$user_group = $user->user_group;
	$ld_duyet = $_POST['ld-duyet'];
	$new_vb = $c_qlvb->addnew_vb($so_vb, $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_gui, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $sdt, $email, $noi_dung, $ngay_phat_hanh, $nguoi_du_thao, $user_group, $loai_vb, $ld_duyet);
	$_SESSION['success'] = 'Thêm văn bản mới thành công';
	?>
	<script>
		window.location.replace('../../public/phieu-tra.php?s-date=&e-date=&name=&svb=&mdv=&ss=&noinhan=&bhxhqh=&ldduyet=&status=1&keyword=&loai-vb=&user=on&search-vb=');
		window.open('../../print/?vb_type=<?=$loai_vb;?>&vb=<?=$new_vb["vbi"];?>', '_blank');
	</script>