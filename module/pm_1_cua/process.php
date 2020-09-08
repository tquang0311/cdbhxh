<?php
//die();
if (isset($_COOKIE['auth1cua'])) {
	require('load_auth_1cua.php');
	$url = 'https://tnhs.baohiemxahoi.gov.vn/gateway/api/GetValues';
	session_start();

	$listAction = explode(',', $_POST['listAction']);
	$listTtxl = explode(',', $_POST['listTtxl']);
	$listItems = explode(',', $_POST['listItems']);
	$listBuoc = explode(',', $_POST['listBuoc']);
	$actionName = array();
	foreach ($listAction as $action) {
		if ($action=='Phâncông') {
			$actionName[] = 'Phân công';
			require('phancong.php');
		} elseif ($action=='Tiếpnhận') {
			$actionName[] = 'Tiếp nhận';
			require('tiepnhan.php');
		} elseif ($action=='Xửlý') {
			$actionName[] = 'Xử lý';
			require('xuly.php');
		} elseif ($action=='Tạobiênbản') {
			$actionName[] = 'Tạo biên bản';
			require('taobienban.php');
		}
	}
	$_SESSION['success'] = implode(', ', $actionName).' thành công '.count($listItems).' HS đã chọn.';
}
?>