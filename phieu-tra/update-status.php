<?php
session_start();
require_once "../libs/config.php";
$vb_id = $_POST['vbi'];
$lydohuydt = isset($_POST['lydo']) ? $_POST['lydo'] : '';
if ($_POST['action_type'] == 'đã xử lý') {
	$sql = "UPDATE qlvb SET tinh_trang = 2 WHERE vb_id IN($vb_id)";
} elseif ($_POST['action_type'] == 'từ chối') {
	$sql = "UPDATE qlvb SET tinh_trang = 1 WHERE vb_id = :vbid";
} elseif ($_POST['action_type'] == 'hủy dự thảo') {
	$sql = "UPDATE qlvb SET tinh_trang = 3, lydohuydt = :lydohuydt WHERE vb_id = :vbid";
}
$stmt = $conn->prepare($sql);
if ($_POST['action_type'] != 'đã xử lý') {
	$stmt->bindParam(':vbid', $vb_id, PDO::PARAM_INT);
}
if ($_POST['action_type'] == 'hủy dự thảo') {
	$stmt->bindParam(':lydohuydt', $lydohuydt, PDO::PARAM_STR);
}
$stmt->execute();
$_SESSION['success'] = 'Cập nhập dữ liệu thành công';
?>