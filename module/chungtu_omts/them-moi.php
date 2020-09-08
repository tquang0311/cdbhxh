<?php
//error_reporting(0);
session_start();
chdir('../');
require('../controller/user.php');
require('../controller/chung_tu_omts.php');
$c_user = new c_user();
$get_user = $c_user->get_user();

$c_chungtu_omts = new c_chungtu_omts();
isset($_POST['loai_hs']) ? $loai_hs = $_POST['loai_hs'] : $loai_hs = 0;
if ($loai_hs == 1) {
	$loai_hsText = '';
} elseif ($loai_hs == 2) {
	$loai_hsText = '.G';
} elseif ($loai_hs == 3) {
	$loai_hsText = '.BD';
}
isset($_POST['so_hs']) ? $so_hs = $_POST['so_hs'].$loai_hsText.'/2020/001' : $so_hs = '';
isset($_POST['ma_dv']) ? $ma_dv = $_POST['ma_dv'] : $ma_dv = '';
isset($_POST['chi_tiet_hs']) ? $so_tbctg = $_POST['chi_tiet_hs'] : $so_tbctg = 0;
isset($_POST['so_luong']) ? $so_luong = $_POST['so_luong'] : $so_luong = '';
isset($_POST['ghi_chu']) ? $ghi_chu = $_POST['ghi_chu'] : $ghi_chu = '';
$canboxuly = $get_user['get_user']->uid;
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ngay_nhaphs = date('Y-m-d');
$gio_nhaphs = date('H:i:s');
$newHS = $c_chungtu_omts->addNew($so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs, $canboxuly, $ngay_nhaphs, $gio_nhaphs);
$_SESSION['success'] = 'Thêm dữ liệu thành công';
?>
<script>
	window.location.replace('../../public/chung-tu-tra-don-vi.php?view=addnew&loaihs=<?=$loai_hs;?>');
</script>