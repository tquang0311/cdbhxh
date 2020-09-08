<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDate = Date('Y-m-d');

if (isset($_COOKIE['auth1cua'])) {
	$auth1cua = $_COOKIE['auth1cua'];
	$auth1cua = json_decode(base64_decode($auth1cua));
}
?>