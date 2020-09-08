<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đổi mật khẩu</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="asset/css/style.css">
	<style>
        .table-responsive-md{overflow:scroll;background:#ececec;padding:10px;position:relative;border-radius:5px;}
    </style>
</head>
<body>
	<?php require "../header.php";?>
	<div class="container mt-2">
		<form method="POST">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
					<h4>QUẢN LÝ TÀI KHOẢN</h4>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="border border-info shadow table-responsive-md" style="max-height:550px;">
					<?php
					require "../libs/config.php";
					$query = $conn->query("SELECT * FROM users WHERE role = 2");
					?>
						<table class="table table-bordered table-hover">
							<thead>
								<tr class="bg-info text-white">
									<th class="chk-all-uid"><input type="checkbox" name="chkall" class="chkall" onclick="checkall('uid', this)"></th>
									<th>STT</th>
									<th>HỌ TÊN</th>
									<th>CHỨC DANH</th>
									<th>TÌNH TRẠNG</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							while ($row = $query->fetch()) { ?>
								<tr>
									<td><input type="checkbox" class="uid" name="uid[]" value="<?php echo $row['uid'];?>"></td>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row['fullname']; ?></td>
									<td><?php echo $row['chuc_danh']; ?></td>
									<td><?php echo $row['tinh_trang']; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2 text-center">
			       	<button id="reset-pass" class="btn btn-primary" name="reset-pass"><i class="fas fa-sync-alt"></i> Đặt lại mật khẩu</button>
			       	<button id="add-user" class="btn btn-success" name="add-user"><i class="fas fa-plus-square"></i> Thêm tài khoản</button>
			       	<button id="add-user" class="btn btn-info" name="add-user"><i class="fas fa-plus-square"></i> Nghỉ thai sản</button>
			       	<button id="add-user" class="btn btn-danger" name="add-user"><i class="fas fa-plus-square"></i> Nghỉ không lương</button>
			    </div>
			</div>
		</form>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$('.chkall, .uid').click(function(){
			$('tbody tr .uid:checked').parents('tr').addClass('table-info');
			$('tbody tr .uid').not(':checked').parents('tr').removeClass('table-info');
		})
	});
	function checkall(name, obj) {
        var items = document.getElementsByName('uid[]');
            if(obj.checked == true) //Đã được chọn
            {
                for( i=0; i < items.length; i++)
                    items[i].checked = true;
            }
            else
            {
                for( i=0; i < items.length; i++)
                    items[i].checked = false;
            }
    }
</script>
</body>
</html>