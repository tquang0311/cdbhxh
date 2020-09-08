<?php
error_reporting(0);
require "../libs/config.php";
if (isset($_POST['print-week'])) {
    require "bao-cao-tuan.php";
} elseif (isset($_POST['print-week-total'])) {
    require "tong-hop-tuan.php";
} elseif (isset($_POST['print-rating-month'])) {
	require "danh-gia-thang.php";
}