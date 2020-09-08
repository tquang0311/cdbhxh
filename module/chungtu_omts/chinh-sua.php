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
isset($_POST['so_hs']) ? $so_hs = $_POST['so_hs'].$loai_hsText.'/2019/001' : $so_hs = '';
isset($_POST['ma_dv']) ? $ma_dv = $_POST['ma_dv'] : $ma_dv = '';
isset($_POST['chi_tiet_hs']) ? $so_tbctg = $_POST['chi_tiet_hs'] : $so_tbctg = 0;
isset($_POST['so_luong']) ? $so_luong = $_POST['so_luong'] : $so_luong = '';
isset($_POST['ghi_chu']) ? $ghi_chu = $_POST['ghi_chu'] : $ghi_chu = '';
$newHS = $c_chungtu_omts->updateById((int)$_POST['hsId'], $so_hs, $ma_dv, $so_tbctg, $so_luong, $ghi_chu, $loai_hs);
$_SESSION['success'] = 'Cập nhập dữ liệu thành công';
?>
<script>
	window.location.replace('../../public/chung-tu-tra-don-vi.php?tu_ngay_nhap=&den_ngay_nhap=&so_hs=&ma_dv=&nguoi_nhap=<?=$get_user['get_user']->uid;?>&tinh_trang=1&search=filter_process');
</script>