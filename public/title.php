<?php
$url_self = $_SERVER['PHP_SELF'];
if (strpos($url_self, 'phieu-tra')) {
	$title_page = 'Phiếu trả & Phiếu đề nghị';
} elseif (strpos($url_self, 'chung-tu-tra-don-vi')) {
	$title_page = 'Chứng từ OM-TS chưa thanh toán trả đơn vị';
} elseif (strpos($url_self, 'pm-1-cua')) {
	$title_page = 'Phần mềm 1 cửa';
} elseif (strpos($url_self, 'thong-tin-ca-nhan')) {
	$title_page = 'Thông tin cá nhân';
} else {
	$title_page = null;
}
$title_page = 'CĐBHXH - '.$title_page;
?>