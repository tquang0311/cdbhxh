<?php
//error_reporting(0);
session_start();
chdir('../');
require('../controller/user.php');
require('../controller/chung_tu_omts.php');

$c_user = new c_user();
//$get_user = $c_user->get_user();

$c_chungtu_omts = new c_chungtu_omts();
$hs = $_POST['hs'];
$listId = implode(',', $hs);
$trang_thai_phieu_trinh = 1;
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ngay_hientai = date('Y-m-d');
//$gio_hientai = date('H:i:s');

$update = $c_chungtu_omts->updateStatusTBCTG($listId);

$nguoitao = $_SESSION['uid'];
$new_phieutrinh_tbctg = $c_chungtu_omts->taoPhieutrinhTBCTG($listId, $nguoitao, $ngay_hientai);
$_SESSION['success'] = 'Tạo phiếu trình thành công';
$new_id = $new_phieutrinh_tbctg['data'];
?>
	<script>
		window.location.replace('../../public/chung-tu-tra-don-vi.php?search=phieutrinh_tbctg');
		window.open('../../print/phieu-trinh.php?id=<?=$new_id;?>', '_blank');
	</script>