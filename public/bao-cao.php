<?php
error_reporting(0);
require "libs/config.php";
if (isset($_POST['print-week'])) {
    require "bao-cao/bao-cao-tuan.php";
} elseif (isset($_POST['print-week-total'])) {
    require "bao-cao/tong-hop-tuan.php";
} elseif (isset($_POST['print-rating-month'])) {
	require "bao-cao/danh-gia-thang.php";
}