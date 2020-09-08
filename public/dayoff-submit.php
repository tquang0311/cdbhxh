<?php
session_start();
require "libs/config.php";
$uid = $_SESSION['uid'];
if (isset($_POST['save-dayoff'])) {
	$day_off = $_POST['day-off'];
	$sql = "INSERT INTO day_off(uid, ngay_nghi) VALUES (?,?)";
	$stmt= $conn->prepare($sql);
	$stmt->execute([$uid, $day_off]);
	$success = 'Thêm ngày nghỉ thành công';
}
?>