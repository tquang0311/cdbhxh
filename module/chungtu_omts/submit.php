<?php
//error_reporting(0);
session_start();
chdir('../');
require('../controller/user.php');
require('../controller/chung_tu_omts.php');
$c_user = new c_user();
$get_user = $c_user->get_user();

$c_chungtu_omts = new c_chungtu_omts();
$hs = $_POST['hs'];
$listId = implode(',', $hs);
if (isset($_POST['da_xu_ly'])) {
	$action = null;
	$tinh_trang = 2;
} elseif (isset($_POST['tao_bbbg'])) {
	$action = null;
	$tinh_trang = 3;
} elseif (isset($_POST['xoa_hs'])) {
	$action = 'delete';
	$tinh_trang = 0;
} elseif (isset($_POST['tu_choi'])) {
	$action = null;
	$tinh_trang = 4;
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ngay_hientai = date('Y-m-d');
$gio_hientai = date('H:i:s');
$update = $c_chungtu_omts->updateData($action, $listId, $tinh_trang, $ngay_hientai, $gio_hientai);
if (isset($_POST['tao_bbbg'])) {
	require('tao_bbbg.php');
} elseif (isset($_POST['da_xu_ly']) || isset($_POST['xoa_hs']) || isset($_POST['tu_choi'])) {
	if (isset($_POST['da_xu_ly'])) {
		$alert = 'Xử lý ';
	} elseif (isset($_POST['xoa_hs'])) {
		$alert = 'Xóa ';
	} elseif (isset($_POST['tu_choi'])) {
		$alert = 'Từ chối ';
	}
	$_SESSION['success'] = $alert.count($hs).' hồ sơ thành công';
	?>
	<script>
		window.location.replace('../../public/chung-tu-tra-don-vi.php?tu_ngay_nhap=&den_ngay_nhap=&so_hs=&ma_dv=&tinh_trang=&search=filter_process');
	</script>
<?php } ?>