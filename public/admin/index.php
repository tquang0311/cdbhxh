<?php
session_start();
if($_SESSION['role'] == '1') {
	header('Location: /xeploai-ccvc/quan-ly-tai-khoan/');
}else{
  	header('Location: dang-nhap/');
}
?>