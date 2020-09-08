<?php
session_start();
if (!$_SESSION['uid']) {
	header('Location: public/dang-nhap.php');
} else {
	header('Location: permission/');
}
?>