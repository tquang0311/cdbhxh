<?php
error_reporting(0);
chdir('../');
require('../controller/qlvb.php');
$c_qlvb = new c_qlvb();
$ma_dv = $_GET['ma_dv'];
$dvSdld = $c_qlvb->getDvsdld($ma_dv);
if ($dvSdld['dvsdld']->ten_dv!=null) {
 	echo $dvSdld['dvsdld']->ten_dv;
} else {
	echo 'Sai mã đơn vị';
}
?>