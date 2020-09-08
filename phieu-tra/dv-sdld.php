<?php
require_once '../libs/config.php';
$ma_dv = $_POST['madv'];
$stmt = $conn->prepare("SELECT ten_dv FROM dv_sdld WHERE ma_dv=?");
$stmt->execute([$ma_dv]);
$dv = $stmt->fetch();
if (!$dv['ten_dv']) {
	$ten_dv = 'Sai mã đơn vị';
} else {
	$ten_dv = $dv['ten_dv'];
}
echo $ten_dv;
?>