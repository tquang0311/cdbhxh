<?php
require('../controller/user.php');
	$c_user = new c_user();
	$get_user = $c_user->get_user();
	$user = $get_user['get_user'];
	//print_r($user);
	if(isset($user->password)) {
		if ($user->password == "e10adc3949ba59abbe56e057f20f883e") {
			header('Location: /cdbhxh/public/doi-mat-khau.php');
		} else {
			header('Location: /cdbhxh/public/phieu-tra.php');
		}
	} else {
		header('Location: dang-nhap/');
	}
?>