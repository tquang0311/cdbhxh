<?php
//error_reporting(0);
require('../controller/user.php');
  $c_user = new c_user();
  $get_user = $c_user->get_user();
  $user = $get_user['get_user'];
  //print_r($user);

if (!isset($_SESSION['uid'])) {
	header('Location: dang-nhap.php');
}
require('../libs/config.php');
require('title.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title_page;?></title>
	<link rel="shortcut icon" href="asset/images/logo_BHXH.png">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
	<link rel="stylesheet" href="asset/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="asset/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" href="asset/font-awesome/css/all.min.css">
	<!--<link rel="stylesheet" href="asset/alertifyjs/css/alertify.min.css">-->
	<!--<link rel="stylesheet" href="asset/alertifyjs/css/themes/bootstrap.min.css">-->
	<link rel="stylesheet" href="asset/css/style.css">
    <style>
    	.ui-autocomplete {
		    max-height: 50%;
		    overflow-y: auto;
		    overflow-x: hidden;
		  }
    	form label.text-right{font-weight:bold;}
    	table thead th{vertical-align:middle !important;}
    	table th:not(.no_whitespace),table td:not(.no_whitespace){white-space:nowrap;}
		table th, table td{padding:4px !important;}
    </style>
</head>
<body onload="checkHeight();">
<div class="card">
  	<div class="card-header bg-info text-white">
	    <h2 class="float-left font-weight-bold">CĐBHXH</h2>
      <div class="text-center"><?php require "../menu.php"; ?></div>
	</div>
</div>