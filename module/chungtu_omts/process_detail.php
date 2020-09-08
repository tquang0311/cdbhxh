<?php
//error_reporting(0);
chdir('../');
require('../controller/chung_tu_omts.php');
$c_chungtu_omts = new c_chungtu_omts();
$processDetail = $c_chungtu_omts->processDetail($_GET['hsId'], $_GET['tinh_trang']);
//print_r($processDetail['detail']);
if ($processDetail['detail']->tinh_trang==1) {
	$tinh_trang = 'Chờ xử lý';
} elseif ($processDetail['detail']->tinh_trang==2) {
	$tinh_trang = 'Chờ bàn giao';
	$ngay_xlhs = DATE_FORMAT(new DateTime($processDetail['detail']->ngay_xlhs), 'd/m/Y');
	$gio_xlhs = DATE_FORMAT(new DateTime($processDetail['detail']->gio_xlhs), 'H:i');
} elseif ($processDetail['detail']->tinh_trang==3) {
	$tinh_trang = 'Đã tạo biên bản bàn giao';
	$ngay_xlhs = DATE_FORMAT(new DateTime($processDetail['detail']->ngay_xlhs), 'd/m/Y');
	$gio_xlhs = DATE_FORMAT(new DateTime($processDetail['detail']->gio_xlhs), 'H:i');
	$ngay_taobb = DATE_FORMAT(new DateTime($processDetail['detail']->ngay_taobb), 'd/m/Y');
	$gio_taobb = DATE_FORMAT(new DateTime($processDetail['detail']->gio_taobb), 'H:i');
}
$ngay_nhaphs = DATE_FORMAT(new DateTime($processDetail['detail']->ngay_nhaphs), 'd/m/Y');
$gio_nhaphs = DATE_FORMAT(new DateTime($processDetail['detail']->gio_nhaphs), 'H:i');
?>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<h4>Số hồ sơ:</h4>
		<h4>Trạng thái hiện tại:</h4>
		<h4>Cán bộ xử lý:</h4>
		<h4>Thời gian nhập hồ sơ:</h4>
		<?php if ($processDetail['detail']->tinh_trang==2) { ?>
			<h4>Thời gian xử lý hồ sơ:</h4>
		<?php } elseif ($processDetail['detail']->tinh_trang==3) { ?>
			<h4>Thời gian xử lý hồ sơ:</h4>
			<h4>Thời gian tạo biên bản bàn giao:</h4>
		<?php } ?>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<h4><?=$processDetail['detail']->so_hs;?></h4>
		<h4><?=$tinh_trang;?></h4>
		<h4><?=$processDetail['detail']->fullname;?></h4>
		<h4><?=$ngay_nhaphs.' - '.$gio_nhaphs;?></h4>
		<?php if ($processDetail['detail']->tinh_trang==2) { ?>
			<h4><?=$ngay_xlhs.' - '.$gio_xlhs;?></h4>
		<?php } elseif ($processDetail['detail']->tinh_trang==3) { ?>
			<h4><?=$ngay_xlhs.' - '.$gio_xlhs;?></h4>
			<h4><?=$ngay_taobb.' - '.$gio_taobb;?></h4>
		<?php } ?>
	</div>
</div>