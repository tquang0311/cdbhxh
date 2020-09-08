<?php
chdir('../');
require('../controller/chung_tu_omts.php');
$c_chungtu_omts = new c_chungtu_omts();
$soHsAutocomplete = $c_chungtu_omts->soHsAutocomplete();
$result = array();
if (count($soHsAutocomplete['autocomplete'])) {
	foreach ($soHsAutocomplete['autocomplete'] as $key => $value) {
		array_push($result, $value->so_hs);
	}
} else {
	$result = ['ko tìm thấy dữ liệu'];
}
echo json_encode($result);
?>