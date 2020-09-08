<?php
//error_reporting(0);
chdir('../');
require('../controller/chung_tu_omts.php');
$c_chungtu_omts = new c_chungtu_omts();
$so_hs = $_GET['so_hs'].'/2020/001';
$check_sohs = $c_chungtu_omts->checkSoHS($so_hs);
?>