<?php
session_start();
if (!isset($_SESSION['uid'])) {
	header('Location: dang-nhap.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CV đi</title>
	<link rel="shortcut icon" href="asset/images/logo_BHXH.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<body onload="checkHeight();">
	<?php require "header.php"; ?>
	<div class="container-fluid mt-1">
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 bg-light">
				<ul class="nav nav-pills mb-3 mt-3 d-block" id="pills-tab" role="tablist">
				    <li class="nav-item">
				      	<a class="nav-link active" id="add-new-tab" data-toggle="pill" href="#add-new" role="tab" aria-controls="add-new" aria-selected="true"><h5><i class="fas fa-search"></i> Tìm kiếm</h5></a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" id="edit-tab" data-toggle="pill" href="#edit" role="tab" aria-controls="edit" aria-selected="false"><h5><i class="fas fa-plus"></i> Thêm mới</h5></a>
				    </li>
				</ul>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
				<div class="tab-content mt-2" id="pills-tabContent">
				    <div class="tab-pane fade show active" id="add-new" role="tabpanel" aria-labelledby="add-new-tab">
				    	<form method="GET">
				    		<div class="row">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Số CV</span>
										</div>
										<input type="number" class="form-control" name="so-vb" min="1" required>
									</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Ngày ký</span>
										</div>
										<input type="date" class="form-control" name="ngay-phat-hanh" min="1" required>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Đơn vị nhận</span>
										</div>
										<input type="text" class="form-control" name="noi-nhan" required>
									</div>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Người nhận</span>
										</div>
										<input type="number" class="form-control" name="nguoi-nhan" required>
									</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Người dự thảo</span>
										</div>
										<input type="number" class="form-control" name="nguoi-du-thao"" required>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Về việc</span>
										</div>
										<input type="number" class="form-control" name="noi-dung" required>
									</div>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
									<button class="btn btn-primary w-25"><i class="fas fa-search"></i> Tìm kiếm</button>
								</div>
							</div>
				    	</form>
				    	<div class="mt-2">
				    		<table class="table table-hover">
				    			<thead>
				    				<tr>
				    					<th>STT</th>
				    					<th>SỐ CV</th>
				    					<th>NGÀY KÝ</th>
				    					<th>ĐƠN VỊ NHẬN</th>
				    					<th>NGƯỜI NHẬN</th>
				    					<th>NGƯỜI DỰ THẢO</th>
				    					<th>VỀ VIỆC</th>
				    				</tr>
				    			</thead>
				    			<tbody>
				    				<tr>
				    					<td></td>
				    					<td></td>
				    					<td></td>
				    					<td></td>
				    					<td></td>
				    					<td></td>
				    					<td></td>
				    				</tr>
				    			</tbody>
				    		</table>
				    	</div>
				    </div>
				    <div class="tab-pane fade show" id="edit" role="tabpanel" aria-labelledby="edit-tab">
				    	<form method="GET">
				    		<div class="row">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Số CV</span>
										</div>
										<input type="number" class="form-control" name="so-vb" min="1" required>
									</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Ngày ký</span>
										</div>
										<input type="date" class="form-control" name="ngay-phat-hanh" min="1" required>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Đơn vị nhận</span>
										</div>
										<input type="text" class="form-control" name="noi-nhan" required>
									</div>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Người nhận</span>
										</div>
										<input type="number" class="form-control" name="nguoi-nhan" required>
									</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Người dự thảo</span>
										</div>
										<input type="number" class="form-control" name="nguoi-du-thao"" required>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Về việc</span>
										</div>
										<input type="number" class="form-control" name="noi-dung" required>
									</div>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
									<button class="btn btn-primary w-25"><i class="fas fa-save"></i> Ghi</button>
								</div>
							</div>
				    	</form>
				    </div>
				</div>
			</div>
		</div>
	</div>

	<div id="background" class="w-100 h-100"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="asset/js/script.js"></script>
</body>
</html>