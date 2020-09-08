<?php
session_start();
if (!$_SESSION['uid']) {
	header('Location: dang-nhap.php');
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Nhập dữ liệu</title>
	<link rel="shortcut icon" href="asset/images/logo_BHXH.png">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">-->
	<link rel="stylesheet" href="asset/font-awesome/css/all.min.css">
  	<link rel="stylesheet" href="asset/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
<?php require "header.php";?>
<div class="m-5">
	<h1>QUẢN LÝ VĂN BẢN</h1>
	<div class="mt-3">
		<a class="border bg-primary text-light p-3" href="phieu-tra.php">Phiếu trả</a>
		<a class="border bg-primary text-light p-3" href="phieu-de-nghi-21.php">Phiếu đề nghị 21</a>
	</div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
<script src="asset/js/jquery-3.3.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/bootstrap/bootstrap.min.js"></script>
<script src="asset/js/script.js"></script>
</body>
</html>