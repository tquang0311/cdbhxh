<?php
error_reporting(0);
chdir('../');
require('../controller/chung_tu_omts.php');
$c_chungtu_omts = new c_chungtu_omts();
$loai_hs = $_GET['loai_hs'];
if ($loai_hs == 1) {
	$loai_hsText = '';
} elseif ($loai_hs == 2) {
	$loai_hsText = '.G';
} elseif ($loai_hs == 3) {
	$loai_hsText = '.BD';
}
$so_hs = $_GET['so_hs'].$loai_hsText.'/2020/001';
$ma_dv = $_GET['ma_dv'];
$tbctg = $c_chungtu_omts->search_TBCTG($so_hs, $ma_dv);
if (!$tbctg['tbctg']) {
	$output = json_encode(array('result'=>'null'));
} else {
	$output = json_encode(array('result'=>'success','msg'=>'Số '.$tbctg['tbctg']['so_tb'].' ngày '.$tbctg['tbctg']['ngay_ph']));
}
echo $output;
?>