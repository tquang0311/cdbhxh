<?php
//error_reporting(0);
if (empty($c_user)) {
	chdir('../');
	require('../controller/user.php');
}
$c_user = new c_user();
isset($_GET['action']) ? $action = $_GET['action'] : $action = 'getList';
if ($action=='getList') {
	$listLeaderUsers = $c_user->load_UserList(2);
} elseif ($action=='update') {
	$user = $c_user->get_user();
	$c_user->update_PersonalInfo($user['get_user']->uid, $_POST['ld_phutrach']);
	$_SESSION['success'] = 'Cập nhập dữ liệu thành công';
	header('Location: ../../');
}
?>