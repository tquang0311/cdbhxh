<?php
error_reporting(0);
require('../controller/chung_tu_omts.php');
$c_chungtu_omts = new c_chungtu_omts();
$hsomts = $c_chungtu_omts->getHsByID($_GET['hs'], $_SESSION['uid']);
?>