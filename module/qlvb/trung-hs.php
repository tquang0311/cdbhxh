<?php
//error_reporting(0);
chdir('../');
require('../controller/qlvb.php');
$c_qlvb = new c_qlvb();
$ho_ten_nld = $_POST['ho_ten_nld'];
$so_so = $_POST['so_so'];
$count_trungHS = $c_qlvb->trungHS($ho_ten_nld, $so_so);
?>